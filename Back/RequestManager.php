<?php

$requestM = new RequestManager();
$requestM->Handler();

class RequestManager{

	protected $actors;
	protected $actions;
	protected $data; 
	protected $targets;

	function __construct()
	{ 
		$this->data = $_POST;
		$this->targets = explode(",",$_GET['targets']);
		$this->actors = explode(",",$_GET['actors']);
		$this->actions = explode(",",$_GET['actions']);
	}

//---------Manager---------------------.
	public function Handler()
	{
		$db = mysqli_connect("localhost","fractum","fractum","fractum");
		require_once("./Model/User.php");
		$cookieStatus = $this->CheckCookie($db);

		if($this->actions[0]=='Login')
		{
			$this->Trigger('User','Login',$db,$this->data);
			mysqli_close($db);

			// Esto hay que variarlo según lo que queramos que sea el home.
			header("Location: ../index.php", false);
		}

		elseif($cookieStatus)
		{
			for($i=0;$i<count($this->actors);$i++)
			{
				$permissionStatus = $this->CheckPermissions($this->actors[$i],$this->actions[$i],$db);
				
				if($permissionStatus)
				{
					if($this->targets[$i]=='A')
					{
						$this->Trigger($this->actors[$i],$this->actions[$i],$db,$this->data);
						switch ($this->actions[$i])
						{
							case 'Creator':
								if($this->actors[$i] == 'Permissions')
								{
									$this->Trigger('Permissions','Puller',$db,$this->data);
									$this->actions[$i] = 'Puller';
								}
							break;
							case 'Updater':
								if($this->actors[$i] == 'Permissions')
								{
									$this->Trigger('Permissions','Puller',$db,$this->data);
									$this->actions[$i] = 'Puller';
								}
								else
								{
									$this->Trigger($this->actors[$i],'Reader',$db,$this->data);
									$this->actions[$i] = 'Reader';
								}
							break;
							case 'Reader':
								$this->Trigger($this->actors[$i],'Reader',$db,$this->data);
								$this->actions[$i] = 'Updater';
							break;
							case 'Eraser':
								if($this->actors[$i] == 'Permissions')
								{
									$this->Trigger('Permissions','Puller',$db,$this->data);
									$this->actions[$i] = 'Puller';
								}
								else $this->actions[$i] = 'Creator';
							break;
						}
					}
				}
				else{ $this->actors[$i] = 'User'; $this->actions[$i] = 'Error'; }
			}

			for($i=0;$i<count($this->actors);$i++)
			{
				$permissionStatus = $this->CheckPermissions($this->actors[$i],$this->actions[$i],$db);

				if($permissionStatus)
				{
					if($this->targets[$i]=='S')
						$this->Trigger($this->actors[$i],$this->actions[$i],$db,$this->data);
				}
				else{ $this->actors[$i] = 'User'; $this->actions[$i] = 'Error'; }
			}

			$outActors = $this->StringArray($this->actors);
			$outActions = $this->StringArray($this->actions);
			
			mysqli_close($db);
			header("Location: ../Front/View/Layout.php?actors=".$outActors."&actions=".$outActions, false);
		}

		else{ mysqli_close($db); header("Location: ../index.php?fail=Login-Cookie",false); }
	}

	protected function Trigger($actor,$action,$db,$data)
	{	
		require_once("./Model/".$actor.".php");
		
		if($action=='Puller'){
			$toDo = array($actor,$action);
			$data = User::Handler('GetRules',$db,$toDo);
		}
		
		$solvedRequest = $actor::Handler($action,$db,$data);

		switch ($action)
		{
			case 'Login': case 'Seeker': case 'Reader': case 'Puller':
				$this->Parser($solvedRequest); break;
		}

		if($actor=='User' && ($action== 'Login' || $action=='Logout'))
			$this->SessionManager($action,$db,$_SESSION['UserLogin'][0]);

	}
//---------Manager---------------------.

//---------Tools---------------------.
	protected function CheckCookie($db)
	{
		if(empty($_COOKIE['user'])&&empty($_COOKIE['token'])) return false;
		return User::Handler('CheckUserToken',$db,null);
	}

	protected function CheckPermissions($actor,$action,$db)
	{
		if($action=='Logout'||$action=='Login') return true;
		else
		{
			$data = array($actor,$action);
			return User::Handler('CheckPermissions',$db,$data);
		}
	}

	protected function SessionManager($action,$db,$userData)
	{
		if($action=='Login')
		{
			if($userData['dni']==''){ header("Location: ../index.php?fail=Login-Incorrecto",false);}
			list($usec, $sec) = explode(' ', microtime());
			srand((float) $sec + ((float) $usec * 100000));
			$token = rand();

			setcookie('user',$userData['dni'],time()+(30*24*60*60),'/');
			setcookie('type',$userData['type'],time()+(30*24*60*60),'/');
			setcookie('rule',$userData['rule'],time()+(30*24*60*60),'/');
			setcookie('token',$token,time()+(30*24*60*60),'/');

			$data = array($userData['dni'],$token);
			User::Handler('SetUserToken',$db,$data);
		}
		
		elseif ($action=='Logout')
		{
			setcookie('user',null,-1,'/'); unset($_COOKIE['user']);
			setcookie('token',null,-1,'/'); unset($_COOKIE['token']);
			setcookie('type',null,-1,'/'); unset($_COOKIE['type']);
			session_unset(); header("Location: ../index.php",false);
		}
	}

	protected function Parser($solvedRequest)
	{
		$data = array();
		while($row = mysqli_fetch_array($solvedRequest[1],MYSQLI_ASSOC))
			array_push($data, $row);

		session_start();
		$_SESSION[$solvedRequest[0]] = $data;
		session_write_close();
    }

    protected function StringArray($array)
    {	
    	$toString = $array[0];
    	unset($array[0]);

    	if(count($array)>=1)
	    	foreach($array as $element)
	    		$toString = $toString.",".(String)$element;

    	return $toString;
    }
}
//---------Tools---------------------.

?>

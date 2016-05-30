<?php
require_once('Main.php');
class User
{
	function Handler($action,$db,$data)
	{
		if($action=='Logout') return User::SetUserToken($db,array($_COOKIE['user'],null));
		else return User::$action($db,$data);
	}

//HERRAMIENTAS DE AUTENTICADO.
	function Login($db,$data)
	{
		$sql = mysqli_prepare($db, "SELECT dni,type,name FROM user WHERE dni = ? AND pass = ?");
		mysqli_stmt_bind_param($sql, 'ss', $data['name'], $data['pass']); mysqli_stmt_execute($sql);
		$sqlObject = mysqli_stmt_get_result($sql); mysqli_stmt_close($sql);
		
		$tag = (String) __CLASS__.__FUNCTION__;
		return array($tag,$sqlObject);
	}

	function GetRules($db,$data){ //Cambiar rule a TinyINT en la DB.
		$sql = mysqli_prepare($db, "SELECT field, data FROM rulesPerUser NATURAL JOIN definedRules WHERE dni= ?");
		mysqli_stmt_bind_param($sql,'s',$_COOKIE['user']); mysqli_stmt_execute($sql);
		$sqlObject = mysqli_stmt_get_result($sql); mysqli_stmt_close($sql);

		$data = array();
		while($row = mysqli_fetch_array($sqlObject,MYSQLI_ASSOC)) array_push($data, $row);

		return $data;
	}

	function CheckPermissions($db,$data){
		$sql = mysqli_prepare($db, "SELECT pm.value FROM permissions pm, user pl WHERE pm.type=pl.type AND dni = ? AND actor= ? AND action = ?");
		mysqli_stmt_bind_param($sql, 'sss', $_COOKIE['user'], $data[0], $data[1]); mysqli_stmt_execute($sql);
		$sqlObject = mysqli_stmt_get_result($sql); mysqli_stmt_close($sql);

		$data = array();
		while($row = mysqli_fetch_array($sqlObject,MYSQLI_ASSOC)) array_push($data, $row);

		if($data[0]['value']==1) return true;
		else return false;
	}

	function SetUserToken($db,$data)
	{
		$sql = mysqli_prepare($db, "UPDATE user SET token = ? WHERE dni= ?");
		mysqli_stmt_bind_param($sql, 'is', $data[1], $data[0]);
		mysqli_stmt_execute($sql); 
		mysqli_stmt_close($sql);
	}

	function CheckUserToken($db,$data)
	{
		$sql = mysqli_prepare($db, "SELECT token FROM user WHERE dni = ? AND token = ?");
		mysqli_stmt_bind_param($sql, 'ss', $_COOKIE['user'], $_COOKIE['token']);
		mysqli_stmt_execute($sql);
		
		$sqlObject = mysqli_stmt_get_result($sql);
		mysqli_stmt_close($sql);

		if(mysqli_num_rows($sqlObject)>0) return true;
		else return false;
	}
//HERRAMIENTAS DE AUTENTICADO.

//PROCESOS BASE.
	function Seeker($db,$data){
		$likeStr = '%'.$data[0].'%';
		$sql = mysqli_prepare($db, "SELECT * FROM user WHERE dni LIKE ? OR name LIKE ? OR surname LIKE ? OR phone = ? OR mail LIKE ?");
		mysqli_stmt_bind_param($sql, 'sssss', $likeStr,$likeStr,$likeStr,$likeStr,$likeStr);
		mysqli_stmt_execute($sql);
		
		$sqlObject = mysqli_stmt_get_result($sql);
		mysqli_stmt_close($sql);
		return $sqlObject;
	}

    function Reader($db,$data)
    {
    	var_dump($data);
    	$sql = mysqli_prepare($db, "SELECT * FROM user WHERE dni = ?");
		mysqli_stmt_bind_param($sql, 's', $data['dni']);
		mysqli_stmt_execute($sql);
		
		$sqlObject = mysqli_stmt_get_result($sql);
		mysqli_stmt_close($sql);

		$tag = (String) __CLASS__.__FUNCTION__;
		return array($tag,$sqlObject); 
    }

	function Puller($db,$data) //$WHO tiene que ser la vista en la DB no la tabla.
	{
		$sql = doSQL($db,$data,__CLASS__); mysqli_stmt_execute($sql);
		$sqlObject = mysqli_stmt_get_result($sql); mysqli_stmt_close($sql);

		$tag = (String) __CLASS__.__FUNCTION__;
		return array($tag,$sqlObject); 
	}

    function Creator($db,$data)
    {
    	$token=null;
    	$prephone = explode(".",$data['prephone']);
    	$pre= $prephone[0]; $phone= 0 + $prephone[1];

    	$sql = mysqli_prepare($db, "INSERT INTO user(token,type,dni,pass,name,surname,prefix,phone,mail) VALUES (?,?,?,?,?,?,?,?,?)");
		mysqli_stmt_bind_param($sql, 'issssssis', $token,$data['type'],$data['dni'],$data['pass'],$data['name'],$data['surname'],$pre,$phone,$data['mail']);
		mysqli_stmt_execute($sql); mysqli_stmt_close($sql);
    }

    function Updater($db,$data)
    {
    	$prephone = explode(".",$data['prephone']);
    	$pre= $prephone[0]; $phone= 0 + $prephone[1];

    	$sql = mysqli_prepare($db, "UPDATE user SET pass=?,name=?,surname=?,mail=?,prefix=?,phone=? WHERE dni = ?");
		mysqli_stmt_bind_param($sql, 'sssssis', $data["pass"],$data["name"],$data["surname"],$data["mail"],$pre,$phone,$data["dni"]);
		mysqli_stmt_execute($sql); mysqli_stmt_close($sql);
    }
    
    function Eraser($db,$data)
    {
    	$sql = mysqli_prepare($db, "DELETE FROM user WHERE dni = ?");
    	mysqli_stmt_bind_param($sql, 's', $data["dni"]);
    	mysqli_stmt_execute($sql); mysqli_stmt_close($sql);
    }
//PROCESOS BASE.

}
?>
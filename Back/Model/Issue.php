<?php
require_once('Main.php');
class Issue
{
	function Handler($action,$db,$data){ return Issue::$action($db,$data); }

    function Reader($db,$data)
    {
    	$sql = mysqli_prepare($db, "SELECT * FROM issue WHERE id = ?");
		mysqli_stmt_bind_param($sql, 's', $data['id']);
		mysqli_stmt_execute($sql);
		
		$sqlObject = mysqli_stmt_get_result($sql);
		mysqli_stmt_close($sql);

		$tag = (String) __CLASS__.__FUNCTION__;
		return array($tag,$sqlObject); 
    }

	function Puller($db,$data) //Quitado acceso a VIEW.
	{
		$sql = doSQL($db,$data,__CLASS__); mysqli_stmt_execute($sql);
		$sqlObject = mysqli_stmt_get_result($sql); mysqli_stmt_close($sql);

		$tag = (String) __CLASS__.__FUNCTION__;
		return array($tag,$sqlObject); 
	}

    function Creator($db,$data)
    {
    	$flag=0;
    	while($flag==0)
    	{
    		$id = randomID(__CLASS__);
    		$list = mysqli_query($db,"SELECT id FROM issue");
    		if(checkID($id,$list)) $flag=1;
    	}

        $nodate = null;
        $owner = $_COOKIE['user'];
        $date = date('Y-m-d H:i:s');
        $status = 0 + $data['status'];

    	$sql = mysqli_prepare($db, "INSERT INTO issue(id,title,description,status,owner,device,company,openDate,closeDate) VALUES (?,?,?,?,?,?,?,?,?)");
		mysqli_stmt_bind_param($sql, 'sssisssss', $id,$data['title'],$data['description'],$status,$owner,$data['device'],$data['company'],$date,$nodate);
		mysqli_stmt_execute($sql); mysqli_stmt_close($sql);
    }


    function Updater($db,$data)
    {
    	$sql = mysqli_prepare($db, "UPDATE issue SET title=?,description=?,status=?,company=? WHERE id = ?");
		mysqli_stmt_bind_param($sql, 'ssiss', $data["title"],$data["description"],$data["status"],$data["company"],$data["id"]);
		mysqli_stmt_execute($sql); mysqli_stmt_close($sql);
    }
    
    function Eraser($db,$data)
    {
    	$sql = mysqli_prepare($db, "DELETE FROM issue WHERE id = ?");
    	mysqli_stmt_bind_param($sql, 's', $data["id"]);
    	mysqli_stmt_execute($sql); mysqli_stmt_close($sql);
    }
}
?>

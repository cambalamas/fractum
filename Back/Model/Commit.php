<?php
require_once('Main.php');
class Commit
{
	function Handler($action,$db,$data){ return Commit::$action($db,$data); }

    function Reader($db,$data)
    {
    	$sql = mysqli_prepare($db, "SELECT * FROM commit WHERE id = ?");
		mysqli_stmt_bind_param($sql, 's', $data['id']);
		mysqli_stmt_execute($sql);
		
		$sqlObject = mysqli_stmt_get_result($sql);
		mysqli_stmt_close($sql);

		$tag = (String) __CLASS__.__FUNCTION__;
		return array($tag,$sqlObject); 
    }

	function Puller($db,$data)
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
    		$list = msqli_query($db,"SELECT id FROM commit");
    		if(checkID($id,$list)) $flag=1;
    	}

        $date = date('Y-m-d H:i:s');

    	$sql = mysqli_prepare($db, "INSERT INTO commit(id,title,description,cost,owner,issue,date) VALUES (?,?,?,?,?,?,?,?,?)");
		mysqli_stmt_bind_param($sql, 'sssdsss', $id,$data['title'],$data['description'],$data['cost'],$data['owner'],$data['issue'],$date);
		mysqli_stmt_execute($sql); mysqli_stmt_close($sql);
    }


    function Updater($db,$data)
    {
    	$sql = mysqli_prepare($db, "UPDATE commit SET title=?,description=? WHERE id = ?");
		mysqli_stmt_bind_param($sql, 'sss', $data["title"],$data["description"],$data["id"]);
		mysqli_stmt_execute($sql); mysqli_stmt_close($sql);
    }
    
    function Eraser($db,$data)
    {
    	$sql = mysqli_prepare($db, "DELETE FROM commit WHERE id = ?");
    	mysqli_stmt_bind_param($sql, 's', $data["id"]);
    	mysqli_stmt_execute($sql); mysqli_stmt_close($sql);
    }
}
?>
<?php
require_once('Main.php');
class Line
{
	function Handler($action,$db,$data){ return Line::$action($db,$data); }

    function Reader($db,$data)
    {
    	$sql = mysqli_prepare($db, "SELECT * FROM line WHERE id = ?");
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
    		$list = mysqli_query($db,"SELECT id FROM line");
    		if(checkID($id,$list)) $flag=1;
    	}

        $sql = mysqli_prepare($db, "INSERT INTO line(id,name,description,status) VALUES (?,?,?,?)");
        mysqli_stmt_bind_param($sql, 'sssi', $id,$data['name'],$data['description'],$data['status']);
        mysqli_stmt_execute($sql); 
        mysqli_stmt_close($sql);
    }

    function Updater($db,$data)
    {
    	$sql = mysqli_prepare($db, "UPDATE line SET name=?,description=?,status=? WHERE id = ?");
		mysqli_stmt_bind_param($sql, 'ssis', $data["name"],$data["description"],$data["status"],$data["id"]);
		mysqli_stmt_execute($sql); mysqli_stmt_close($sql);
    }
    
    function Eraser($db,$data)
    {
    	$sql = mysqli_prepare($db, "DELETE FROM line WHERE id = ?");
    	mysqli_stmt_bind_param($sql, 's', $data["id"]);
    	mysqli_stmt_execute($sql); mysqli_stmt_close($sql);
    }
}
?>
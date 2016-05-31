<?php
require_once('Main.php');
class Upkeep
{
	function Handler($action,$db,$data){ return Upkeep::$action($db,$data); }

    function Reader($db,$data)
    {
    	$sql = mysqli_prepare($db, "SELECT * FROM upkeep WHERE id = ?");
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
    		$list = mysqli_query($db,"SELECT id FROM upkeep");
    		if(checkID($id,$list)) $flag=1;
    	}

        $date = date('Y-m-d H:i:s');

    	$sql = mysqli_prepare($db, "INSERT INTO upkeep(id,name,company,time,unit,cost,date) VALUES (?,?,?,?,?,?,?)");
		mysqli_stmt_bind_param($sql, 'sssiids', $id,$data['name'],$data['company'],$data['time'],$data['unit'],$data['cost'],$date);
		mysqli_stmt_execute($sql); mysqli_stmt_close($sql);
    }


    function Updater($db,$data)
    {
        $unit = 0 + $data['unit'];
        $cost = 0 + $data['cost'];
    	$sql = mysqli_prepare($db, "UPDATE upkeep SET name=?,time=?,unit=?,cost=? WHERE id = ?");
		mysqli_stmt_bind_param($sql, 'ssids', $data['name'],$data["time"],$unit,$cost,$data["id"]);
		mysqli_stmt_execute($sql); mysqli_stmt_close($sql);
    }

    function Eraser($db,$data)
    {
    	$sql = mysqli_prepare($db, "DELETE FROM upkeep WHERE id = ?");
    	mysqli_stmt_bind_param($sql, 's', $data["id"]);
    	mysqli_stmt_execute($sql); mysqli_stmt_close($sql);
    }
}
?>

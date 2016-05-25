<?php
require_once('Main.php');
class Device
{
	function Handler($action,$db,$data){ return Device::$action($db,$data); }

    function Reader($db,$data)
    {
    	$sql = mysqli_prepare($db, "SELECT * FROM device WHERE serialNumber = ?");
		mysqli_stmt_bind_param($sql, 's', $data['serialNumber']);
		mysqli_stmt_execute($sql);
		
		$sqlObject = mysqli_stmt_get_result($sql);
		mysqli_stmt_close($sql);

		$tag = (String) __CLASS__.__FUNCTION__;
		return array($tag,$sqlObject); 
    }

	function Puller($db,$data) //He quitado el acceso a vista
	{
		$sql = doSQL($db,$data,__CLASS__); mysqli_stmt_execute($sql);
		$sqlObject = mysqli_stmt_get_result($sql); mysqli_stmt_close($sql);

		$tag = (String) __CLASS__.__FUNCTION__;
		return array($tag,$sqlObject); 
	}

    function Creator($db,$data)
    {
    	$date = date('Y-m-d H:i:s');
    	$cost = (Float) $data['cost'];
    	$sql = mysqli_prepare($db, "INSERT INTO device(serialNumber,name,upkeep,description,cost,line,date) VALUES (?,?,?,?,?,?,?)");
		mysqli_stmt_bind_param($sql, 'ssssdss', $data['serialNumber'], $data['name'], $data['upkeep'], $data['description'], $cost, $data['line'],$date);
		mysqli_stmt_execute($sql); mysqli_stmt_close($sql);
    }

    function Updater($db,$data)
    {
    	$sql = mysqli_prepare($db, "UPDATE device SET name=?,upkeep=?,description=?,line=? WHERE serialNumber = ?");
		mysqli_stmt_bind_param($sql, 'sssss', $data['name'],$data['upkeep'],$data['description'],$data['line'],$data['serialNumber']);
		mysqli_stmt_execute($sql); mysqli_stmt_close($sql);
    }
    
    function Eraser($db,$data)
    {
    	$sql = mysqli_prepare($db, "DELETE FROM device WHERE serialNumber = ?");
    	mysqli_stmt_bind_param($sql, 's', $data["serialNumber"]);
    	mysqli_stmt_execute($sql); mysqli_stmt_close($sql);
    }
}
?>

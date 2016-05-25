<?php
require_once('Main.php');
class Company
{
	function Handler($action,$db,$data){ return Company::$action($db,$data); }

    function Reader($db,$data)
    {
    	$sql = mysqli_prepare($db, "SELECT * FROM company WHERE cif = ?");
		mysqli_stmt_bind_param($sql, 's', $data['cif']);
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
    	$prephone = explode(".",$data['prephone']);
    	$pre= $prephone[0]; $phone= 0 + $prephone[1];

    	$sql = mysqli_prepare($db, "INSERT INTO company(cif,name,prefix,phone,mail,address) VALUES (?,?,?,?,?,?)");
		mysqli_stmt_bind_param($sql, 'sssiss', $data['cif'],$data['name'],$pre,$phone,$data['mail'],$data['address']);
		mysqli_stmt_execute($sql); mysqli_stmt_close($sql);
    }

    function Updater($db,$data)
    {
        $prephone = explode(".",$data['prephone']);
        $pre= $prephone[0]; $phone= (Int) $prephone[1]; //SI EL NUMERO EMPIEZA POR ZEROS SE LOS COME
 

        $sql = mysqli_prepare($db, "UPDATE company SET prefix=?,phone=?,mail=?,address=? WHERE cif = ?");
		mysqli_stmt_bind_param($sql, 'sisss', $pre,$phone,$data["mail"],$data["address"],$data["cif"]);
		mysqli_stmt_execute($sql); mysqli_stmt_close($sql);
    }
    
    function Eraser($db,$data)
    {
    	$sql = mysqli_prepare($db, "DELETE FROM company WHERE cif = ?");
    	mysqli_stmt_bind_param($sql, 's', $data["cif"]);
    	mysqli_stmt_execute($sql); mysqli_stmt_close($sql);
    }
}
?>

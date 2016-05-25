<?php
require_once('Main.php');
class Permissions
{
    function Handler($action,$db,$data)
    {
        return Permissions::$action($db,$data);
    }

    function Puller($db,$data) //Works fine.
    {
        $sql = doSQL($db,$data,__CLASS__); mysqli_stmt_execute($sql);
        $sqlObject = mysqli_stmt_get_result($sql); mysqli_stmt_close($sql);

        $tag = (String) __CLASS__.__FUNCTION__;
        return array($tag,$sqlObject); 
    }

    function Creator($db,$data) //Works: Cambiar TYPE a Varchar.
    {
        $value = 0;
        $type = $data['type'];
        $authActors = array('User','Device','Line','Issue','Commit','Company','Upkeep');
        $authActions = array('Eraser','Creator','Puller','Reader','Updater','Seeker');

        for($n=0; $n<count($authActors); $n++)
        {
            for($m=0; $m<count($authActions); $m++)
            {
                $str1 = $authActors[$n];
                $str2 = $authActions[$m];
                $sql = mysqli_prepare($db,"INSERT INTO permissions(type,actor,action,value) VALUES(?,?,?,?)");
                mysqli_stmt_bind_param($sql, 'sssi', $type,$str1,$str2,$value);
                mysqli_stmt_execute($sql);
            }
        }
        mysqli_stmt_close($sql);
    }

    function Updater($db,$data) //Works fine.
    {
        $changes = explode(",", $data['changes']);
        
        for($c=0; $c<count($changes); $c+=4)
        {
            $value= 0 + $changes[$c];
            $type= (String)$changes[$c+1];
            $sql = mysqli_prepare($db, "UPDATE permissions SET value = ? WHERE type = ? and actor = ? and action = ?");
            mysqli_stmt_bind_param($sql, 'isss', $value,$type,$changes[$c+2],$changes[$c+3]);
            mysqli_stmt_execute($sql);
        }
        mysqli_stmt_close($sql);
    }
    
    function Eraser($db,$data) //Works (NEED: on delete set null)
    {
        if(!($data['type']=="admin"))
        {
            $sql = mysqli_prepare($db, "DELETE FROM permissions WHERE type = ?");
            mysqli_stmt_bind_param($sql, 's', $data["type"]);
            mysqli_stmt_execute($sql); mysqli_stmt_close($sql);
        }
    }
}
?>

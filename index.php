<?php
    if(!isset($_GET['fail'])){
	    if(empty($_COOKIE['user'])&&empty($_COOKIE['type'])&&empty($_COOKIE['token']))
	    	header("Location: Front/View/Login.php",false);
	    else
	    	header("Location: Front/View/Layout.php",false);
    }
    else{ //echo $_GET['fail'];
    	echo 'Cookie:<br>';var_dump($_COOKIE);
    	echo '<br>';
    	echo '<br>';
    	var_dump($_SESSION);
    } 
?>
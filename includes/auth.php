<?php
session_start();

if(!isset($_SESSION["PRPO_Current_User"])){
	
	header("Location: ./login.php");
	exit(); 
}


if( $_SESSION['last_activity'] < time()-$_SESSION['expire_time'] ) { //have we expired?
    //redirect to logout.php

$_SESSION['timed_out'] = 'timed_out';

    header('Location: ./logout.php'); //change yoursite.com to the name of you site!!
 
} else{ //if we haven't expired:
    $_SESSION['last_activity'] = time(); //this was the moment of last activity.
}

?>
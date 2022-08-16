<?php
session_start();
unset($_SESSION['PRPO_Current_User']);


header("Location: login.php");

?>
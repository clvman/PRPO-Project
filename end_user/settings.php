<?php
//file name: settings.php
//Title:Build your own Forgot Password PHP Script
function connect()
{	
$host="localhost"; //host
$uname="root";  //username
$pass="";      //password
$db= 'site_codes';  //database name

$con = mysqli_connect($host,$uname,$pass);

if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
mysqli_select_db($con, $db);}



?>
<?php
include ('includes/db.php') ;

//include ('includes/auth.php') ;

if (isset($_GET['severity_id'])) {

    $severity_id=$_GET['severity_id'];
 
	$query="DELETE FROM `severities` WHERE  severity_id={$severity_id}"; 
	$result=mysqli_query($con,$query);





	header("Location: add_Severity.php");


}
 ?>
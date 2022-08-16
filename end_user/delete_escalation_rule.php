<?php
include ('includes/db.php') ;

//include ('includes/auth.php') ;

if (isset($_GET['id'])) {

    $id=$_GET['id'];
 
	$query="DELETE FROM `escalation_rules` WHERE  id={$id}"; 
	$result=mysqli_query($con,$query);





	header("Location: add_escalations.php");


}
 ?>
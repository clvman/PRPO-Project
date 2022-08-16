<?php
include ('includes/db.php') ;

//include ('includes/auth.php') ;

if (isset($_GET['sla_id'])) {

    $sla_id=$_GET['sla_id'];
 
	$query="DELETE FROM `sla_names` WHERE  sla_id={$sla_id}"; 
	$result=mysqli_query($con,$query);





	header("Location: add_sla.php");


}
 ?>
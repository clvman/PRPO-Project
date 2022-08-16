<?php
include ('includes/db.php') ;

//include ('includes/auth.php') ;

if (isset($_GET['impact_id'])) {

    $impact_id=$_GET['impact_id'];
 
	$query="DELETE FROM `impacts` WHERE  impact_id={$impact_id}"; 
	$result=mysqli_query($con,$query);





	header("Location: add_impact.php");


}
 ?>
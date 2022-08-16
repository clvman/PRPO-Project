<?php
include ('includes/db.php') ;

//include ('includes/auth.php') ;

if (isset($_GET['impacts_description_id'])) {

    $impacts_description_id=$_GET['impacts_description_id'];
 
	$query="DELETE FROM `impacts_description` WHERE  impacts_description_id={$impacts_description_id}"; 
	$result=mysqli_query($con,$query);





	header("Location: add_impact_description.php");


}
 ?>
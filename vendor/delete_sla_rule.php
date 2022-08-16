<?php
include ('includes/db.php') ;

//include ('includes/auth.php') ;

if (isset($_GET['rule_id'])) {

    $rule_id=$_GET['rule_id'];
 
	$query="DELETE FROM `sla_rules` WHERE  rule_id={$rule_id}"; 
	$result=mysqli_query($con,$query);





	header("Location: add_sla_rules.php");


}
 ?>
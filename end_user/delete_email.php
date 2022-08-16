<?php
include ('includes/db.php') ;

//include ('includes/auth.php') ;

if (isset($_GET['team_id'])) {

    $team_id=$_GET['team_id'];
 
	$query="DELETE FROM `teams` WHERE  `team_id`={$team_id}"; 
	echo $query;
	$result=mysqli_query($con,$query);





	header("Location: add_team.php");


}
 ?>
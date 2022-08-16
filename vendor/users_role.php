<?php 
include ('includes/auth.php') ;
include ('includes/db.php') ;


 ?>

<?php 



if (isset($_GET['change_to_admin'])) {

        $user_id=$_GET['change_to_admin'];
		$query_update1 = "update users set ";
		$query_update1 .="role= 'Admin' ";
		$query_update1 .="where user_id ={$user_id}";

		$update_query = mysqli_query($con, $query_update1);
		header("Location: all_user.php");
}

if (isset($_GET['change_to_sub'])) {

        $user_id=$_GET['change_to_sub'];
		$query_update2 = "update users set ";
		$query_update2 .="role= 'End User' ";
		$query_update2 .="where user_id ={$user_id}";

		$update_query = mysqli_query($con, $query_update2);
		header("Location: all_user.php");
}


if (isset($_GET['change_to_vendor'])) {

        $user_id=$_GET['change_to_vendor'];
		$query_update2 = "update users set ";
		$query_update2 .="role= 'Vendor' ";
		$query_update2 .="where user_id ={$user_id}";
//echo $query_update2 ;
		$update_query = mysqli_query($con, $query_update2);
		header("Location: all_user.php");
}

if (isset($_GET['delete'])) {

        $user_id=$_GET['delete'];
		$query_update3 = "delete from  users ";
	
		$query_update3 .="where user_id ={$user_id}";

		$update_query = mysqli_query($con, $query_update3);
		header("Location: all_user.php");
}
if (isset($_GET['delete_team'])) {

        $team_id=$_GET['delete_team'];
		$query_update3 = "delete from  teams ";
	
		$query_update3 .="where team_id ={$team_id}";

		$update_query = mysqli_query($con, $query_update3);
		header("Location: all_team.php");
}


 ?>
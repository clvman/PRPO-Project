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

if (isset($_GET['delete_supplier'])) {

        $id=$_GET['delete_supplier'];
		$query_update3 = "delete from  supplier ";
	
		$query_update3 .="where id ={$id}";

		$update_query = mysqli_query($con, $query_update3);
		header("Location: all_suppliers.php");
}






if (isset($_GET['delete_approval'])) {

        $id=$_GET['delete_approval'];
		$query_update3 = "delete from  approvals ";
	
		$query_update3 .="where id ={$id}";

		$update_query = mysqli_query($con, $query_update3);
		header("Location: all_approvals.php");
}















if (isset($_GET['delete_site'])) {

        $id=$_GET['delete_site'];
		$query_update3 = "delete from  sites ";
	
		$query_update3 .="where site_id ={$id}";

		$update_query = mysqli_query($con, $query_update3);
		header("Location: all_sites.php");
}






if (isset($_GET['delete_user'])) {

        $id=$_GET['delete_user'];
		$query_update3 = "delete from  users ";
	
		$query_update3 .="where user_id ={$id}";

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

if (isset($_GET['delete_item'])) {

        $id=$_GET['delete_item'];
		$query_update3 = "delete from  items ";
	
		$query_update3 .="where id ={$id}";

		$update_query = mysqli_query($con, $query_update3);
		header("Location: all_items.php");
}

if (isset($_GET['delete_purchase'])) {

        $id=$_GET['delete_purchase'];
		$query_update3 = "delete from  submitted_pr ";
	
		$query_update3 .="where id ={$id}";

		$update_query = mysqli_query($con, $query_update3);
		header("Location: all_pr.php");
}



 ?>
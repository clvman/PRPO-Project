<?php
include ('includes/db.php') ;

//include ('includes/auth.php') ;

if (isset($_GET['comment_id'])) {

    $comment_id=$_GET['comment_id'];
    $ticket_id=$_GET['ticket'];
 
	$query="DELETE FROM `comment` WHERE  comment_id={$comment_id}"; 
	$result=mysqli_query($con,$query);





	header("Location: edit_ticket.php?ticket_id=$ticket_id");


}
 ?>
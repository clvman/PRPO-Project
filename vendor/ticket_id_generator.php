<?php 


function ticket_id_generator() {


include('includes/db.php');

$sql="Select `next_number` from `ticket_id_generator` where  `next_number` = "."(Select max(next_number)) order by `next_number` DESC limit 1" ;
$str_length = 5;
$query = mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($query);
$str = substr("0000{$row['next_number']}", -$str_length);
$ticket_id='INC'.date("Y").date("m").date("d").$str;
echo $ticket_id;




$sql_checker="Select * from `reserved_tickets` where  `ticket_id` = '$ticket_id'" ;
$query_checker = mysqli_query($con,$sql_checker);
          if(mysqli_num_rows($query_checker) > 0){

          	   // ticket_id is not new 
                        //echo '@@@@@@@@@@';
          	    $n='g';

                       
             
          } // for if(mysqli_num_rows($query_0) > 0){

         else
         
         {

				// updating next and last numbers in ticket_id_generator table 
				$next_number=$row['next_number']+1;
				$query_update = "UPDATE `ticket_id_generator` SET ";
				$query_update .= "`last_number_used`={$row['next_number']},";
				$query_update .= "`next_number`={$next_number} ";
				$query_update .= "WHERE `id`=1";
				$result_update=mysqli_query($con,$query_update);

				// inserting ticket_id to the reserved ticket codes


				$query_insert = "INSERT INTO `reserved_tickets`( `ticket_id`) VALUES ('$ticket_id' )";
				$result_insert = mysqli_query($con,$query_insert);

         } 	



}// for end function

echo  ticket_id_generator() ;




 ?>
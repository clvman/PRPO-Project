<?php 

include('../includes/db.php');



   // selecting all the breached tickets  from tickets table
   $sql = "SELECT * FROM `tickets` WHERE now()>=`ticket_due_date` AND `ticket_status`  NOT IN  ('Resolved','Closed')";
   $query = mysqli_query($con,$sql); 

   // checking if count of rows is bigger than zero or lesser
   if(mysqli_num_rows($query) > 0){

    
    // iteration over all the resulted tickets
  
    // while($row=mysqli_fetch_assoc($result)){
    while($row=mysqli_fetch_assoc($query)){
    
        

    	$ticket_id=$row['ticket_id'];
    	$sql_1="SELECT * FROM `sla_breached_tickets` WHERE breached_ticket_id='$ticket_id'";
    	$query_1 = mysqli_query($con,$sql_1); 
    	if(mysqli_num_rows($query_1) > 0){
    		echo "this ticket is already in sla breached tickets table<br>";
    	     }

    	else
    	{
          
          $sql_2="INSERT INTO `sla_breached_tickets`(`breached_ticket_id`) VALUES ('$ticket_id') ";
          $result = mysqli_query($con,$sql_2);

    	}




    } // for the while loop

   } // for $if(mysqli_num_rows($query) > 0){

   else
   {

   	echo "no ticket or no SLA breached tickets in tickets table";
   }


  
  
   


   echo "<br>END";




 ?>
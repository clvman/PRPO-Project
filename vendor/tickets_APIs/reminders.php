<?php 

include('../includes/db.php');

  //  !!!!!! PLEASE to conside ticket status for the reminders  !!!!


     // select from teams were role is operations 

      $sql_email_team ="Select `team_email` from `teams`";
      $query_email_team = mysqli_query($con,$sql_email_team);
      $row_email_team = mysqli_fetch_assoc($query_email_team);
      $team_email= $row_email_team['team_email'];
      //$team_email="amer.alsarayrah@jo.zain.com";



      // select minutes value from reminders based table

      $sql_minutes ="Select * from `reminders_base`";
      $query_minutes = mysqli_query($con,$sql_minutes);
      $row = mysqli_fetch_assoc($query_minutes);
      $minutes= (int)$row['update_every'];


     // selecting all the breached tickets  from tickets table
     $sql = "SELECT * FROM `reminders_logs` WHERE now()>=`next_reminder`";
     $query = mysqli_query($con,$sql); 

   // checking if count of rows is bigger than zero or lesser
   if(mysqli_num_rows($query) > 0){
     
     // while loop

     while($row=mysqli_fetch_assoc($query)){


    // selecting ticket details from tickets table

      $ticket_id = $row['ticket_id'];
      $next_reminder_old= $row['next_reminder'];
      $sql_ticket_details = " SELECT * FROM `tickets` where `ticket_id` = '$ticket_id' ; ";
      $query_ticket_details = mysqli_query($con,$sql_ticket_details);
      $row_ticket_details = mysqli_fetch_assoc($query_ticket_details);

      $created_on = $row_ticket_details['created_on'];
      $ticket_subject = $row_ticket_details['ticket_subject'];
      $ticket_severity = $row_ticket_details['ticket_severity'];
      $ticket_status = $row_ticket_details['ticket_status'];
      $ticket_requester = $row_ticket_details['ticket_requester'];
      $assigned_to = $row_ticket_details['assigned_to'];    
      $customer_name = $row_ticket_details['customer_name'];
      $ticket_due_date = $row_ticket_details['ticket_due_date'];
      


         // email below 
         $subject ='Reminder Email To Update The Customer || Ticket ID : '.$ticket_id.' ';
         $to =$team_email;
         $message = '
                  <html>
                  <head>

                  </head>
                  <body>

                  Dears,<br> 
                  <br>
                  This is an automated email to update the customer with the current status of below ticket: 
                  <br><br> 
                  <b>Ticket ID</b> : '.$ticket_id.'<br>
                  <b>Created On</b> : '.$created_on.'<br>
                  <b>Ticket Subject</b> : '.$ticket_subject.'<br>
                  <b>Ticket Severity</b> : '.$ticket_severity.'<br>
                  <b>Ticket Status</b> : '.$ticket_status.'<br>
                  <b>Ticket Requester</b> : '.$ticket_requester.'<br>
                  <b>Assigned To</b> : '.$assigned_to.'<br>
                  <b>Customer Name </b>: '.$customer_name.'<br>
                  <b>Ticket Due Date</b>  : '.$ticket_due_date.'<br>


                  </body>
                  </html>
             ';
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
        $headers .= 'From: Wholesale Customers Trouble Ticketing System<Wholesale.Trouble.Ticketing@jo.zain.com>' . "\r\n";
        $headers .=  "\r\n";

        mail($to,$subject,$message,$headers);



         // add it to the next reminder  


        $next_reminder2=date('Y-m-d H:i:s',strtotime(''.(int)$minutes.' minutes',strtotime($next_reminder_old)));
        $sql_reminders_logs="UPDATE `reminders_logs` SET `next_reminder`='$next_reminder2' WHERE `ticket_id` ='$ticket_id' ";
        $result_reminders_logs = mysqli_query($con,$sql_reminders_logs);  


    } // for the while loop

   } // for $if(mysqli_num_rows($query) > 0){

   else
   {

    echo "no ticket reminders";
   }


  
  
   


   echo "<br>END";




 ?>
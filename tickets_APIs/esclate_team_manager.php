<?php 

include('../includes/db.php');

  //  !!!!!! PLEASE to conside ticket status for the reminders  !!!!

     // select from teams were role is operations 

      $sql_email_team ="Select `team_email` from `teams`";
      $query_email_team = mysqli_query($con,$sql_email_team);
      $row_email_team = mysqli_fetch_assoc($query_email_team);
      $team_email= $row_email_team['team_email'];
      //$team_email="amer.alsarayrah@jo.zain.com";
    
   

     // selecting all the SENT is NO from Team Managers Escalations logs table and NOW>due_Date
     $sql = "SELECT * FROM `team_manager_escalation_logs` WHERE now()>=`team_manager_reminder` and `sent`='no'";
     $query = mysqli_query($con,$sql); 


    // checking if count of rows is bigger than zero or lesser
     if(mysqli_num_rows($query) > 0){   

       while($row=mysqli_fetch_assoc($query)){

        // getting the ticket ID
        $ticket_id = $row['ticket_id'];

         
         // getting more ticket details from tickets table
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

         
         //getting team Manager name and email from teams
         $sql_team = " SELECT * FROM `teams` where `team_name` = '$assigned_to' ; ";
         $query_team = mysqli_query($con,$sql_team);
         $row_team = mysqli_fetch_assoc($query_team);

         $team_manager= $row_team['team_manager_name'];
         $team_manager_email= $row_team['team_manager_email'];


         // email the team Manager  
         $subject ='Escalation Email || Ticket ID : '.$ticket_id.' ';
         $to =$team_email;
         $message = '
                  <html>
                  <head>

                  </head>
                  <body>

                  Dear '.$team_manager.' ,<br> 
                  <br>
                  This is an automated email to let you know that ticket ID :'.$ticket_id.' SLA Breached with below details: 
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
        $headers .= 'Cc:'.$team_email;
        $headers .=  "\r\n";


        mail($to,$subject,$message,$headers);
        

        // update Team Managers Escalations logs SENT TO YES 
        $sql_escalations_logs="UPDATE `team_manager_escalation_logs` SET `SENT`='Yes' WHERE `ticket_id` ='$ticket_id' ";
        $result_reminders_logs = mysqli_query($con,$sql_escalations_logs);  

          

     } // for the while loop
     }   // for mysqli_num_rows>0 

     else {

         echo "no ticket reminders";
     } // for the else 

   echo "<br>END";




 ?>
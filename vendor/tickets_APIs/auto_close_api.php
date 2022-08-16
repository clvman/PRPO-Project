<?php 

include('../includes/db.php');

// getting days from auto close table

$sql_day_autoClose ="SELECT `close_after` FROM `auto_close` ";
$query_day_autoClose = mysqli_query($con,$sql_day_autoClose);
$row_day_autoClose = mysqli_fetch_assoc($query_day_autoClose);
$auto_close_days = $row_day_autoClose['close_after'];

// select from teams were role is operations 

 $sql_email_team ="Select `team_email` from `teams`";
 $query_email_team = mysqli_query($con,$sql_email_team);
 $row_email_team = mysqli_fetch_assoc($query_email_team);
 $team_email= $row_email_team['team_email'];
 //$team_email="amer.alsarayrah@jo.zain.com";

// checking it with tickets of status resolved and now >=
   $sql_tickets = "SELECT * FROM `resolved_tickets` Where `is_closed` = 'NO' ";
   $query = mysqli_query($con,$sql_tickets); 


   if(mysqli_num_rows($query) > 0){

    while($row=mysqli_fetch_assoc($query)){

          $ticket_id=$row['ticket_id'];
          $resolution_date=$row['resolution_date'];
          //echo  'days  : '.$auto_close_days.'<br>';
          //echo  'resolved on  : '.$resolution_date.'<br>';
          $ticket_close_date=date('Y-m-d H:i:s',strtotime(''.$auto_close_days.' days',strtotime($resolution_date)));
          //echo 'ticket_close_date:'.$ticket_close_date.'<br>';
          $now = date('Y-m-d H:i:s').'<br>';
          //echo  'now : '.$now.'<br>';
          if ($now >= $ticket_close_date){
          	     echo "now greater than resolution date";
          	     // ticket shoulld be closed
                 $sql_close_ticket="UPDATE `tickets` SET `ticket_status`='Closed' WHERE `ticket_id` ='$ticket_id' ";
                 $result_close_ticket = mysqli_query($con,$sql_close_ticket);       

                 // updating is_cloed to be YES in resolved_ticket table

                  $sql_Is_Closed="UPDATE `resolved_tickets` SET `is_closed`='Yes' WHERE `ticket_id` ='$ticket_id' ";
                  $result_Is_Closed = mysqli_query($con,$sql_Is_Closed); 

                  // email below
                 $subject ='Auto Close process for Resolved Ticket ID : '.$ticket_id.' ';
                 $to =$team_email;
                 $message = '
                          <html>
                          <head>

                          </head>
                          <body>

                          Dears '.$team_email.' ,<br> 
                          <br>
                          This is an automated email to let you know that resolved ticket ID :'.$ticket_id.' has ben auto closed: 
                          <br>
                      


                          </body>
                          </html>
                     ';
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
                $headers .= 'From: Wholesale Customers Trouble Ticketing System<Wholesale.Trouble.Ticketing@jo.zain.com>' . "\r\n";
            
                $headers .=  "\r\n";


                mail($to,$subject,$message,$headers);



                                           	     
          	      }

          else { echo "resolution date is greater than now || PASS";  }  




   } // for the while loop
   } // for if rows>0
   else{

   	echo 'no founded tickets with YES status for Is_closed @ resolved tickets';
   }
  
   


 echo "<br>END";




 ?>
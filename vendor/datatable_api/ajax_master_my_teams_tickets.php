<?php 



include('../includes/db.php');
// include('../includes/auth.php')
$owner = $_GET['user'] ;


$sql_owner_teams ="Select * from `users` WHERE username='$owner' ";
//echo $sql_owner_teams.'<br>';
$query__owner_teams= mysqli_query($con,$sql_owner_teams);
$row_owner_teams = mysqli_fetch_assoc($query__owner_teams);
$owners_team= $row_owner_teams['team'];
$owners_email= $row_owner_teams['email'];


// $con=mysqli_connect('localhost','root','','nce_tt');

   $sql = "select * from (select * from 
(SELECT *,Date(`created_on`) as created_on2 , if(`resolution_date`,TIMESTAMPDIFF(DAY,`created_on`,`resolution_date`) ,TIMESTAMPDIFF(DAY,`created_on`,CURRENT_TIMESTAMP() )) AS SLA FROM tickets2 )
 A left join users B on A.owner =B.username) as AA where AA.team = '$owners_team' "; 
 
   $result = $con->query($sql);


  
   $json = array();
   while($row = $result->fetch_assoc()){
         $json[] = $row;

   }


   print json_encode($json);

 ?>
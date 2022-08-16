<?php 



//include('../includes/db.php');

$con=mysqli_connect('localhost','root','','nce_tt');

   $sql = "SELECT *,Date(`created_on`) as created_on2 , if(`resolution_date`,TIMESTAMPDIFF(DAY,`created_on`,`resolution_date`) ,TIMESTAMPDIFF(DAY,`created_on`,CURRENT_TIMESTAMP() )) AS SLA FROM tickets2"; 
 
   $result = $con->query($sql);


  
   $json = array();
   while($row = $result->fetch_assoc()){
         $json[] = $row;

   }


   print json_encode($json);

 ?>
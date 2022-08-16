<?php 



include('../includes/db.php');



   $sql = "SELECT * FROM `departments`"; 


   $result = $con->query($sql);


  
   $json = array();
   while($row = $result->fetch_assoc()){
         $json[] = $row;

   }


   print json_encode($json);

 ?>
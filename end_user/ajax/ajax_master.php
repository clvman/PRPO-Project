<?php 

$mysqli=mysqli_connect('localhost','root','','nce_tt');



   $sql = "SELECT * FROM tickets"; 


   $result = $mysqli->query($sql);


  
   $json = array();
   while($row = $result->fetch_assoc()){
         $json[] = $row;

   }


   print json_encode($json);

 ?>
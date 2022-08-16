<?php


$mysqli=mysqli_connect('localhost','root','','nce_tt');


   $sql = "SELECT * FROM severities
         WHERE severity_name ='".$_GET['severity']."' AND impact ='".$_GET['impact']."' "; 


   $result = $mysqli->query($sql);
    


   $json = [];
   while($row = $result->fetch_assoc()){
   	  
        $json['SLA_Hour'] = $row['SLA_Hour'];
   }


   echo json_encode($json);
?>
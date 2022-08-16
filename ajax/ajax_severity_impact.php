<?php


include('../includes/db.php');

   $sql = "SELECT * FROM severities
         WHERE severity_name LIKE '%".$_GET['severity']."%'"; 


   $result = $con->query($sql);


   $json = [];
   while($row = $result->fetch_assoc()){
        $json[$row['impact']] = $row['impact'];
   }


   echo json_encode($json);
?>
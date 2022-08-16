<?php


   include('../includes/db_config.php');


   $sql = "SELECT * FROM wholesale_customers
         WHERE customer_name LIKE '%".$_GET['customer_name']."%'"; 


   $result = $mysqli->query($sql);


   $json = [];
   while($row = $result->fetch_assoc()){
        $json[$row['Circuit_ID']] = $row['Circuit_ID'];
   }


   echo json_encode($json);
?>
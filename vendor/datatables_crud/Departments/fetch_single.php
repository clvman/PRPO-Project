  
<?php
include('db.php');
include('function.php');
if(isset($_POST["department_id"]))
{
 $output = array();
 $statement = $connection->prepare(
  "SELECT * FROM departments 
  WHERE department_id = '".$_POST["department_id"]."' 
  LIMIT 1"
 );
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output["Department_name"] = $row["department_name"];
  $output["Department_email"] = $row["department_email"];
  $output["Department_head"] = $row["department_head"];
  $output["Department_head_email"] = $row["department_head_email"];
  
 }
 echo json_encode($output);
}
?>
   
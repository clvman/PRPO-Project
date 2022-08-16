    
<?php

include('db.php');
include("function.php");

if(isset($_POST["department_id"]))
{

 $statement = $connection->prepare(
  "DELETE FROM departments WHERE department_id = :department_id"
 );
 $result = $statement->execute(
  array(
   ':department_id' => $_POST["department_id"]
  )
 );
 
 if(!empty($result))
 {
  echo 'Data Deleted';
 }
}



?>
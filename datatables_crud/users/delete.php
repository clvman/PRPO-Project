    
<?php

include('db.php');
include("function.php");

if(isset($_POST["user_id"]))
{

 $statement = $connection->prepare(
  "DELETE FROM users WHERE user_id = :user_id"
 );
 $result = $statement->execute(
  array(
   ':user_id' => $_POST["user_id"]
  )
 );
 
 if(!empty($result))
 {
  echo 'Data Deleted';
 }
}



?>
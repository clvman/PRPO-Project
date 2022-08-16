    
<?php

include('db.php');
include("function.php");

if(isset($_POST["team_id"]))
{

 $statement = $connection->prepare(
  "DELETE FROM teams WHERE team_id = :team_id"
 );
 $result = $statement->execute(
  array(
   ':team_id' => $_POST["team_id"]
  )
 );
 
 if(!empty($result))
 {
  echo 'Data Deleted';
 }
}



?>
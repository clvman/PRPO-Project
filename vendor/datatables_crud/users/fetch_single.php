  
<?php
include('db.php');
include('function.php');
if(isset($_POST["user_id"]))
{
 $output = array();
 $statement = $connection->prepare(
  "SELECT * FROM users 
  WHERE user_id = '".$_POST["user_id"]."' 
  LIMIT 1"
 );
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output["username"] = $row["username"];
  $output["email"] = $row["email"];
  $output["password"] = $row["password"];

  $output["role"] = $row["role"];

    $output["team"] = $row["team"];
 }
 echo json_encode($output);
}
?>
   
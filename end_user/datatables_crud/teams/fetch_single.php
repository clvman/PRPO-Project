  
<?php
include('db.php');
include('function.php');
if(isset($_POST["team_id"]))
{
 $output = array();
 $statement = $connection->prepare(
  "SELECT * FROM teams 
  WHERE team_id = '".$_POST["team_id"]."' 
  LIMIT 1"
 );
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output["team_name"] = $row["team_name"];
  $output["team_email"] = $row["team_email"];
  
 }
 echo json_encode($output);
}
?>
   
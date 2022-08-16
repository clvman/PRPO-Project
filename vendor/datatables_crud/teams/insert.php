  
<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
 if($_POST["operation"] == "Add")
 {

  
  $statement = $connection->prepare("
   INSERT INTO `teams`(`team_name`, `team_email`) VALUES  (:team_name, :team_email)
  ");
  $result = $statement->execute(
   array(
    ':team_name' => $_POST["team_name"],
    ':team_email' => $_POST["team_email"]
  
   )
  );
  if(!empty($result))
  {
   echo 'Data Inserted';
  }
  else {echo 'Team already registered !';}
 }
 if($_POST["operation"] == "Edit")
 {

 
  $statement = $connection->prepare(
   "UPDATE teams 
   SET team_name = :team_name, team_email = :team_email  
   WHERE team_id = :team_id
   "
  );
  
  $result = $statement->execute(
   array(
    ':team_name' => $_POST["team_name"],
    ':team_email' => $_POST["team_email"], 
    ':team_id' => $_POST["team_id"]
   )
  );

 //$arr = $statement->errorInfo();
//print_r($arr);
  if(!empty($result))
  {
   echo 'Data Updated';
  }
 }
}

?>
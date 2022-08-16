  
<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
 if($_POST["operation"] == "Add")
 {

  
  $statement = $connection->prepare("
   INSERT INTO `users`( `username`, `team`, `password`, `email`, `role`) VALUES (:username, :team,:password, :email, :role)
  ");
  $result = $statement->execute(
   array(
    ':username' => $_POST["username"],
    ':team' => $_POST["team"],
    ':password' => md5($_POST["password"]),
    ':email' => $_POST["email"],
    ':role' => $_POST["role"],

   )
  );
  //print_r($statement);
   //$arr = $statement->errorInfo();
   //print_r($arr);
  if(!empty($result))
  {
   echo 'Data Inserted';
  }
  else {echo 'Username already registered !';}
 }
 if($_POST["operation"] == "Edit")
 {

 
  $statement = $connection->prepare(
   "UPDATE users 
   SET username = :username,   team = :team ,
   password = :password, email = :email , role = :role
   WHERE user_id = :user_id
   "
  );
  
  $result = $statement->execute(
   array(
    ':username' => $_POST["username"],
    ':team' => $_POST["team"],
     ':password' => md5($_POST["password"]),
    ':email' => $_POST["email"], 
    ':role' => $_POST["role"], 
    ':user_id' => $_POST["user_id"]
   )
  );

 $arr = $statement->errorInfo();

  if(!empty($result))
  {
   echo 'Data Updated';
  }
 }
}

?>
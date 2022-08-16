  
<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
 if($_POST["operation"] == "Add")
 {

  
  $statement = $connection->prepare("
   INSERT INTO departments (`department_name`, `department_email`, `department_head`, `department_head_email`) 
   VALUES (:department_name, :department_email,:department_head, :department_head_email)
  ");
  $result = $statement->execute(
   array(
    ':department_name' => $_POST["Department_name"],
    ':department_email' => $_POST["Department_email"],
    ':department_head' => $_POST["Department_head"],
    ':department_head_email' => $_POST["Department_head_email"]
    
   )
  );
  if(!empty($result))
  {
   echo 'Data Inserted';
  }
  else {echo 'Department already registered !';}
 }
 if($_POST["operation"] == "Edit")
 {

 
  $statement = $connection->prepare(
   "UPDATE departments 
   SET department_name = :department_name, department_email = :department_email , department_head = :department_head, department_head_email = :department_head_email 
   WHERE department_id = :department_id
   "
  );
  $result = $statement->execute(
   array(
    ':department_name' => $_POST["Department_name"],
    ':department_email' => $_POST["Department_email"],
    ':department_head' => $_POST["Department_head"],
    ':department_head_email' => $_POST["Department_head_email"],    
    ':department_id'   => $_POST["department_id"]
   )
  );
  if(!empty($result))
  {
   echo 'Data Updated';
  }
 }
}

?>

<?php
 
include('includes/db.php');

if (isset($_POST['username'])){
  $username = stripslashes($_POST['username']);
  // $username = mysqli_real_escape_string($con,$username);
  // $username = preg_replace('/\s+/', '', $username);

  $password = stripslashes($_POST['password']);
  $password = mysqli_real_escape_string($con,$password);

  // checking if the user have record in users table at first place
  // $query = "SELECT * FROM `users` WHERE ( Lower(`username`)= Lower('$username') and password='".md5($password)."')";
  $query = "SELECT * FROM `users` LEFT JOIN approvals ON `users`.team = `approvals`.team WHERE ( Lower(`username`)= Lower('$username') and password='".md5($password)."')";
  $result = mysqli_query($con,$query) or die(mysql_error());
  $row=mysqli_fetch_assoc($result);
  // print_r($row);
  $rows = mysqli_num_rows($result);
  if($rows==1){
    // this user is in users table
    // will check his teams's role
    $team_name  = $row['team'];
    $real_username = $row['username'];
    $email = $row['email'];
    $reporting_to = $row['reporting_to'];
    $level = $row['level'];
            
    $query = "SELECT `approvals`.*, `users`.email FROM `approvals` LEFT JOIN `users` ON `approvals`.team = `users`.team";
    $result = mysqli_query($con,$query) or die(mysql_error());
    // $row_approvals=mysqli_fetch_assoc($result);
    $approvals = [];
    while($row_approval = mysqli_fetch_assoc($result)) {
      array_push($approvals, $row_approval);
    }
    // print_r($approvals, $row_approval);

    // $query_team = "SELECT * FROM `teams` WHERE (team_name='$team_name')";
    // $result_team = mysqli_query($con,$query_team) or die(mysql_error());
    // $row_team=mysqli_fetch_assoc($result_team);
    // echo '<br>'.$row_team['role'].'<br>';

    session_start();     
    $_SESSION['PRPO_Current_User'] = $real_username;    
    $_SESSION['team_name'] = $team_name;
    $_SESSION['email'] = $email;
    $_SESSION['reporting_to'] = $reporting_to;
    $_SESSION['level'] = $level;
    $_SESSION['approvals'] = $approvals;

    $_SESSION['logged_in'] = true; //set you've logged in
    $_SESSION['last_activity'] = time(); //your last activity was now, having logged in.
    $_SESSION['expire_time'] = 14400; //expire time in seconds: 4 hours 

    header("Location: add_pr.php");
  }else{
    echo 'B';
    header("Location:login.php");
  }
}
?>

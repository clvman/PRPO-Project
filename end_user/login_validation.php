
<?php
 
include('includes/db.php');

if (isset($_POST['username'])){
  $username = stripslashes($_POST['username']);
  $username = mysqli_real_escape_string($con,$username);
  $username = preg_replace('/\s+/', '', $username);



  $password = stripslashes($_POST['password']);
  $password = mysqli_real_escape_string($con,$password);

// checking if the user have record in users table at first place

  $query = "SELECT * FROM `users` WHERE (  Lower(`username`)= Lower('$username') and password='".md5($password)."')";
  $result = mysqli_query($con,$query) or die(mysql_error());
  $row=mysqli_fetch_assoc($result);

  $rows = mysqli_num_rows($result);
        if($rows==1){

          // this user is in users table
          // will check his teams's role
            $team_name  = $row['team'];
            $real_username = $row['username'];
  $query_team = "SELECT * FROM `teams` WHERE (team_name='$team_name')";
  $result_team = mysqli_query($con,$query_team) or die(mysql_error());
  $row_team=mysqli_fetch_assoc($result_team);

  if ($row_team['role']== 'End User' or $row_team['role']== 'Admin') {
       session_start();     
      $_SESSION['NCE_TT_end_user'] = $real_username;

      //$role= $row['role'];
     // $_SESSION['pic'] = $row['img'];
 
    
    $_SESSION['logged_in'] = true; //set you've logged in
    $_SESSION['last_activity'] = time(); //your last activity was now, having logged in.
    $_SESSION['expire_time'] = 14400; //expire time in seconds: 4 hours 


 
      header("Location: my_tickets.php");
  }
else{
 // echo $row_team;
  header("Location:login.php");
  }

         }else{
           // echo 'B';
  header("Location:login.php");
  }
    }
?>

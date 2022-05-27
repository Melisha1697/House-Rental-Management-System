<?php
  session_start();
    $host="localhost";
    $user="root";
    $password="";
    $dbname="rental_system_db";
    $conn = mysqli_connect($host, $user, $password, $dbname);

    if($conn===false){
      die("Connection Failed");
    }

    if($_SERVER["REQUEST_METHOD"]=="POST"){
      $username=$_POST["user_name"];
      $password=$_POST["user_password"];
      $sql="SELECT *FROM users WHERE username= '".$username."' AND password = '".$password."'";
      $result= mysqli_query($conn, $sql);
      $row=mysqli_fetch_array($result);
      if($row["usertype"]=="user"){
        $_SESSION["username"]=$username;
        header("location:userhome.php");
      }
      elseif($row["usertype"]=="admin"){
        $_SESSION["username"]=$username;
        header("location:adminhome.php");
      }
      else{
        echo "username or password is incorrect";
      }
    }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/css/login.css">
  <title>Log In</title>
</head>
<body>
  <div class="login-box">
  <h1>Login</h1>
  <form action="#" method="post">
  <div class="textbox">
      <img src="./assets/img/user.jpg">
      <input type="text" name="user_name" placeholder="Username" required>
    </div>
    <div class="textbox">
      <img src="./assets/img/lock.jpg">
      <input type="password" name="user_password" placeholder="Password" required>
    </div>
    <input class="btn" type="button" value="Log In" name="log" >
    <div class="remarks">
      <input type="checkbox"> <span>Remember me?</span> 
      <a href="register.php"> Forgot password?</a>
    </div>
    <div class="register">
        <a href="register.php">Register Now</a>
    </div>
    </div>
  </form>
</body>
</html>
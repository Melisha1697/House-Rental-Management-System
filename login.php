<?php include('./config/db_conn.php');
session_start();
if(isset($_POST['log'])){
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT *FROM register WHERE email='$email' AND password ='$password'";
  $result= mysqli_query($conn, $sql);
  if($result->num_rows > 0){
    $row = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $row['username'];
    header("Location: ");
  }else{
    echo "<script>alter('Woops! Email or Password is incorrect')</script>";
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
  <form action="login.php" method="post">
  <div class="textbox">
      <img src="./assets/img/email.png" style="width: 25px;">
      <input type="text" name="email" placeholder="Email" value="<?php echo $email; ?>" required>
    </div>
    <div class="textbox">
      <img src="./assets/img/lock.png">
      <input type="password" name="password" placeholder="Password" value="<?php echo  $_POST['password']; ?>"required>
    </div>
    <input class="btn" type="submit" value="Log In" name="log" >
    <div class="remarks">
      <a href="register.php"> Forgot password?</a>
    </div>
    <div class="register">
        <span class="login-register-text">Don't have account?</span> 
        <a href="register.php">Register Here</a>
    </div>
    </div>
  </form>
</body>
</html>
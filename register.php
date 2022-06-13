<?php include('./config/db_conn.php');
error_reporting(0);
if(isset($_POST['register'])){
 $username = $_POST['username'];
 $email = $_POST['email'];
 $password = md5($_POST['password']);
 $cpassword = md5($_POST['cpassword']);
 $usertype= $_POST['usertype'];


if($password == $cpassword){
  $sql = "SELECT * FROM register WHERE email = '$email' AND password = '$password'";
  $result = mysqli_query($conn, $sql);
  if(!$result->num_rows>0){
    $sql = "INSERT INTO register (username, email, password, cpassword)
    VALUES ('$username', '$email','$password', '$cpassword')";
    $result = mysqli_query($conn, $sql);
  
    if($result){
      echo"<script>alert('Successfully Registered')</script>";
      $username = "";
      $email = "";
      $_POST['password'] = "";
      $_POST['cpassword'] = "";
  }else{
    echo"<script>alert('Woops! Something wrong')</script>";
    }
  }else{
      echo"<script>alert('Woops! Email Already Exists')</script>";
    }
  }else{
  echo"<script>alert('Password Not Matched')</script>";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/css/register.css">
  <title>Register Now</title>
</head>
<body>
  <div class="login-box">
  <h1>Register</h1>
  <form action="register.php" method="post">
  <div class="textbox">
      <img src="./assets/img/user.png" style="width: 27px;">
      <input type="text" name="username"  value="<?php echo $username; ?>" placeholder="Username" required>
    </div>
    <div class="textbox">
      <img src="./assets/img/email.png">
      <input type="email" name="email" value="<?php echo $email; ?>" placeholder="Email" required>
    </div>
    <div class="textbox">
      <img src="./assets/img/lock.png">
      <input type="password" name="password" value="<?php echo $_POST['password']; ?>" placeholder="Password" required>
    </div>
    <div class="textbox">
      <img src="./assets/img/lock.png">
      <input type="password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" placeholder="Confirm Password" required>
    </div>
    <select name="usertype" value="<?php echo $usertype; ?>">
      <option value="" style="color: grey;">-Select-</option>
      <option value="">Landlord</option>
      <option value="">Renter</option>
      <option value="">Licensed Agent</option>
      </select>
    <input class="btn" type="submit" value="Register" name="register" >
    <div class="register">
        <span>Already have an account?</span><a href="login.php">Login Here</a>
    </div>
    </div>
  </form>
</body>
</html>


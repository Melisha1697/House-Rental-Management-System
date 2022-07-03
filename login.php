<?php 
include('./config/db_conn.php');
error_reporting(0);
if(isset($_COOKIE["user"])){
  header("location:userhome.php");
}

if(isset($_COOKIE["admin"])) {
  header("location:admin/");
}

if(isset($_POST['log'])){
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  if($email == 'admin@gmail.com') {
    $sql = "SELECT * FROM users WHERE username='$username' AND  email='$email' AND password ='$password' AND usertype = 'Admin'";
  } else {
    $sql = "SELECT * FROM users WHERE username='$username' AND  email='$email' AND password ='$password'";
  }
  $result= mysqli_query($conn, $sql);
  if($result->num_rows > 0){
    echo  "<script>alert('Login Successful.')</script>";
    if($email == 'admin@gmail.com') {
      setcookie("username", $username, time() + (86400 * 30), "/");
      setcookie("admin", $email, time() + (86400 * 30), "/"); // 1 month
      header("location:admin/");
    } else {
      setcookie("username", $username , time() + (86400 * 30), "/");
      setcookie("user", $email, time() + (86400 * 30), "/"); // 1 month
      header("location:userhome.php");
    }
  }else{
    echo "<script>alert('Woops! Email or Password is incorrect')</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="./assets/css/login.css">
</head>

<body>
    <header>
        <a href="/real_estate_website" class="logo">AAFNO PAAN</a>

        <nav class="navbar">
            <a href="/real_estate_website#home">Home</a>
            <a href="/real_estate_website#services">Services</a>
            <a href="/real_estate_website#featured">Featured</a>
            <a href="/real_estate_website#agents">Agents</a>
            <a href="/real_estate_website#contact">Contact</a>
            <a href="faq.php">FAQ</a>
        </nav>
        <div class="icons">
            <div id="menu-bars" class="fas fa-bars"></div>
            <div class="mode">
                <input type="checkbox" class="checkbox" id="chk" />
                <label class="label" for="chk">
                    <i class="fas fa-moon"></i>
                    <i class="fas fa-sun"></i>
                    <div class="ball"></div>
                </label>
            </div>
        </div>
    </header>

    <div class="login-box">
        <h1>Login</h1>
        <form action="login.php" method="post">
            <div class="textbox">
                <img src="./assets/img/user.png" style="width: 25px;">
                <input type="text" name="username" placeholder="Username" value="<?php echo $username;?>" required>
            </div>
            <div class="textbox">
                <img src="./assets/img/email.png" style="width: 25px;">
                <input type="text" name="email" placeholder="Email" value="<?php echo $email;?>" required>
            </div>
            <div class="textbox">
                <img src="./assets/img/lock.png">
                <input type="password" name="password" placeholder="Password" value="<?php echo  $_POST['password']; ?>"
                    required>
            </div>
            <input class="login-btn" type="submit" value="Log In" name="log">
            <div class="login">
                <span class="login-register-text">Don't have an account?</span>
                <br>
                <a href="register.php">Register Here</a>
            </div>
        </form>
    </div>
    <script>
    const chk = document.getElementById('chk');

    chk.addEventListener('change', () => {
        document.body.classList.toggle('dark');
    });
    </script>
</body>

</html>
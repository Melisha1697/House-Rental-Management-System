<?php include('./config/db_conn.php');
  error_reporting(0);
  if(isset($_POST['register'])){
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $citizenship = $_POST['citizenship'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $usertype= $_POST['usertype'];
    $phone= $_POST['phone'];
    $password= $_POST['password'];
    $cpassword= $_POST['cpassword'];
    $username= $_POST['username'];


    if($password == $cpassword){
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $sql);

        
        if(!$result->num_rows>0){
            // Insert image content into database 
            $sql = "INSERT INTO `users`(`full_name`, `email`, `citizenship`, `address`, `dob`, `usertype`, `phone`, `password`, `username`) 
            VALUES ('$full_name','$email','$citizenship','$address','$dob','$usertype','$phone','$password', '$username')";
            
            $result = mysqli_query($conn, $sql);
            
            if($result){
              echo"<script>alert('Successfully Registered')</script>";
              $username = "";
              $email = "";
              $_POST['password'] = "";
              $_POST['cpassword'] = "";
            } else {
              echo"<script>alert('Woops! Something wrong')</script>";
            }
        } else{
          echo"<script>alert('Woops! Email Already Exists')</script>";
        }
    } else{
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
    <header>
        <a href="/meli" class="logo">AAFNO PAAN</a>

        <nav class="navbar">
            <a href="/real_estate_website#home">Home</a>
            <a href="/real_estate_website#services">Services</a>
            <a href="/real_estate_website#featured">Featured</a>
            <a href="/real_estate_website#agents">Agents</a>
            <a href="/real_estate_website#contact">Contact</a>
            <a href="help.php">Help</a>
        </nav>
    </header>
    <div class="login-box">
        <h1>Register</h1>
        <form action="register.php" method="post">
            <div class="textbox">
                <img src="./assets/img/user.png" style="width: 27px;">
                <input type="text" name="full_name" placeholder="Full Name" required>
            </div>
            <div class="textbox">
                <img src="./assets/img/user.png" style="width: 27px;">
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="textbox">
                <img src="./assets/img/email.png">
                <input type="email" name="email" value="<?php echo $email; ?>" placeholder="Email" required>
            </div>
            <div class="textbox">
                <img src="./assets/img/citizenship.png">
                <input type="number" name="citizenship" placeholder="Citizenship" required>
            </div>
            <div class="textbox">
                <img src="./assets/img/address.png">
                <input type="text" name="address" placeholder="Address" required>
            </div>
            <div class="textbox">
                <img src="./assets/img/date.png">
                <input type="text" name="dob" min="10" placeholder="Date of birth" required>
            </div>
            <select name="usertype">
                <option value="" style="color: grey;">-Select-</option>
                <option value="Landlord">Landlord</option>
                <option value="Renter">Renter</option>
                <option value="Licensed Agent">Licensed Agent</option>
            </select>
            <div class="textbox">
                <img src="./assets/img/phone.png">
                <input type="number" name="phone" placeholder="Phone" required>
            </div>
            <div class="textbox">
                <img src="./assets/img/lock.png">
                <input type="password" name="password" value="<?php echo $_POST['password']; ?>" placeholder="Password"
                    required>
            </div>
            <div class="textbox">
                <img src="./assets/img/lock.png">
                <input type="password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>"
                    placeholder="Confirm Password" required>
            </div>

            <input type="submit" value="Register" name="register" class="register-btn">
            <div class="register">
                <span>Already have an account?</span><a href="login.php">Login Here</a>
            </div>
    </div>
    </form>
    </div>
</body>

</html>
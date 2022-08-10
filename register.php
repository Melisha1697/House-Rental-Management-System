<?php 
include('./config/db_conn.php');


  if(isset($_POST['register']) && !empty($_FILES['user']['name'])){
    
    $password= $_POST['password'];
    $cpassword= $_POST['cpassword'];
    $email = $_POST['email'];
    $targetDir = "./admin/uploads/users";
    $fileName = basename($_FILES["user"]["name"]);//file name sent by users is saved in basename
    $targetFilePath = $targetDir . $fileName;//the path of where the user has stored the image 
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);//kun file type ho vanera chinna 
    $allowTypes = array('jpg','png','jpeg','gif');//ani kasto file lai chai allow garena


    $full_name= $_POST['full_name'];
    $citizenship= $_POST['citizenship'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $usertype = 'Tenants';
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $facebook = $_POST['facebook'];
    $twitter = $_POST['twitter'];
    $instagram = $_POST['instagram'];


    if($password == $cpassword){
        $sql = "SELECT * FROM `users` WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $sql);

        if(!$result->num_rows>0){
            if(move_uploaded_file($_FILES["house"]["tmp_name"], $targetFilePath)){//targeted file lai chai 
                $sql = "INSERT INTO `users`(`full_name`, `email`, `citizenship`, `address`, `dob`, `usertype`, `phone`, `password`, `username`, `user_img`, `facebook`, `twitter`, `instagram`) 
            VALUES ('$full_name','$email','$citizenship','$address','$dob','$usertype','$phone','$password','$username', '$fileName' , '$facebook', '$twitter', '$instagram')";
            
            $result = mysqli_query($conn, $sql);
            
            if($result){
                echo"<script>alert('Successfully Registered')</script>";
                header('location: ./login.php');
              } else {
                echo"<script>alert('Woops! Something wrong')</script>";
              }
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="./assets/css/register.css">
    <title>Register Now</title>
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

        <form enctype="multipart/form-data" action="" method="post">
            <h1>Register</h1>
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
                <input type="email" name="email" placeholder=" Email" required>
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
            <div class="textbox">
                <img src="./assets/img/phone.png">
                <input type="number" name="phone" placeholder="Phone" required>
            </div>
            <div class="textbox">
                <img src="./assets/img/lock.png">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="textbox">
                <img src="./assets/img/lock.png">
                <input type="password" name="cpassword" placeholder="Confirm Password" required>
            </div>
            <div class="textbox">
                <img src="./assets/img/phone.png">
                <input type="text" name="facebook" placeholder="Facebook">
            </div>
            <div class="textbox">
                <img src="./assets/img/phone.png">
                <input type="text" name="twitter" placeholder="Twitter">
            </div>
            <div class="textbox">
                <img src="./assets/img/phone.png">
                <input type="text" name="instagram" placeholder="Instagram">
            </div>
            <div class="textbox">
                <img src="./assets/img/phone.png">
                <input type="file" name="user">
            </div>

            <input type="submit" value="Register" name="register" class="register-btn">
            <div class="register">
                <span>Already have an account?</span><a href="login.php">Login Here</a>
            </div>
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

</html>
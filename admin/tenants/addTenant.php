<?php
if(!isset($_COOKIE['admin'])){
    header("location:../../login.php");
}

include '../../config/db_conn.php';

if(isset($_POST['add']) && !empty($_FILES['user']['name'])){
    $targetDir = "../uploads/users/";
    $fileName = basename($_FILES["user"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    $allowTypes = array('jpg','png','jpeg','gif');
    $full_name= $_POST['full_name'];
    $email = $_POST['email'];
    $citizenship= $_POST['citizenship'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $usertype = 'Tenants';
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $username = $_POST['username'];

    if($password != $confirm_password) {
        echo "<script>alert('Password not matched.')</script>";
    } else if(move_uploaded_file($_FILES["user"]["tmp_name"], $targetFilePath)){
        $query = "INSERT INTO `users`(`full_name`, `email`, `citizenship`, `address`, `dob`, `usertype`, `phone`, `password`, `username`, `user_img`) 
        VALUES ('$full_name','$email','$citizenship','$address','$dob','$usertype','$phone','$password','$username', '$fileName')";
        
        $result= mysqli_query($conn, $query);
        header('location: ./');
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Tenant</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="../assets/js/tableExport.min.js"></script>

    <script src="../assets/js/export.js"></script>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>

<body>
    <div class="container">
        <?php include '../menu.php' ?>
        <!-- main -->
        <main class="form1">
            <form action="" method="POST" enctype="multipart/form-data">
                <h1 class="">Add Tenant Details</h1>
                <br>
                <div class="form-main">

                    <div class="textbox">
                        <label for="full_name">Full Name</label>
                        <input type="text" name="full_name" required>
                    </div>
                    <div class="textbox">
                        <label for="username">Username</label>
                        <input type="text" name="username" required>
                    </div>
                    <div class="textbox">
                        <label for="email">Email</label>
                        <input type="email" name="email" required>
                    </div>
                    <div class="textbox">
                        <label for="citizenship">Citizenship No.</label>
                        <input type="number" name="citizenship" required>
                    </div>
                    <div class="textbox">
                        <label for="address">Address</label>
                        <input type="text" name="address" required>
                    </div>
                    <div class="textbox">
                        <label for="dob">Date of Birth</label>
                        <input type="date" name="dob" required>
                    </div>
                    <div class="textbox">
                        <label for="phone">Contact No.</label>
                        <input type="tel" name="phone">
                    </div>
                    <br>
                    <div class="textbox">
                        <label for="password">Password</label>
                        <input type="password" name="password">
                    </div>
                    <div class="textbox">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" name="confirm_password">
                    </div>
                    <div class="textbox w-full">
                        <label for="user">Image</label>
                        <input type="file" name="user">
                    </div>


                    <input type="submit" value="Add" name="add" class="button w-full" />
                </div>
            </form>
        </main>
    </div>
</body>

</html>
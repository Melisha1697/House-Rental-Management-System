<?php
    if(!isset($_COOKIE['admin'])){
        header("location:../../login.php");
    }
    
    include '../../config/db_conn.php';

    $id =$_GET['id'];
    $query = "Select * from users WHERE user_id = '$id' AND usertype = 'Tenants'";

    $result = mysqli_query($conn, $query);
    $res= mysqli_fetch_assoc($result);

    if(isset($_POST['update'])){
        $targetDir = "../uploads/users/";
        $fileName = basename($_FILES["user"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    
        $full_name= $_POST['full_name'];
        $email = $_POST['email'];
        $citizenship= $_POST['citizenship'];
        $address = $_POST['address'];
        $dob = $_POST['dob'];
        $usertype = 'Tenants';
        $phone = $_POST['phone'];
        $username = $_POST['username'];
        $facebook = $_POST['facebook'];
        $twitter = $_POST['twitter'];
        $instagram = $_POST['instagram'];
        
        
        if (!empty($_FILES['user']['name'])){
            $targetDir = "../uploads/";
            $fileName = basename($_FILES["user"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            
            $allowTypes = array('jpg','png','jpeg','gif');
        
        if(move_uploaded_file($_FILES["user"]["tmp_name"], $targetFilePath)){
            $sql = "UPDATE `users` SET `full_name`='$full_name',`email`='$email',`citizenship`='$citizenship',`address`='$address',`dob`='$dob',`usertype`='$usertype',`phone`='$phone',`username`='$username', `user_img` = '$fileName', `facebook` = '$facebook', `twitter` = '$twitter', `instagram` = '$instagram' WHERE `user_id` = '$id' AND usertype = 'Tenants'";
            
            $result2 = mysqli_query($conn, $sql);
        } 
        }else{
            $sql = "UPDATE `users` SET `full_name`='$full_name',`email`='$email',`citizenship`='$citizenship',`address`='$address',`dob`='$dob',`usertype`='$usertype',`phone`='$phone',`username`='$username', `facebook` = '$facebook', `twitter` = '$twitter', `instagram` = '$instagram' WHERE `user_id` = '$id' AND usertype = 'Tenants'";
            
            $result2 = mysqli_query($conn, $sql);
        }
        header('location: ./');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Tenant</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="../assets/js/tableExport.min.js"></script>

    <script src="../assets/js/export.js"></script>
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link rel="stylesheet" href="../assets/css/menu.css">
</head>

<body>
    <div class="container">
        <?php include '../menu.php' ?>
        <!-- main -->
        <main class="form1">
            <form action="" method="POST" enctype="multipart/form-data">
                <h1 class="">Update Tenant Details</h1>
                <br>
                <div class="form-main">
                    <div class="textbox">
                        <label for="full_name">Full Name</label>
                        <input type="text" name="full_name" value="<?php echo $res['full_name'] ?>" required>
                    </div>
                    <div class="textbox">
                        <label for="username">Username</label>
                        <input type="text" name="username" value="<?php echo $res['username'] ?>" required>
                    </div>
                    <div class="textbox">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="<?php echo $res['email'] ?>" required>
                    </div>
                    <div class="textbox">
                        <label for="citizenship">Citizenship No.</label>
                        <input type="number" name="citizenship" value="<?php echo $res['citizenship'] ?>" required>
                    </div>
                    <div class="textbox">
                        <label for="address">Address</label>
                        <input type="text" name="address" value="<?php echo $res['address'] ?>" required>
                    </div>
                    <div class="textbox">
                        <label for="dob">Date of Birth</label>
                        <input type="date" name="dob" value="<?php echo $res['dob'] ?>" required>
                    </div>
                    <div class="textbox">
                        <label for="phone">Contact No.</label>
                        <input type="tel" value="<?php echo $res['phone'] ?>" name="phone">
                    </div>
                    <div class="textbox">
                        <label for="facebook">Facebook</label>
                        <input type="text" value="<?php echo $res['facebook'] ?>" name="facebook">
                    </div>
                    <div class="textbox">
                        <label for="twitter">Twitter</label>
                        <input type="text" value="<?php echo $res['twitter'] ?>" name="twitter">
                    </div>
                    <div class="textbox">
                        <label for="instagram">Instagram</label>
                        <input type="text" value="<?php echo $res['instagram'] ?>" name="instagram">
                    </div>
                    <br>
                    <div style="margin: 1rem;">
                        <?php
                            $imageURL = '../uploads/users/'. $res["user_img"];
                        ?>
                        <img width="150px" height="150px" src="<?php echo $imageURL; ?>" alt="" />
                    </div>
                    <div class="textbox w-full">
                        <label for="user">Image</label>
                        <input type="file" name="user">
                    </div>


                    <input type="submit" value="Update" name="update" class="button" />
                </div>
            </form>
        </main>
    </div>
</body>

</html>
<?php
if(!isset($_COOKIE['admin'])){
    header("location:../../login.php");
}

include '../../config/db_conn.php';

if(isset($_POST['add'])){
    $title= $_POST['title'];
    $description = $_POST['description'];

    $query = "INSERT INTO `faqs`(`title`, `description`) 
    VALUES ('$title','$description')";
    
    $result= mysqli_query($conn, $query);
    header('location: ./');
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
    <link rel="stylesheet" href="../assets/css/menu.css">
</head>

<body>
    <div class="container">
        <?php include '../menu.php' ?>
        <!-- main -->
        <main class="form1">
            <form action="" method="POST">
                <h1 class="">Add FAQ</h1>
                <br>
                <div class="form-main faq">

                    <div class="textbox">
                        <label for="title">Title</label>
                        <input type="text" name="title" required>
                    </div>
                    <br>

                    <div class="textbox">
                        <label for="description">Description</label>
                        <textarea name="description"></textarea>
                    </div>


                    <input type="submit" value="Add" name="add" class="button w-full" />
                </div>
            </form>
        </main>
    </div>
</body>

</html>
<?php
if(!isset($_COOKIE['admin'])){
    header("location:../../login.php");
}

include '../../config/db_conn.php';

$id = $_GET['id'];
$query = "Select * from faqs where faq_id= '$id'";

$result = mysqli_query($conn, $query);
$res= mysqli_fetch_assoc($result);

if(isset($_POST['update'])){
    $title= $_POST['title'];
    $description = $_POST['description'];

    $query = "UPDATE `faqs` SET `title`='$title',`description`='$description' WHERE faq_id = '$id'";
    
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
    <title>Update FAQ</title>
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
            <form action="" method="POST">
                <h1 class="">Update FAQ</h1>
                <br>
                <div class="form-main faq">

                    <div class="textbox">
                        <label for="title">Title</label>
                        <input type="text" name="title" value="<?php echo $res['title'] ?>" required>
                    </div>
                    <br>

                    <div class="textbox">
                        <label for="description">Description</label>
                        <textarea name="description"><?php echo $res['description'] ?></textarea>
                    </div>


                    <input type="submit" value="Update" name="update" class="button w-full" />
                </div>
            </form>
        </main>
    </div>
</body>

</html>
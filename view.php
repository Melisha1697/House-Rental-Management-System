<?php
    include './config/db_conn.php';
    $id =$_GET['id'];
    $query = "Select * from houses where id = '$id'";
    
    $result = mysqli_query($conn, $query);
    $res= mysqli_fetch_assoc($result);


    $houseQuery = "SELECT * FROM `house_images` WHERE id =". $res["Image"]." LIMIT 1";
    $result2 = mysqli_query($conn, $houseQuery);
    $res2 = mysqli_fetch_assoc($result2);

    if(isset($_POST['search'])){
        $title = $_POST['title'];
        
        $query = "SELECT * FROM houses WHERE (`title` LIKE '%". $title. "%')";
        $result= mysqli_query($conn, $query);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $res['title'] ?></title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="./assets/js/tableExport.min.js"></script>

    <script src="./assets/js/export.js"></script>
    <link rel="stylesheet" href="./assets/css/view.css">
    <link rel="stylesheet" href="./assets/css/user.css">
</head>

<body>
    <header>
        <a href="index.php" class="logo">
            <span> AAFNO </span> PAAN
        </a>
        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#services">services</a>
            <a href="#featured">featured</a>
            <a href="#agents">agents</a>
            <a href="#contact">contact</a>
            <a href="faq.php">FAQ</a>
        </nav>

        <div class="icons">
            <div id="menu-bars" class="fas fa-bars"></div>
            <a href="login.php" class="fas fa-user" title="Login Here!"></a>
            <a href="register.php" class="fas fa-sign-in-alt" title="Register From Here!!"></a>
        </div>
    </header>

    <section class="home" id="home">
        <section class="banner">
            <div class="buttons-container">
                <form action="" method="POST" class="search">
                    <input type="text" name="title" placeholder="Search by title">
                    <input type="submit" name="search" value="Search" class="button">
                </form>
            </div>

        </section>
    </section>

    <div class="image-container">
        <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($res2['image']).'"/>' ?>
        <div class="info">
            <h3>for rent</h3>
        </div>
    </div>

</body>

</html>
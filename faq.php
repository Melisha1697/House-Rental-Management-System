<?php
    if(!isset($_COOKIE['username'])){
        header("location:./login.php");
    }

    include './config/db_conn.php';

    $query = "SELECT * FROM faqs";
    $result= mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQs</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="./assets/js/tableExport.min.js"></script>

    <script src="./assets/js/export.js"></script>
    <link rel="stylesheet" href="./assets/css/user.css">

    <script src="./admin/assets/js/faq.js" defer>

    </script>

</head>

<body>
    <?php //echo $_SESSION["username"]?>
    <div class="container">
        <?php include './menu.php' ?>
        <!------------------End of Aside----------------------->
        <main>
            <h1 class="faq1" style="margin-left: 9px;">FAQ</h1>
            <div class="tenants">
                <h2> Tenants / Renters</h2>
            </div>
            <div class=" accordion">
                <?php
                    while($res = mysqli_fetch_array($result)){
                ?>

                <div class="accordion-item">
                    <div class="accordion-item-header">
                        <?php echo $res['title']; ?>
                    </div>
                    <div class="accordion-item-body">
                        <div class="accordion-item-body-content">
                            <p><?php echo $res['description']; ?></p>
                        </div>
                    </div>
                </div>
                <?php 
                }
                ?>
            </div>
        </main>
    </div>
</body>

</html>
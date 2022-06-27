<?php
if(!isset($_COOKIE['admin'])){
    header("location:../login.php");
}
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
    <script src="./assets/js/faq.js" defer>

    </script>
    <link rel="stylesheet" href="./assets/css/admin.css">
</head>

<body>
    <?php //echo $_SESSION["username"]?>
    <div class="container">
        <?php include './menu.php' ?>
        <!------------------End of Aside----------------------->
        <main>
            <h1>FAQ</h1>
            <div class="houseowner">
                <h2> Houseowner</h2>
            </div>
            <div class="accordion">
                <div class="accordion-item">
                    <div class="accordion-item-header">
                        What is Affno paan?
                    </div>
                    <div class="accordion-item-body">
                        <div class="accordion-item-body-content">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam excepturi incidunt
                                est
                                commodi perferendis. Minima impedit tenetur ipsum nostrum repudiandae itaque,
                                corrupti
                                cum, voluptatum quis ad ducimus perspiciatis debitis fuga.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-item-header">
                        Why Affno paan?
                    </div>
                    <div class="accordion-item-body">
                        <div class="accordion-item-body-content">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam excepturi incidunt
                                est
                                commodi perferendis. Minima impedit tenetur ipsum nostrum repudiandae itaque,
                                corrupti
                                cum, voluptatum quis ad ducimus perspiciatis debitis fuga.</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
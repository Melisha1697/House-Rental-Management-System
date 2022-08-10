<?php
    include './config/db_conn.php';
    $id =$_GET['id'];
    $query = "Select * from houses where house_id = '$id'";
    
    $result = mysqli_query($conn, $query);
    $res= mysqli_fetch_assoc($result);
    
    $username = $_COOKIE['username'];

    $query1 = "SELECT * FROM users WHERE username = '$username'";
    $result1 = mysqli_query($conn, $query1);
    $res1= mysqli_fetch_assoc($result1);
    $userID = $res1['user_id'];
    
    $query2 = "SELECT COUNT(*) AS totalbooking FROM booking WHERE user_id = '$userID'";
    $result2 = mysqli_query($conn, $query2);
    
    $res2= mysqli_fetch_assoc($result2);
    
    
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
</head>

<body>
    <header>
        <a href="index.php" class="logo">
            <span> AAFNO </span> PAAN
        </a>
        <nav class="navbar">
            <a href="/real_estate_website#home">home</a>
            <a href="/real_estate_website#services">services</a>
            <a href="/real_estate_website#featured">featured</a>
            <a href="/real_estate_website#agents">agents</a>
            <a href="/real_estate_website#contact">contact</a>
            <a href="faq.php">FAQ</a>
        </nav>

        <div class="icons">
            <div id="menu-bars" class="fas fa-bars"></div>
            <a href="login.php" class="fas fa-user" title="Login Here!"></a>
            <a href="register.php" class="fas fa-sign-in-alt" title="Register From Here!!"></a>
        </div>
    </header>
    <div style="margin-top: 65px;"></div>
    <section class="house-details-container">
        <div class="left">
            <div class="image-container">
                <?php
                     $imageURL = 'admin/uploads/'. $res["file_name"];
                    ?>
                <img src="<?php echo $imageURL; ?>" alt="<?php echo $res['title'] ?>" />
            </div>
        </div>
        <div class="right">
            <h1>
                <?php echo $res['title']; ?> (<?php echo $res['house_no']; ?>)
            </h1>
            <div class="col">
                <div class="row">
                    <h3>Price: <span><?php echo $res['price']; ?></span></h3>
                    <h3>Address: <span><?php echo $res['address']; ?></span></h3>
                </div>
                <div class="row">
                    <h3>Area: <span><?php echo $res['sq_ft']; ?></span></h3>
                    <h3>Garage: <span><?php echo $res['garage']; ?></span></h3>
                </div>
                <div class="row">
                    <h3>Bedrooms: <span><?php echo $res['bedrooms']; ?></span></h3>
                    <h3>Bathrooms: <span><?php echo $res['bathrooms']; ?></span></h3>
                </div>
                <div class="row">
                    <h3>City: <span><?php echo $res['city']; ?></span></h3>
                    <h3>State: <span><?php echo $res['state']; ?></span></h3>
                </div>
                <div class="row">
                    <h3>Contact us: <a href="tel:+9779849496234">+977 9849496234</a></h3>
                </div>
                <div class="description">
                    <h3>Description: </h3>
                    <p><?php echo $res['description']; ?></p>
                </div>
            </div>
            <div>
                <?php
                if($res2['totalbooking']>0){
                    echo '<button class="w-full btn" disable="true">You  have already booked another house</button>';
                }else{
                    echo "<a href='checkout.php?id=". $res['house_id']."'>
                <button class='btn w-full'>Book Now</button>
                </a>";
                }
                ?>

            </div>
        </div>
    </section>

    <section class="footer">
        <div class="footer-container">
            <div class="box-container">
                <div class="box">
                    <h3>branch location</h3>
                    <a href="#">india</a>
                    <a href="#">USA</a>
                    <a href="#">france</a>
                    <a href="#">russia</a>
                    <a href="#">japan</a>
                </div>

                <div class="box">
                    <h3>quick links</h3>
                    <a href="#">home</a>
                    <a href="#">services</a>
                    <a href="#">featured</a>
                    <a href="#">agents</a>
                    <a href="#">contact</a>
                </div>

                <div class="box">
                    <h3>extra links</h3>
                    <a href="#">my account</a>
                    <a href="#">my favorite</a>
                    <a href="#">my list</a>
                </div>

                <div class="box">
                    <h3>follow us</h3>
                    <a href="https://www.facebook.com/">facebook</a>
                    <a href="#">twitter</a>
                    <a href="#">instagram</a>
                    <a href="#">linkedin</a>
                </div>
            </div>

            <div class="credit">
                &copy; <span>2022 Aafnopaan.com </span> | all rights reserved!
            </div>
        </div>
    </section>

</body>

</html>
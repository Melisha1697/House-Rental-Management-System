<?php
    if(!isset($_COOKIE['username'])){
        header("location:./login.php");
    }

    include './config/db_conn.php';

    $query = "SELECT * FROM houses INNER JOIN booking ON houses.id != booking.house_id";
    $result= mysqli_query($conn, $query);

    if(isset($_POST['search'])){
        $title = $_POST['title'];
        
        $query = "SELECT * FROM houses INNER JOIN booking ON houses.id != booking.house_id WHERE (`title` LIKE '%". $title. "%')";
        $result= mysqli_query($conn, $query);
        
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AAFNO-PAAN</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <!-- custom css file link  -->
    <link rel="stylesheet" href="./assets/css/search.css" />
</head>

<body>
    <header>
        <a href="index.php" class="logo">
            <span> AAFNO </span> PAAN
        </a>
        <nav class="navbar">
            <a href="index.php">home</a>
            <a href="index.php">services</a>
            <a href="index.php">featured</a>
            <a href="index.php">agents</a>
            <a href="#index.php">contact</a>
            <a href="faq.php">FAQ</a>
        </nav>

        <div class="icons">
            <div id="menu-bars" class="fas fa-bars"></div>
            <a href="login.php" class="fas fa-user" title="Login Here!"></a>
            <a href="register.php" class="fas fa-sign-in-alt" title="Register From Here!!"></a>
        </div>
    </header>

    <div class="popup">
        <form action="" method="POST" class="search">
            <input type="text" name="title" placeholder="Search by title">
            <button type="submit" name="search" value="Search">
                <img src="./assets/img/search.png" alt="">
            </button>
        </form>
    </div>

    <section class="featured" id="featured">
        <h1 class="heading"><span>Your Search</h1>
        <div class="box-container">
            <?php
                while($res = mysqli_fetch_array($result)){
            ?>
            <div class="box">
                <div class="image-container">
                    <?php
                     $imageURL = 'admin/uploads/'. $res["file_name"];
                    ?>
                    <img src="<?php echo $imageURL; ?>" alt="" />
                    <div class="info">
                        <h3>for rent</h3>
                    </div>
                </div>
                <div class="content">
                    <div class="price">
                        <h3><?php echo number_format($res['price'],2) ?></h3>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-envelope"></a>
                        <a href="#" class="fas fa-phone"></a>
                    </div>
                    <div class="location">
                        <h3><?php echo $res['title'] ?></h3>
                        <p><?php echo $res['address'] ?></p>
                    </div>
                    <div class="details">
                        <h3><i class="fas fa-expand"></i> <?php echo $res['sq_ft'] ?> sqft</h3>
                        <h3><i class="fas fa-bed"></i> <?php echo $res['bedrooms'] ?> beds</h3>
                        <h3><i class="fas fa-bath"></i> <?php echo $res['bathrooms'] ?> baths</h3>
                        <h3><i class="fas fa-car"></i> <?php echo $res['garage'] ?> garage</h3>
                    </div>
                    <div class="buttons">
                        <a href="view.php?id=<?php echo $res['id']; ?>" class="btn">view details</a>
                    </div>
                </div>
            </div>
            <?php 
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
    <script>
    let popup = document.getElementById("popup");

    function openPopup() {
        popup.classList.add("open-popup");
    }

    function closePopup() {
        popup.classList.remove("open-popup");
    }
    </script>
</body>

</html>
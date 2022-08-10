<?php
    if(!isset($_COOKIE['username'])){
        header("location:./login.php");
    }

    $username = $_COOKIE['username'];
    
    include './config/db_conn.php';
    $id =$_GET['id'];
    $query = "Select * from houses where house_id = '$id'";
    
    $result = mysqli_query($conn, $query);
    $res= mysqli_fetch_assoc($result);
    $houseID  = $res['house_id'];
    $houseAmount = $res['price'];

    // Booking
    $query2 = "Select * from booking where house_id = '$id'";
    $result2 = mysqli_query($conn, $query2);
    $bookingResult = mysqli_fetch_assoc($result2);

    // user
    $userQuery = "SELECT * FROM users WHERE username = '$username'";
    $userResult = mysqli_query($conn, $userQuery);
    $userRes = mysqli_fetch_assoc($userResult);
    $userID = $userRes['user_id'];


    if(isset($_POST['add'])){
        $email = $userRes['email'];
        $phone = $userRes['phone'];
        $credit_card = $_POST['credit_card'];

        $outstandingAmt = $bookingResult['outstanding_amt'];

        $total_paid = $bookingResult['total_paid'] + $_POST['total_paid'];
        
        $outstanding_amt = (int)$outstandingAmt - (int)$_POST['total_paid'];

        if($outstanding_amt <= 0) {
            $total_paid = $res['price'];
            $outstanding_amt = 0;   
        }

        $dt = date('Y-m-d');
        $expiry_date = date('Y-m-d', strtotime($dt. ' + 1 months'));
    
        $updateQuery = "UPDATE booking SET total_paid = '$total_paid', outstanding_amt = '$outstanding_amt'";

        $result= mysqli_query($conn, $updateQuery);
        header('location: userhome.php');
        

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
    <link rel="stylesheet" href="./assets/css/checkout.css">
</head>

<body>
    <header>
        <a href="index.php" class="logo">
            <span>AAFNO </span> PAAN
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
    <div style="margin-top: 70px;"></div>
    <h1 class="main-title">Thank You for choosing <?php echo $res['title'] ?></h1>
    <section class="house-details-container">
        <div class="left">
            <div class="image-container">
                <?php
                     $imageURL = 'admin/uploads/'. $res["file_name"];
                    ?>
                <img src="<?php echo $imageURL; ?>" alt="<?php echo $res['title'] ?>" />
            </div>

            <div class="house-details">
                <h1>
                    <?php echo $res['title']; ?> (<?php echo $res['house_no']; ?>)
                </h1>
            </div>
        </div>
        <div>
        </div>
        <div class="right">
            <form action="" method="POST" enctype="multipart/form-data">
                <h1 class="">Payment Details</h1>
                <div class="price-container">
                    <div class="row">
                        <h3>Your total payable price: Rs. <?php echo $bookingResult['outstanding_amt'] ?></h3>

                    </div>
                </div>
                <div class="form-main">
                    <div class="textbox">
                        <label for="credit_card">Credit Card</label>
                        <input type="number" name="credit_card" required>
                    </div>
                    <div class="textbox">
                        <label for="total_paid">Payment Amount</label>
                        <input type="number" min="0" max="<?php echo $bookingResult['outstanding_amt'] ?>"
                            name="total_paid" required>
                    </div>

                    <div class="textbox">
                        <input type="submit" name="add" value="Pay Now" class="btn  w-full">
                    </div>
                </div>

            </form>
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
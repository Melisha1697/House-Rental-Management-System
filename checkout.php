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


    // user
    $userQuery = "SELECT * FROM `users` WHERE username = '$username'";
    $userResult = mysqli_query($conn, $userQuery);
    $userRes = mysqli_fetch_assoc($userResult);
    $userID = $userRes['user_id'];


    if(isset($_POST['add'])){
        $email = $userRes['email'];
        $phone = $userRes['phone'];
        $credit_card = $_POST['credit_card'];
        $totalPrice = $res['price'];
        $total_paid = $_POST['total_paid'];

        $outstanding_amt = (int)$totalPrice - (int)$total_paid;

        $dt = date('Y-m-d');
        $expiry_date = date('Y-m-d', strtotime($dt. ' + 1 months'));
        //user can"t book more then one house
        $q ="Select COUNT(*) AS bookingCOUNT FROM booking WHERE user_id = $userID";
        $result2 = mysqli_query($conn, $q);
        $userRes2 = mysqli_fetch_assoc($result2);
        if($userRes2['bookingCOUNT'] > 0){
            echo "<script>
window.location.href = 'http://localhost/real_estate_website/userhome.php';
</script>";
}
else{
$query = "INSERT INTO `booking`(`user_id`, `house_id`, `email`, `phone`, `credit_card`, `expiry_date`, `total_price`,
`total_paid`, `outstanding_amt`) VALUES ('$userID','$houseID','$email','$phone','$credit_card', '$expiry_date',
'$totalPrice','$total_paid','$outstanding_amt')";

echo $query;
$result= mysqli_query($conn, $query);
header('location: userhome.php');
}



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
    <script>
    function validation() {
        var creditElemVal = document.getElementById('credit').value;
        var creditCardRegex =
            /^(?:4[0-9]{12}(?:[0-9]{3})?|[25][1-7][0-9]{14}|6(?:011|5[0-9][0-9])[0-9]{12}|3[47][0-9]{13}|3(?:0[0-5]|[68][0-9])[0-9]{11}|(?:2131|1800|35\d{3})\d{11})$/;
        var creditResult = creditCardRegex.test(creditElemVal);
        if (creditResult) {
            return true;
        } else {
            alert('Invalid Credit Card');
            return false;
        }
    }
    </script>
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
            <form onsubmit="return validation()" action="" method="POST" enctype="multipart/form-data">
                <h1 class="">Payment Details</h1>
                <div class=" price-container">
                    <div class="row">
                        <h3>Your total payable price: Rs. <?php echo $res['price']; ?></h3>

                    </div>
                </div>
                <div class="form-main">
                    <div class="textbox">
                        <label for="credit_card">Credit Card</label>
                        <input id="credit" type=" number" name="credit_card" required>
                    </div>
                    <div class="textbox">
                        <label for="total_paid">Payment Amount</label>
                        <input type="number" min="0" max="<?php echo $res['price'] ?>" name="total_paid" required>
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
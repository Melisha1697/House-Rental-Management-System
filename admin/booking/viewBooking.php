<?php
if(!isset($_COOKIE['admin'])){
    header("location:../../login.php");
}

include '../../config/db_conn.php';

$id = $_GET['id'];
$query = "SELECT houses.house_id, houses.file_name, houses.title, houses.house_no, houses.city, houses.state, houses.price, houses.address, houses.sq_ft, houses.garage, users.full_name, users.username, users.email, users.phone, booking.payment_date, booking.expiry_date, booking.total_price, booking.total_paid FROM `houses` INNER JOIN booking ON houses.house_id = booking.house_id INNER JOIN users ON booking.user_id = users.user_id WHERE booking.booking_id = $id GROUP BY booking_id";

$result = mysqli_query($conn, $query);
$res= mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="../assets/js/tableExport.min.js"></script>

    <script src="../assets/js/export.js"></script>
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link rel="stylesheet" href="../assets/css/view.css">
</head>

<body>
    <div class="container">
        <?php include '../menu.php' ?>

        <section class="house-details-container">
            <div class="left">
                <div class="image-container">
                    <?php
                     $imageURL = '../uploads/'. $res["file_name"];
                    ?>
                    <img src="<?php echo $imageURL; ?>" alt="<?php echo $res['title'] ?>" />
                </div>
            </div>
            <div class="right">
                <h1>
                    <?php echo $res['title']; ?> (<?php echo $res['house_no']; ?>)
                </h1>
                <div class="col">
                    <h2>House Details</h2>
                    <div class="row">
                        <h3>Price: <span><?php echo $res['price']; ?></span></h3>
                        <h3>Address: <span><?php echo $res['address']; ?></span></h3>
                    </div>
                    <div class="row">
                        <h3>Area: <span><?php echo $res['sq_ft']; ?></span></h3>
                        <h3>Garage: <span><?php echo $res['garage']; ?></span></h3>
                    </div>
                    <div class="row">
                        <h3>City: <span><?php echo $res['city']; ?></span></h3>
                        <h3>State: <span><?php echo $res['state']; ?></span></h3>
                    </div>
                </div>
                <div class="col">
                    <h2>User Details</h2>
                    <div class="row">
                        <h3>Tenant: <span><?php echo $res['full_name']; ?></span></h3>
                        <h3>Username: <span><?php echo $res['username']; ?></span></h3>
                    </div>
                    <div class="row">
                        <h3>Email: <span><?php echo $res['email']; ?></span></h3>
                        <h3>Phone: <span><?php echo $res['phone']; ?></span></h3>
                    </div>
                </div>
                <div class="col">
                    <h2>Booking Details</h2>
                    <div class="row">
                        <h3>Booking: <span><?php echo $res['payment_date']; ?></span></h3>
                        <h3>Expiry: <span><?php echo $res['expiry_date']; ?></span></h3>
                    </div>
                    <div class="row">
                        <h3>Total Price: <span><?php echo $res['total_price']; ?></span></h3>
                        <h3>Total Paid: <span><?php echo $res['total_paid']; ?></span></h3>
                    </div>
                </div>
                <div>
                    <a href="./">
                        <button class="btn w-full">Go Back</button>
                    </a>
                </div>
            </div>
        </section>
    </div>
</body>

</html>
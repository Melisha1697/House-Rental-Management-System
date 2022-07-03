<?php
    if(!isset($_COOKIE['username'])){
        header("location:../../login.php");
    }

    include '../../config/db_conn.php';

    $query = "SELECT booking.booking_id, houses.house_id, users.full_name, houses.title, houses.price, houses.city, booking.payment_date, booking.expiry_date FROM `houses` INNER JOIN booking ON houses.house_id = booking.house_id INNER JOIN users ON booking.user_id = users.user_id GROUP BY booking_id";
    $result= mysqli_query($conn, $query);

    if(isset($_POST['search'])){
        $title = $_POST['title'];
        
        $query2 = "SELECT booking.booking_id, houses.house_id, users.full_name, houses.title, houses.price, houses.city, booking.payment_date, booking.expiry_date FROM `houses` INNER JOIN booking ON houses.house_id = booking.house_id INNER JOIN users ON booking.user_id = users.user_id WHERE (`title` LIKE '%". $title. "%')";
        $result= mysqli_query($conn, $query2);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="../assets/js/tableExport.min.js"></script>

    <script src="../assets/js/export.js"></script>
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link rel="stylesheet" href="../assets/css/menu.css">
</head>

<body>
    <?php //echo $_SESSION["username"]?>
    <div class="container">
        <?php include '../menu.php' ?>
        <!------------------End of Aside----------------------->
        <main>
            <div class="container1">
                <h2 style="padding: 1rem;">Reservation</h2>
                <div class="list">
                    <div class="buttons-container">
                        <form action="" method="POST" class="search">
                            <input type="text" name="title" placeholder="Search by title">
                            <input type="submit" name="search" value="Search" class="button">
                        </form>
                    </div>
                    <table cellpadding="12" cellspacing="8" id="dataTable" class="table table-striped">
                        <tr>
                            <th>B. Id</th>
                            <th>Name</th>
                            <th>House</th>
                            <th>Price</th>
                            <th>City</th>
                            <th>Booking</th>
                            <th>Expiry</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <?php
                            while($res = mysqli_fetch_array($result)){
                        ?>
                        <tr>
                            <td><?php echo $res['booking_id']; ?></td>
                            <td><?php echo $res['full_name']; ?></td>
                            <td><?php echo $res['title']; ?></td>
                            <td>Rs. <?php echo $res['price']; ?></td>
                            <td><?php echo $res['city']; ?></td>
                            <td><?php echo $res['payment_date']; ?></td>
                            <td><?php echo $res['expiry_date']; ?></td>

                            <td>
                                <a href="viewBooking.php?id=<?php echo $res['booking_id']; ?>" class="edit">
                                    <button>View</button>
                                </a>
                            </td>
                            <td>
                                <a href="deleteBooking.php?id=<?php echo $res['booking_id']; ?>" class="delete">
                                    <button>Vacant</button>
                                </a>
                            </td>

                        </tr>
                        <?php 
                            }
                        ?>
                    </table>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
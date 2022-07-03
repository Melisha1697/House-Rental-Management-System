<?php
    if(!isset($_COOKIE['username'])){
        header("location:../../login.php");
    }

    include '../../config/db_conn.php';

    $username = $_COOKIE['username'];
    
    $query = "SELECT houses.house_id, `title`, `total_price`, `total_paid`, `outstanding_amt`, booking.payment_date, booking.expiry_date, users.phone FROM `houses` INNER JOIN booking ON houses.house_id = booking.house_id INNER JOIN users ON users.user_id = booking.user_id";
    $result= mysqli_query($conn, $query);

    if(isset($_POST['search'])){
        $title = $_POST['title'];
        
        $query = "SELECT houses.house_id, `title`, `total_price`, `total_paid`, `outstanding_amt`, booking.payment_date, booking.expiry_date FROM `houses` INNER JOIN booking ON houses.house_id = booking.house_id WHERE (`title` LIKE '%". $title. "%')";
        $result= mysqli_query($conn, $query);
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
    <style>
    td {
        padding-top: 10px;
        padding-bottom: 10px;
        padding-right: 10px;
    }

    td:first-child {
        padding-left: 10px;
        padding-right: 0;
    }
    </style>
</head>

<body>
    <?php //echo $_SESSION["username"]?>
    <div class="container">
        <?php include '../menu.php' ?>
        <!------------------End of Aside----------------------->
        <main>
            <div class="container1">
                <h2 style="padding: 1rem;">Payments</h2>
                <div class="list">
                    <div class="buttons-container">
                        <form action="" method="POST" class="search">
                            <input type="text" name="title" placeholder="Search by title">
                            <input type="submit" name="search" value="Search" class="button">
                        </form>
                    </div>
                    <table cellpadding="12" cellspacing="8" id="dataTable" class="table table-striped">
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Total Price</th>
                            <th>Paid Amt.</th>
                            <th>Outstanding Amt</th>
                            <th>Booing</th>
                            <th>Expiry</th>
                        </tr>
                        <?php
                            while($res = mysqli_fetch_array($result)){
                        ?>
                        <tr>
                            <td><?php echo $res['house_id']; ?></td>
                            <td><?php echo $res['title']; ?></td>
                            <td>Rs <?php echo $res['total_price']; ?></td>
                            <td><?php echo $res['total_paid']; ?></td>
                            <td><?php echo $res['outstanding_amt']; ?></td>
                            <td><?php echo $res['payment_date']; ?></td>
                            <td><?php echo $res['expiry_date']; ?></td>
                            <td>
                                <a href="tel:+<?php echo $res['phone']; ?>">
                                    <button>
                                        Call Now
                                    </button>
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
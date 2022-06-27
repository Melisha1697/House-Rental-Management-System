<?php
    if(!isset($_COOKIE['admin'])){
        header("location:../login.php");
    }

    include '../config/db_conn.php';

    $query1 = "SELECT COUNT(*) AS totalHouse FROM houses";
    $result1 = mysqli_query($conn, $query1);
    $housesArr = mysqli_fetch_array($result1);

    $query2 = "SELECT COUNT(*) AS totalTenants FROM users";
    $result2 = mysqli_query($conn, $query2);
    $userArr = mysqli_fetch_array($result2);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="./assets/js/tableExport.min.js"></script>

    <script src="./assets/js/export.js"></script>
    <link rel="stylesheet" href="./assets/css/admin.css">
    <link rel="stylesheet" href="./assets/css/dashboard.css">
</head>

<body>
    <?php //echo $_SESSION["username"]?>
    <div class=" container">
        <?php include './menu.php' ?>
        <!------------------End of Aside----------------------->
        <main>
            <div class="container1">
                <h2 style="padding: 1rem;">Welcome back, <span
                        style="text-transform: capitalize;"><?php echo $_COOKIE['username']; ?></span>
                </h2>
                <div class="dashboard-container">
                    <div class="total-houses item">
                        <div class="icon">
                            <span class="material-symbols-sharp">house</span>
                        </div>
                        <div class="middle">
                            <div class="left">
                                <h2>
                                    <?php echo $housesArr['totalHouse']; ?>
                                </h2>
                                <h3>Total Houses</h3>
                            </div>
                            <div class="view">
                                <a href="./houses.php">
                                    <button>View List</button>
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="total-tenants item">
                        <div class="icon">
                            <span class="material-symbols-sharp">group</span>
                        </div>
                        <div class="middle">
                            <div class="left">
                                <h2> <?php echo $userArr['totalTenants']- 1; ?></h2>
                                <h3>Total Tenants</h3>
                            </div>
                            <div class="view">
                                <a href="./tenants.php">
                                    <button>View List</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="payments item">
                        <div class="icon">
                            <span class="material-symbols-sharp">folder</span>
                        </div>

                        <div class="middle">
                            <div class="left">
                                <h2>2</h2>
                                <h3>Payments This Months</h3>
                            </div>
                            <div class="view">
                                <a href="./payments.php">
                                    <button>View List</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <div class="right">
            <div class="top">
                <button>
                    <span class="martial-icons-sharp">menu</span>
                </button>
                <div class="theme-toggler">
                    <span class="material-icons-sharp">light_mode</span>
                    <span class="material-icons-sharp">dark_mode</span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
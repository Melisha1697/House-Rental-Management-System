<?php
session_start();
if(isset($_SESSION["username"])){
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin DashBoard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="./assets/css/adminhome.css">
</head>
<body>
<?php //echo $_SESSION["username"]?>
    <div class="container">
        <aside>
            <div class="top">
                <div class="logo">
                    <img src="./assets/img/logo.png" alt="">
                    <h2 class="text-muted">AAFNO-PAAN</h2>
                </div>
                <div class="close" id="close-tab">
                <span class="material-symbols-sharp">close</span>
                </div>
            </div>
            <div class="sidebar">
                <a href="adminhome.php">
                <span class="material-symbols-sharp">grid_view</span>
                <h3>Dashboard</h3>
                </a>
                <a href="#">
                <span class="material-symbols-sharp">view_list</span>
                <h3>HouseTypes</h3>
                </a>
                <a href="#">
                <span class="material-symbols-sharp">house</span>
                <h3>Houses</h3>
                </a>
                <a href="#">
                <span class="material-symbols-sharp">payments</span>
                <h3>Payments</h3>
                </a>
                <a href="#">
                <span class="material-symbols-sharp">ballot</span>
                <h3>Reports</h3>
                </a>
                <a href="logout.php">
                <span class="material-symbols-sharp">logout</span>
                <h3>Logout</h3>
                </a>
            </div>
        </aside>
        <!------------------End of Aside----------------------->
        <main>
            <h1> House Rental System</h1>
            
            <div class="container1">
                <h3>Welcome back Admin</h3>
                <div class="total-houses">
                    <span class="material-symbols-sharp">house</span>
                    <div class="middle">
                        <div class="left">
                            <h2>2</h2>
                            <h3>Total Houses</h3>
                        </div>
                        <div class="view">
                            <h3>View List</h3>
                        </div>
                    </div>
                </div>
                <div class="total-tenants">
                    <span class="material-symbols-sharp">group</span>
                    <div class="middle">
                        <div class="left">
                            <h2>2</h2>
                            <h3>Total Tenants</h3>
                        </div>
                        <div class="view">
                            <h3>View List</h3>
                        </div>
                </div>
                <div class="payments">
                <span class="material-symbols-sharp">files</span>
                <div class="middle">
                        <div class="left">
                            <h2>2</h2>
                            <h3>Payments This Months</h3>
                        </div>
                        <div class="view">
                            <h3>View List</h3>
                        </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
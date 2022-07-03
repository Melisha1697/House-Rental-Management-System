<?php
    if(!isset($_COOKIE['admin'])){
        header("location:../../login.php");
    }

    include '../../config/db_conn.php';
                        
    $query = "SELECT * FROM users WHERE userType = 'Tenants'";

    $result= mysqli_query($conn, $query);

    if(isset($_POST['search'])){
        $name = $_POST['name'];
        
        $query = "SELECT * FROM users WHERE userType = 'Tenants' AND (`full_name` LIKE '%". $name. "%')";
        $result= mysqli_query($conn, $query);
    }                
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenants</title>
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
                <h2 style="padding: 1rem;">List of Tenants</h2>
                <div class="list">
                    <div class="buttons-container">
                        <div>
                            <a href="./addTenant.php">
                                <button class="add-tenant">Add Tenant</button>
                            </a>
                            <button type="button" class="dropdown-toggle">
                                <span>Export</span>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a class="dataExport" data-type="csv">CSV</a></li>
                                    <li><a class="dataExport" data-type="excel">XLS</a></li>
                                    <li><a class="dataExport" data-type="txt">TXT</a></li>
                                </ul>
                            </button>
                        </div>
                        <form action="" method="POST" class="search">
                            <input type="text" name="name" placeholder="Search by name">
                            <input type="submit" name="search" value="Search" class="button">
                        </form>
                    </div>

                    <table cellpadding="12" cellspacing="8" id="dataTable" class="table table-striped">
                        <tr>
                            <th>Id</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Citizenship No.</th>
                            <th>Contact</th>
                            <th>Address</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                        <?php
                            while($res = mysqli_fetch_array($result)){
                            ?>
                        <tr>
                            <td><?php echo $res['user_id']; ?></td>
                            <td><?php echo $res['full_name']; ?></td>
                            <td><?php echo $res['email']; ?></td>
                            <td><?php echo $res['citizenship']; ?></td>
                            <td><?php echo $res['phone']; ?></td>
                            <td><?php echo $res['address']; ?></td>
                            <td>
                                <a href="editTenant.php?id=<?php echo $res['user_id']; ?>"
                                    class="edit"><button>Edit</button></a>

                            </td>
                            <td>
                                <a href="deleteTenant.php?id=<?php echo $res['user_id']; ?>" class="delete">
                                    <button>Delete</button>
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
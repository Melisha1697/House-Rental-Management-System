<?php
    include './config/db_conn.php';

    $query = "SELECT * FROM houses";
    $result= mysqli_query($conn, $query);

    if(isset($_POST['search'])){
        $title = $_POST['title'];
        
        $query = "SELECT * FROM houses WHERE (`title` LIKE '%". $title. "%')";
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

    <div>
        <table cellpadding="12" cellspacing="8" id="dataTable" class="table table-striped">
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Price</th>
                <th>Address</th>
                <th>Area</th>
                <th>City</th>
                <th></th>
            </tr>
            <?php
        while($res = mysqli_fetch_array($result)){
        ?>
            <tr>
                <td><?php echo $res['id']; ?></td>
                <td><?php echo $res['title']; ?></td>
                <td>Rs <?php echo $res['price']; ?></td>
                <td><?php echo $res['address']; ?></td>
                <td><?php echo $res['sq_ft']; ?> sq.ft</td>
                <td><?php echo $res['city']; ?></td>

                <td>
                    <a href="book.php?id=<?php echo $res['id']; ?>" class="edit">
                        <button>Book</button>
                    </a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>

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
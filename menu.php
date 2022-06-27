<?php $url = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"],"/")+1);?>

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
        <a href="./userhome.php" class="<?php echo $url ==  "userhome.php" ? "active" : "" ?>">
            <span class="material-symbols-sharp">grid_view</span>
            <h3>Dashboard</h3>
        </a>

        <a href="houses.php" class="<?php echo $url == ("houses.php") ? "active" : "" ?>">
            <span class="material-symbols-sharp">house</span>
            <h3>Houses</h3>
        </a>
        <a href="book.php" class="<?php echo $url == ("book.php") ? "active" : "" ?>">
            <span class="material-symbols-sharp">book</span>
            <h3>Reservation</h3>
        </a>
        <a href="payments.php" class="<?php echo $url == "payments.php" ? "active" : "" ?>">
            <span class="material-symbols-sharp">payments</span>
            <h3>Payments</h3>
        </a>
        <a href="report.php" class="<?php echo $url == "report.php" ? "active" : "" ?>">
            <span class="material-symbols-sharp">ballot</span>
            <h3>Reports</h3>
        </a>
        <a href="faq.php" class="<?php echo $url == "faq.php" ? "active" : "" ?>">
            <span class="material-symbols-sharp">report</span>
            <h3>FAQ?</h3>
        </a>
        <a href="./logout.php">
            <span class="material-symbols-sharp">logout</span>
            <h3>Logout</h3>
        </a>
    </div>
</aside>
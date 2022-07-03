<?php $url = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"],"/")+1);?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<link rel="stylesheet" href="./assets/css/menu.css">

<aside>
    <div class="top">
        <div class="logo">
            <img src="./assets/img/logo.png" alt="">
            <a href="./index.php" id="logo-text">
                <h2 class="text-muted">AAFNO-PAAN</h2>
            </a>
        </div>
        <div class="close" id="close-tab">
            <span class="material-symbols-sharp">close</span>
        </div>
    </div>
    <div class="mode">
        <input type="checkbox" class="checkbox" id="chk" />
        <label class="label" for="chk">
            <i class="fas fa-moon"></i>
            <i class="fas fa-sun"></i>
            <div class="ball" id="ball"></div>
        </label>
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

<script>
const chk = document.getElementById('chk');
if (localStorage.getItem('dark-real-state')) {
    document.body.classList.add('dark');
    localStorage.setItem('dark-real-state', 'active');
    chk.checked = true
} else {
    document.body.classList.remove('dark');
    localStorage.removeItem('dark-real-state')
    chk.checked = false
}

chk.addEventListener('change', () => {
    document.body.classList.toggle('dark');

    if (document.body.classList.contains('dark')) {
        localStorage.setItem('dark-real-state', 'active');
    } else {
        localStorage.removeItem('dark-real-state')
    }
});
</script>
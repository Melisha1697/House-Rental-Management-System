<?php $url = substr($_SERVER["REQUEST_URI"], strrpos($_SERVER["REQUEST_URI"],"/admin/"));?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<link rel="stylesheet" href="./assets/css/menu.css">

<aside>
    <div class="top">
        <a href="/real_estate_website">
            <div class="logo">
                <img src="/real_estate_website/admin/assets/img/logo.png" alt="AAFNO-PAAN">
                <h2 class="text-muted">AAFNO-PAAN</h2>
            </div>
        </a>
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
        <a href="/real_estate_website/admin/" class="<?php echo $url ==  "/admin/" ? "active" : "" ?>">
            <span class="material-symbols-sharp">grid_view</span>
            <h3>Dashboard</h3>
        </a>

        <a href="/real_estate_website/admin/houses" class="<?php echo $url == "/admin/houses/" ? "active" : "" ?>">
            <span class="material-symbols-sharp">house</span>
            <h3>Houses</h3>
        </a>
        <a href="/real_estate_website/admin/booking" class="<?php echo $url == "/admin/booking/" ? "active" : "" ?>">
            <span class="material-symbols-sharp">book</span>
            <h3>Reservation</h3>
        </a>
        <a href="/real_estate_website/admin/payments" class="<?php echo $url == "/admin/payments/" ? "active" : "" ?>">
            <span class="material-symbols-sharp">payments</span>
            <h3>Payments</h3>
        </a>
        <a href="/real_estate_website/admin/tenants" class="<?php echo $url == "/admin/tenants/" ? "active" : "" ?>">
            <span class="material-symbols-sharp">person</span>
            <h3>Tenants</h3>
        </a>
        <a href="/real_estate_website/admin/faqs" class="<?php echo $url == "/admin/faqs/" ? "active" : "" ?>">
            <span class="material-symbols-sharp">report</span>
            <h3>FAQ?</h3>
        </a>
        <a href="/real_estate_website/logout.php">
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
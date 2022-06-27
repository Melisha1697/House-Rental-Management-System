<?php
setcookie("username", '', time(), "/");
setcookie("user", '', time(), "/");
setcookie("admin", '', time(), "/");
header("location:./login.php");
?>
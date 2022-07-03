<?php
if(!isset($_COOKIE['admin'])){
    header("location:../../login.php");
}

 include '../../config/db_conn.php';

 $id= $_GET['id'];

 $query = "DELETE FROM users WHERE userType = 'Tenants' AND user_id = $id";

 mysqli_query($conn, $query);

 header('location: tenants.php');
?>
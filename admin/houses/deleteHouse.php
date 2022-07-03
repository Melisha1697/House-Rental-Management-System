<?php
if(!isset($_COOKIE['admin'])){
    header("location:../../login.php");
}

 include '../../config/db_conn.php';

 $id= $_GET['id'];

 $query = "DELETE FROM houses WHERE house_id = $id";

 mysqli_query($conn, $query);

 header('location: ./');
?>
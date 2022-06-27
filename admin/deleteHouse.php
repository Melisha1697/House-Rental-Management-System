<?php
 include '../config/db_conn.php';

 $id= $_GET['id'];

 $query = "DELETE FROM houses WHERE id=$id";

 mysqli_query($conn, $query);

 header('location: houses.php');
?>
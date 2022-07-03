<?php
 include '../../config/db_conn.php';

 $id= $_GET['id'];

 $query = "DELETE FROM booking WHERE booking_id = $id";

 mysqli_query($conn, $query);

 header('location: ./');
?>
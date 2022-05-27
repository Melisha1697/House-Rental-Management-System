<?php
 $host="localhost";
 $user="root";
 $password="";
 $dbname="rental_system_db";
 $conn = mysqli_connect($host, $user, $password, $dbname);

 if($conn===false){
   die("Connection Failed");
 }
?>
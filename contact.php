<?php
    include('./config/db_conn.php');

    if($_SERVER["REQUEST_METHOD"]=="POST"){
      $full_name = $_POST['full_name'];
      $number = $_POST['phone'];
      $email = $_POST['email'];
      $subject = $_POST['subject'];
      $message = $_POST['message'];

      $sql="INSERT INTO `contactus`(`full_name`, `phone`, `email`, `subject`, `message`) VALUES ('$full_name','$number','$email','$subject','$message')";

      $result= mysqli_query($conn, $sql);

      if($result) {
        header("Location: ". "/real_estate_website");
      } else {
        echo"<script>alert('Error while submitting!')</script>";
        header("Location: ". "/real_estate_website");
      }
    }
?>
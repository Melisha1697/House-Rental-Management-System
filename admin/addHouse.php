<?php
include '../config/db_conn.php';

if(isset($_POST['add'])){
    $house_no= $_POST['house_no'];
    $title= $_POST['title'];
     $zipcode= $_POST['zipcode'];
     $sq_ft= $_POST['sq_ft'];
     $address= $_POST['address'];
     $city= $_POST['city'];
     $state= $_POST['state'];
     $image= "1";
     $description = $_POST['description'];
     $price = $_POST['price'];
     $tenant = $_POST['tenant'];
     $bedrooms = $_POST['bedrooms'];
     $bathrooms = $_POST['bathrooms'];
    $garage= $_POST['garage'];

    $query = "INSERT INTO `houses`(`title`, `price`, `address`, `house_no`, `description`, `sq_ft`, `bedrooms`, `bathrooms`, `city`, `state`, `zipcode`, `tenant`, `garage`, `Image`) 
    VALUES ('$title','$price','$address','$house_no', '$description', '$sq_ft','$bedrooms','$bathrooms','$city','$state','$zipcode','$tenant','$garage','$image')";

    echo $query;
    $result= mysqli_query($conn, $query);
    header('location: houses.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add House</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="./assets/js/tableExport.min.js"></script>

    <script src="./assets/js/export.js"></script>
    <link rel="stylesheet" href="./assets/css/admin.css">
</head>

<body>
    <div class="container">
        <?php include './menu.php' ?>
        <!-- main -->
        <main class="form1">
            <form action="" method="POST">
                <h1 class="">Add House Details</h1>
                <div class="form-main">

                    <div class="textbox">
                        <label for="title">House No.</label>
                        <input type="text" name="house_no" required>
                    </div>
                    <div class="textbox">
                        <label for="title">Title</label>
                        <input type="text" name="title" required>
                    </div>
                    <div class="textbox">
                        <label for="zipcode">Zip Code</label>
                        <input type="number" name="zipcode" required>
                    </div>
                    <div class=" textbox">
                        <label for="sq_ft">Square_FT</label>
                        <input type="number" name="sq_ft" required>
                    </div>
                    <div class=" textbox">
                        <label for="bedrooms">Bedroom</label>
                        <input type="number" name="bedrooms" required>
                    </div>
                    <div class=" textbox">
                        <label for="bathrooms">Bathroom</label>
                        <input type="number" name="bathrooms" required>
                    </div>
                    <div class=" textbox">
                        <label for="garage">Garage</label>
                        <input type="number" name="garage" required>
                    </div>
                    <div class="textbox">
                        <label for="address">Address</label>
                        <input type="text" name="address" required>
                    </div>
                    <div class="textbox">
                        <label for="city">City</label>
                        <input type="text" name="city" required>
                    </div>
                    <div class="textbox">
                        <label for="state">State</label>
                        <select name="state" id="state">
                            <option value="Province-1"> Province-1</option>
                            <option value="Province-2">Province-2</option>
                            <option value="Province-3">Province-3</option>
                            <option value="Province-4">Province-4</option>
                            <option value="Province-5">Province-5</option>
                            <option value="Province-6">Province-6</option>
                            <option value="Province-7">Province-7</option>
                        </select>
                    </div>
                    <!-- <div class="textbox">
                    <label for="image">Image</label>
                    <input type="file" name="image">
                </div> -->
                    <div class="textbox">
                        <label for="price">Price</label>
                        <input type="number" name="price" required>
                    </div>
                    <div class="textbox">
                        <label for="tenant">Tenant</label>
                        <input type="text" name="tenant" required>
                    </div>
                    <div class="textbox w-full">
                        <label for="description">Description</label>
                        <textarea name="description" required>
                        </textarea>
                    </div>
                    <input type="submit" name="add" value="Submit" class="button w-full"></button>
                </div>

            </form>
        </main>
    </div>
</body>

</html>
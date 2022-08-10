<?php
if(!isset($_COOKIE['admin'])){
    header("location:../../login.php");
}

include '../../config/db_conn.php';

$id = $_GET['id'];
$query = "Select * from houses where house_id= '$id'";

$result = mysqli_query($conn, $query);
$res= mysqli_fetch_assoc($result);

if(isset($_POST['update'])){

    
    $house_no= $_POST['house_no'];
    $title= $_POST['title'];
    $zipcode= $_POST['zipcode'];
    $sq_ft= $_POST['sq_ft'];
    $address= $_POST['address'];
    $city= $_POST['city'];
    $state= $_POST['state'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $bedrooms = $_POST['bedrooms'];
    $bathrooms = $_POST['bathrooms'];
    $garage= $_POST['garage'];

    if(!empty($_FILES['house']['name'])){
        $targetDir = "../uploads/";
        $fileName = basename($_FILES["house"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    
        $allowTypes = array('jpg','png','jpeg','gif');
        
        if(move_uploaded_file($_FILES["house"]["tmp_name"], $targetFilePath)){
            $sql = "UPDATE `houses` SET `title`= '$title', `price` = '$price', `address`= '$address', `house_no` = '$house_no', `description`= '$description', `sq_ft`= '$sq_ft',`bedrooms`= '$bedrooms', `bathrooms`= '$bathrooms', `city`= '$city', `state`= '$state', `zipcode`= '$zipcode', `garage`= '$garage', `file_name` = '$fileName'  WHERE house_id = $id";

            $result2= mysqli_query($conn, $sql);
        }       

    }else{
        $sql = "UPDATE `houses` SET `title`= '$title', `price` = '$price', `address`= '$address', `house_no` = '$house_no', `description`= '$description', `sq_ft`= '$sq_ft',`bedrooms`= '$bedrooms', `bathrooms`= '$bathrooms', `city`= '$city', `state`= '$state', `zipcode`= '$zipcode', `garage`= '$garage'  WHERE house_id = $id";

        $result2= mysqli_query($conn, $sql);
    }
    header('location: ./');
} 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update House</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="../assets/js/tableExport.min.js"></script>

    <script src="../assets/js/export.js"></script>
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link rel="stylesheet" href="../assets/css/menu.css">
</head>

<body>
    <div class="container">
        <?php include '../menu.php' ?>

        <main class="form1">
            <form action="" method="POST" enctype="multipart/form-data">
                <h1 class="">Update House Details</h1>
                <div class="form-main">

                    <div class="textbox">
                        <label for="title">House No.</label>
                        <input type="text" name="house_no" value="<?php echo $res['house_no']?>" required>
                    </div>
                    <div class="textbox">
                        <label for="title">Title</label>
                        <input type="text" name="title" value="<?php echo $res['title']?>" required>
                    </div>
                    <div class="textbox">
                        <label for="zipcode">Zip Code</label>
                        <input type="number" name="zipcode" value="<?php echo $res['zipcode']?>" required>
                    </div>
                    <div class=" textbox">
                        <label for="sq_ft">Square_FT</label>
                        <input type="number" name="sq_ft" value="<?php echo $res['sq_ft']?>" required>
                    </div>
                    <div class=" textbox">
                        <label for="bedrooms">Bedroom</label>
                        <input type="number" name="bedrooms" value="<?php echo $res['bedrooms']?>" required>
                    </div>
                    <div class=" textbox">
                        <label for="bathrooms">Bathroom</label>
                        <input type="number" name="bathrooms" value="<?php echo $res['bathrooms']?>" required>
                    </div>
                    <div class=" textbox">
                        <label for="garage">Garage</label>
                        <input type="number" name="garage" value="<?php echo $res['garage']?>" required>
                    </div>
                    <div class="textbox">
                        <label for="address">Address</label>
                        <input type="text" name="address" value="<?php echo $res['address']?>" required>
                    </div>
                    <div class="textbox">
                        <label for="city">City</label>
                        <input type="text" name="city" value="<?php echo $res['city']?>" required>
                    </div>
                    <div class="textbox">
                        <label for="state">State</label>
                        <select name="state" id="state" value="<?php echo $res['state']?>">
                            <option value="Province-1"> Province-1</option>
                            <option value="Province-2">Province-2</option>
                            <option value="Province-3">Province-3</option>
                            <option value="Province-4">Province-4</option>
                            <option value="Province-5">Province-5</option>
                            <option value="Province-6">Province-6</option>
                            <option value="Province-7">Province-7</option>
                        </select>
                    </div>
                    <div class="textbox">
                        <label for="price">Price</label>
                        <input type="number" name="price" value="<?php echo $res['price']?>" required>
                    </div>
                    <div class="textbox w-full">
                        <label for="description">Description</label>
                        <textarea name="description" required><?php echo $res['description']?></textarea>
                    </div>
                    <div style="margin: 1rem;">
                        <?php
                            $imageURL = '../uploads/'. $res["file_name"];
                        ?>
                        <img width="150px" height="150px" src="<?php echo $imageURL; ?>" alt="" />
                    </div>
                    <div class="textbox w-full">
                        <label for="house">Image</label>
                        <input type="file" name="house">
                    </div>

                    <input type="submit" name="update" value="Update" class="button w-full"></button>
            </form>
        </main>
    </div>
</body>

</html>
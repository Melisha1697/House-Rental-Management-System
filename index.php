<?php
include('./config/db_conn.php');


$query = "SELECT * FROM houses";
$result= mysqli_query($conn, $query);

if(isset($_POST['search'])){
    $title = $_POST['title'];
    
    $query = "SELECT * FROM houses WHERE (`title` LIKE '%". $title. "%')";
    $result= mysqli_query($conn, $query);
    header("location:search.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AAFNO-PAAN</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <!-- custom css file link  -->
    <link rel="stylesheet" href="./assets/css/style.css" />

</head>

<body>
    <!-- header section starts  -->

    <div class="go-up-button">
        <i class="fas fa-arrow-up"></i>
    </div>

    <header>

        <a href=" index.php" class="logo">
            <span> AAFNO </span> PAAN</a>


        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#services">services</a>
            <a href="#featured">featured</a>
            <a href="#agents">agents</a>
            <a href="#contact">contact</a>
            <a href="faq.php">FAQ</a>
        </nav>

        <div class="icons">
            <div id="menu-bars" class="fas fa-bars"></div>
            <a class="fas fa-search" id="searchPopup"></a>
            <div class=" popup" id="popup">
                <i class="fa-solid fa-circle-xmark" style="color: #333;" onclick="closePopup()"></i>
                <form action=" search.php" method="POST" class="search">
                    <input type="text" name="title" placeholder="Search by title">
                    <button type="submit" name="search" value="Search">
                        <img src="./assets/img/search.png" alt="">
                    </button>
                </form>
                <button type="button" class="cancel" onclick="closePopup()">Cancel</button>
            </div>
            <a href=" login.php" class="fas fa-user" title="Login Here!"></a>
            <a href="register.php" class="fas fa-sign-in-alt" title="Register From Here!!"></a>
        </div>
    </header>

    <!-- header section ends -->

    <!-- home section starts  -->

    <section class="home" id="home">
        <section class="banner">
            <div class="inner-text">
                <h1>House-Apartments for Rent</h1>
                <p>
                    Search In AAFNO-PAAN for house, apartments by <br />
                    neighborhood, price, amenity, and more.
                </p>
                <a href="search.php">
                    Search For House-Apartments <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </section>
    </section>

    <!-- home section ends -->

    <!-- services section starts  -->

    <section class="services" id="services">
        <h1 class="heading">our <span>services</span></h1>

        <div class="box-container">
            <div class="box">
                <img src="./assets/images/s-1.png" alt="" />
                <h3>buying home</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam
                    distinctio ipsa ab cum error quas fuga ad? Perspiciatis, autem
                    officiis?
                </p>
                <a href="#" class="btn">learn more</a>
            </div>

            <div class="box">
                <img src="./assets/images/s-2.png" alt="" />
                <h3>renting home</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam
                    distinctio ipsa ab cum error quas fuga ad? Perspiciatis, autem
                    officiis?
                </p>
                <a href="#" class="btn">learn more</a>
            </div>

            <div class="box">
                <img src="./assets/images/s-3.png" alt="" />
                <h3>selling home</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam
                    distinctio ipsa ab cum error quas fuga ad? Perspiciatis, autem
                    officiis?
                </p>
                <a href="#" class="btn">learn more</a>
            </div>
        </div>
    </section>

    <!-- services section ends -->

    <!-- featured section starts  -->

    <section class="featured" id="featured">
        <h1 class="heading"><span>featured</span> properties</h1>

        <div class="box-container">
            <?php
          $house = $conn->query("SELECT * FROM houses");
          while($row=$house->fetch_assoc()):
          ?>
            <?php
            $house_img = $conn->query("SELECT * FROM `house_images` WHERE id =". $row["Image"]." LIMIT 1");
            while($row2=$house_img->fetch_assoc()):
          ?>
            <div class="box">
                <div class="image-container">
                    <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row2['image']).'"/>' ?>
                    <div class="info">
                        <h3>for rent</h3>
                    </div>
                </div>
                <div class="content">
                    <div class="price">
                        <h3><?php echo number_format($row['price'],2) ?></h3>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-envelope"></a>
                        <a href="#" class="fas fa-phone"></a>
                    </div>
                    <div class="location">
                        <h3><?php echo $row['title'] ?></h3>
                        <p><?php echo $row['address'] ?></p>
                    </div>
                    <div class="details">
                        <h3><i class="fas fa-expand"></i> <?php echo $row['sq_ft'] ?> sqft</h3>
                        <h3><i class="fas fa-bed"></i> <?php echo $row['bedrooms'] ?> beds</h3>
                        <h3><i class="fas fa-bath"></i> <?php echo $row['bathrooms'] ?> baths</h3>
                        <h3><i class="fas fa-car"></i> <?php echo $row['garage'] ?> garage</h3>
                    </div>
                    <div class="buttons">
                        <a href="view.php?id=<?php echo $row['id']; ?>" class="btn">view details</a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
            <?php endwhile; ?>
        </div>
    </section>

    <!-- featured section ends -->

    <!-- agents section starts  -->

    <section class="agents" id="agents">
        <h1 class="heading">professional <span>agents</span></h1>

        <div class="box-container">
            <?php 
          $i = 1;
          $house = $conn->query("SELECT * FROM users");
          while($row=$house->fetch_assoc()):
            if($row['usertype'] != 'Admin')
            echo "<div class='box'>
              <a href='mailto:".$row['email']."'>
                  <i class='fas fa-envelop'></i>
                </a>
                <a href='tel:+".$row['phone']."'>
                  <i class='fas fa-phone'></i>
                </a>
                <img src='./assets/images/pic-1.png' alt='' />
                <h3>".$row['full_name']."</h3>
                <span>".$row['usertype']."</span>
                <div class='share'>
                  <a href='#' class='fab fa-facebook-f'></a>
                  <a href='#' class='fab fa-twitter'></a>
                  <a href='#' class='fab fa-instagram'></a>
                  <a href='#' class='fab fa-linkedin'></a>
                </div>
              </div>"
          ?>

            <?php endwhile; ?>
        </div>
    </section>

    <!-- agents section ends -->

    <!-- contact section starts  -->

    <section class="contact" id="contact">
        <h1 class="heading"><span>contact</span> us</h1>

        <div class="icons-container">
            <div class="icons">
                <img src="./assets/images/icon-1.png" alt="" />
                <h3>phone number</h3>
                <p>+123-456-7890</p>
                <p>+111-222-3333</p>
            </div>

            <div class="icons">
                <img src="./assets/images/icon-2.png" alt="" />
                <h3>email address</h3>
                <p>shaikhanas@gmail.com</p>
                <p>anasshaikha@gmail.com</p>
            </div>

            <div class="icons">
                <img src="./assets/images/icon-3.png" alt="" />
                <h3>office address</h3>
                <p>jogeshwari, mumbai, india - 400104</p>
            </div>
        </div>

        <div class="row">
            <form action="/real_estate_website/contact.php" method="POST">
                <div class="inputBox">
                    <input type="text" placeholder="Full Name" name="full_name" />
                    <input type="number" placeholder="Number" name="phone" />
                </div>
                <div class="inputBox">
                    <input type="email" placeholder="Email" name="email" />
                    <input type="text" placeholder="Subject" name="subject" />
                </div>
                <textarea name="message" placeholder="Message" id="" cols="30" rows="10"></textarea>
                <input type="submit" value="send message" class="btn" />
            </form>

            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.276738456662!2d85.31442681545721!3d27.67784043339405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19cbbeac9357%3A0x8f35a679609cb5b9!2sPulchowk%2C%20Lalitpur%2044600!5e0!3m2!1sen!2snp!4v1653652998536!5m2!1sen!2snp"
                width="500px" height="100%" style="border: 0; min-height: 400px; margin: auto;" allowfullscreen=""
                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

    <!-- contact section ends -->

    <!-- footer section starts  -->

    <section class="footer">
        <div class="footer-container">
            <div class="box-container">
                <div class="box">
                    <h3>branch location</h3>
                    <a href="#">india</a>
                    <a href="#">USA</a>
                    <a href="#">france</a>
                    <a href="#">russia</a>
                    <a href="#">japan</a>
                </div>

                <div class="box">
                    <h3>quick links</h3>
                    <a href="#">home</a>
                    <a href="#">services</a>
                    <a href="#">featured</a>
                    <a href="#">agents</a>
                    <a href="#">contact</a>
                </div>

                <div class="box">
                    <h3>extra links</h3>
                    <a href="#">my account</a>
                    <a href="#">my favorite</a>
                    <a href="#">my list</a>
                </div>

                <div class="box">
                    <h3>follow us</h3>
                    <a href="https://www.facebook.com/">facebook</a>
                    <a href="#">twitter</a>
                    <a href="#">instagram</a>
                    <a href="#">linkedin</a>
                </div>
            </div>

            <div class="credit">
                &copy; <span>2022 Aafnopaan.com </span> | all rights reserved!
            </div>
        </div>
    </section>

    <!-- footer section ends -->

    <!-- javascript part  -->
    <script>
    let menu = document.querySelector("#menu-bars");
    let navbar = document.querySelector(".navbar");

    menu.onclick = () => {
        navbar.classList.toggle("active");
        menu.classList.toggle("fa-times");
    };

    window.onscroll = () => {
        navbar.classList.remove("active");
        menu.classList.remove("fa-times");
    };

    document.addEventListener("scroll", () => {
        let header = document.querySelector("header");
        if (window.scrollY > 250) {
            header.style.background = "#333";
        } else {
            header.style.background = "transparent";
        }
    });
    const searchPopup = document.getElementById("searchPopup");
    console.log(searchPopup);
    searchPopup.addEventListener("click", () => {
        let popup = document.getElementById("popup");
        popup.classList.add("open-popup");

    })


    function openPopup() {
        popup.classList.add("open-popup");
    }

    function closePopup() {
        popup.classList.remove("open-popup");
    }
    </script>

    <script src="./assets/js/srcollup.js"></script>

</body>

</html>
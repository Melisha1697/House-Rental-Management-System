<?php
include('./config/db_conn.php');
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
    <link rel="stylesheet" href="./assets/css/dark.css">

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
            <!--- <a class="fas fa-search" id="searchPopup"></a>
            <div class=" popup" id="popup">
                <i class="fa-solid fa-circle-xmark" style="color: #333;" onclick="closePopup()"></i>
                <form action=" search.php" method="POST" class="search">
                    <input type="text" name="title" placeholder="Search by title">
                    <button type="submit" name="search" value="Search">
                        <img src="./assets/img/search.png" alt="">
                    </button>
                </form>
                <button type="button" class="cancel" onclick="closePopup()">Cancel</button>
        </div>--->
            <a href=" login.php" class="fas fa-user" title="Login Here!"></a>
            <a href="register.php" class="fas fa-sign-in-alt" title="Register From Here!!"></a>
            <div class="mode">
                <input type="checkbox" class="checkbox" id="chk" />
                <label class="label" for="chk">
                    <i class="fas fa-moon"></i>
                    <i class="fas fa-sun"></i>
                    <div class="ball"></div>
                </label>
            </div>
        </div>
    </header>

    <!-- header section ends -->

    <!-- home section starts  -->

    <section class="home" id="home">
        <section class="banner">
            <div class="inner-text">
                <h1>House-Apartments for Rent</h1>
                <p>
                    Search In AAFNO-PAAN for house by <br />
                    neighborhood, price, amenity, and more.
                </p>
                <a href="search.php">
                    Search For House-To-Rent <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </section>
    </section>

    <!-- home section ends -->

    <!-- services section starts  -->

    <section class="services" id="services">
        <h1 class="heading">our <span>Features</span></h1>

        <div class="box-container">
            <div class="box">
                <img src="./assets/images/s-1.png" alt="" />
                <h3>Safety & security</h3>
                <p style="text-align: justify; padding: 10px; text-transform: none;">
                    Every tenant searches for a place that's safe. Being safe and secure is something of utmost
                    importance for the tenants. This feature might seem like a simple point but it's very powerful and
                    can influence the decision of the tenant at any point in time. Most of the tenants spend a large
                    portion of their money to lease a home instead of an apartment because they along with their
                    families want to live in a safe environment.
                </p>
                <!--<a href="#" class="btn">learn more</a>-->
            </div>

            <div class="box">
                <img src="./assets/images/s-2.png" alt="" />
                <h3>Quality of Neighbourhood</h3>
                <p style="text-align: justify; padding: 10px; text-transform: none;">
                    The quality of a neighborhood draws a crystal clear picture of what the neighborhood is all about.
                    Another factor that's very vital is the neighborhood amenities available at the spot. Listen up my
                    friend; you should always go for quality over quantity.Tenant is looking for is a place that feels
                    like home.So make it a point to see to the fact that the
                    neighborhood in which your rental property is good in
                    all aspects.
                </p>
            </div>

            <div class="box">
                <img src="./assets/images/s-3.png" alt="" />
                <h3>Ready To move</h3>
                <p style="text-align: justify; padding: 10px; text-transform: none;">
                    A great tenant will have great expectations and will expect the property to be top-notch. If the
                    property needs a little bit of furnishing of some sort like painting, flooring, cleaning and a
                    tenant is fine with it and is ready to give you time to make it lavish, then you can't have high
                    hopes from that type of tenant.If you present your property in the best way possible, then there are
                    higher chances of the tenant being impressed with your level of standards.
                </p>
            </div>
        </div>
    </section>

    <!-- services section ends -->

    <!-- featured section starts  -->

    <section class="featured" id="featured">
        <h1 class="heading"><span>featured</span> properties</h1>

        <div class="box-container">
            <?php
                $house = "";
    
                $query2 = "SELECT COUNT(*) AS totalbooking FROM booking";
                $result2 = mysqli_query($conn, $query2);
                
                $res2= mysqli_fetch_assoc($result2);
                 if($res2['totalbooking']==0){
                    $house=  $conn->query("SELECT houses.house_id, `title`, `price`, `address`, `house_no`, `description`, `sq_ft`, `bedrooms`, `bathrooms`, `city`, `state`, `zipcode`, `garage`, `file_name` FROM `houses` LIMIT 6");
                 }else{
                    $house = $conn->query("SELECT house_id, `title`, `price`, `address`, `house_no`, `description`, `sq_ft`, `bedrooms`, `bathrooms`, `city`, `state`, `zipcode`, `garage`, `file_name` FROM `houses` WHERE house_id NOT IN (Select house_id FROM booking) LIMIT 6");
                 }
            
     

          while($row=$house->fetch_assoc()):
          ?>
            <div class="box">
                <div class="image-container">
                    <?php
                     $imageURL = 'admin/uploads/'. $row["file_name"];
                    ?>
                    <img src="<?php echo $imageURL; ?>" alt="" />
                    <div class="info">
                        <h3>for rent</h3>
                    </div>
                </div>
                <div class="content">
                    <div class="price">
                        <h3><?php echo number_format($row['price'],2) ?> / Month</h3>
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
                        <a href="view.php?id=<?php echo $row['house_id']; ?>" class="btn">view details</a>
                    </div>
                </div>
            </div>
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
          $house = $conn->query("SELECT * FROM users LIMIT 4");
          while($row=$house->fetch_assoc()):
            if($row['usertype'] != 'Admin') {
                
            $imageURL = "admin/uploads/users/". $row["user_img"];
            echo "<div class='box'>
                <a href='mailto:".$row['email']."'>
                    <i class='fas fa-envelop'></i>
                </a>
                <a href='tel:+".$row['phone']."'>
                    <i class='fas fa-phone'></i>
                </a>
                <img src='$imageURL' alt='' />
                <h3>".$row['full_name']."</h3>
                <span>".$row['usertype']."</span>
                <div class='share'>
                    <a href=".$row['facebook']." target='_blank' class='fab fa-facebook-f'></a>
                    <a href=".$row['twitter']." target='_blank' class='fab fa-twitter'></a>
                    <a href=".$row['instagram']." target='_blank' class='fab fa-instagram'></a>
                </div>
            </div>";
            }
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
                <p>shakyaahana@gmail.com</p>
                <p>ramadhikari@gmail.com</p>
            </div>

            <div class="icons">
                <img src="./assets/images/icon-3.png" alt="" />
                <h3>office address</h3>
                <p>okhubahal, lalitpur, nepal - 400104</p>
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
        if (window.scrollY > 100) {
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

    <script>
    const chk = document.getElementById('chk');
    if (localStorage.getItem('dark-real-state')) {
        document.body.classList.add('dark');
        localStorage.setItem('dark-real-state', 'active');
        chk.checked = true
    } else {
        document.body.classList.remove('dark');
        localStorage.removeItem('dark-real-state')
        chk.checked = false
    }

    chk.addEventListener('change', () => {
        document.body.classList.toggle('dark');

        if (document.body.classList.contains('dark')) {
            localStorage.setItem('dark-real-state', 'active');
        } else {
            localStorage.removeItem('dark-real-state')
        }
    });
    </script>

</body>

</html>
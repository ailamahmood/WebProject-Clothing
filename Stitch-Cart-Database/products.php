<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cloth";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM clothes";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--Home CSS-->
    <link rel="stylesheet" href="products.css">
    <!--Font awesome library-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!--Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!--Home JS-->
    <script src="Stitched.js"></script>


    <title>Stitched</title>
</head>
<body>


    <!-- NAVIGATION BAR-->
    <nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary" data-bs-theme="light">
        <div class="container-fluid">

            <!--BRAND LOGO AND NAME-->
            <a class="navbar-brand" href="#">
                <img src="images/Logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            </a>

            <!--COLLAPSE MENU ON MINIMIZE FOR RESPONSIVE-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav navbar-center me-auto mb-2 mb-lg-0">

                    <!--HOME, CONTACT , ABOUT-->
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../Home/Home.html">HOME</a>
                    </li>
                    <!--DROPDOWN MENU-->
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          CATEGORY
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../Women/Women.html">Women</a></li>
                        <li><a class="dropdown-item" href="../Men/Men.html">Men</a></li>
                      </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../ContactUs/Contact.php">CONTACT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../About/About.html">ABOUT</a>
                    </li>

                </ul>

                <!--NAVBAR ICONS-->
                <span class="icons">
                    <a href="#"><i class="fa-solid fa-search"></i></a>
                    <a href="cart.php"><i class="fa-solid fa-cart-shopping" id="cart-icon" data-items="0"></i></a>
                    <a href="#"><i class="fa-solid fa-heart" href="#"></i></a>
                    <a href="#"><i class="fa-solid fa-user"></i></a>
                </span>

            </div>
        </div>
    </nav>
    <!--Heading and Filters-->
    <div class="container">
        <div class="row">
          <div class="col-12">
            <h2>Stitched Fabric</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="filters">
              <label>Sort by:</label>
              <select class="form-control">
                <option value="price-low-to-high">Price: Low to High</option>
                <option value="price-high-to-low">Price: High to Low</option>
                <option value="ascending">Ascending</option>
                <option value="descending">Descending</option>
              </select>
              <label class="displayed">Total items displayed: 16</label>
              <a href="../Unstitched/Unstitched.html" class="Fab">
                <label class="stitched-text">Unstitched Article</label>
              </a>
            </div>
          </div>
        </div>
      </div>

      
    <div class="container-row">
        <div class="row">
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='col-md-3'>";
                    echo "<div class='card text-center'>";

                    echo "<img src='" . htmlspecialchars($row["Image"]) . "' alt='" . htmlspecialchars($row["Name"]) . "' class='card-img-top'/>";

                    echo "<div class='card-body'>";
                    echo '<a href="#" class="btn btn-light btn-sm"><i class="fas fa-heart"></i></a>';

                    echo "<h5 class='card-title'>" . htmlspecialchars($row["Name"]) . "</h5>";
                    echo "<p class='card-text'>" . htmlspecialchars($row["Details"]) . "</p>";
                    echo "<p class='card-text'>Size: " . htmlspecialchars($row["Size"]) . "</p>";
                    echo "<p class='card-text'><strong>PKR" . htmlspecialchars($row["Price"]) . "</strong></p>";
                    echo "</div>";

                    echo "<form method='post' action='add_to_cart.php'>";
                    echo "<input type='hidden' name='id' value='" . htmlspecialchars($row["ID"]) . "' />";
                    echo "<button type='submit' class='add-cart'>Add to Cart</button>";

                    echo "</form>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p>No products available.</p>";
            }
            ?>





        </div>
    </div>



        <!--FOOTER-->
        <div class="footer">
        <div class="footer-box">
            <div class="footer-i f1">
                <h5>Contact</h5>
                <label>Sector: 4 Jinnah Avenue, F 8/4 F-8</label><br>
                <label>City: Islamabad</label><br>
                <label>Country: Pakistan</label><br>
                <label>Zip Code: 44220</label><br>
                <label>Phone: 051-3719183</label><br>
            </div>

            <div class="footer-i f2">
                <h5>Services</h5>
                <label><a href="#">Ordering & Payment</a></label><br>
                <label><a href="#">Customer Review</a></label><br>
                <label><a href="#">Return/Cancellation</a></label><br>
                <label><a href="#">Frequently Asked Questions</a></label><br>
                <label><a href="#">Terms and Conditions</a></label><br>
            </div>

            <div class="footer-i f3">
                <h5>Bazeena Clothing</h5>
                <label>Elevate your wardrobe with Bazeena Clothing, where every stitch tells a story of elegance and
                    individuality. Discover your signature style today</label><br>
                <input type="email" placeholder="Email Address">
                <button id="emailButton"><i class="fa-solid fa-share"></i></button>
                <div class="social-media">
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-youtube"></i></a>
                    <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                </div>
            </div>

            <div class="footer-copyright">
                &copy; 2024 Bazeena - All rights reserved
            </div>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>

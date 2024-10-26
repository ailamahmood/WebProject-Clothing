<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cloth";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['remove'])) {
    $id = $_POST['id'];

    // Find the product in the cart
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['ID'] == $id) {
            // Increase quantity in the database
            $stmt = $conn->prepare("UPDATE clothes SET Quantity = Quantity + ? WHERE ID = ?");
            $stmt->bind_param("ii", $item['quantity'], $id);
            $stmt->execute();

            // Remove product from cart session
            unset($_SESSION['cart'][$key]);
            break;
        }
    }

    // If the cart is empty, unset the cart session
    if (empty($_SESSION['cart'])) {
        unset($_SESSION['cart']);
    }

    header("Location: cart.php");
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>

    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!--Font Awesome library-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!--css-->
    <link rel="stylesheet" href="cart.css">
    <!--JQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!--Bootstrap js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!--js-->
    <script src="Shopping-Cart.js"></script>
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
                    <a href="../Stitch-Cart-Database/cart.php"><i class="fa-solid fa-cart-shopping" href="#"></i></a>
                    <a href="#"><i class="fa-solid fa-heart" href="#"></i></a>
                    <a href="#"><i class="fa-solid fa-user"></i></a>
                </span>

            </div>
        </div>
    </nav>

    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h3 class="text-center">My Bag</h3>
        </div>
    </div>
    <?php
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        $total = 0;
        foreach ($_SESSION['cart'] as $item) {
            echo "<div class='row'>";
            echo "<div class='col-md-8 col-sm-12'>";
            echo "<div class='card'>";
            echo "<div class='card-body'>";
            echo "<div class='row'>";
            echo "<div class='col-md-4 col-sm-12'>";
            echo "<img src='" . htmlspecialchars($item["Image"]) . "' alt='" . htmlspecialchars($item["Name"]) . "' class='img-fluid'>";
            echo "</div>";
            echo "<div class='col-md-8 col-sm-12'>";
            echo "<p>" . htmlspecialchars($item["Name"]) . "</p>";
            echo "<h5>Price: PKR" . htmlspecialchars($item["Price"]) . "</h5>";
            echo "<p>Quantity: " . htmlspecialchars($item["quantity"]) . "</p>";
            echo "<p>Subtotal: PKR" . (htmlspecialchars($item["Price"]) * htmlspecialchars($item["quantity"])) . "</p>";
            echo "<form method='post' action='cart.php'>";
            echo "<input type='hidden' name='id' value='" . htmlspecialchars($item["ID"]) . "' />";
            echo "<button type='submit' name='remove' class='btn btn-primary'>Remove from Cart</button>
                </form>
                </div>
                </div>
                </div>
                </div>
                </div>";

            $total += $item["Price"] * $item["quantity"];
        }

        echo "<div class='row'>
        <div class='col-md-4 col-sm-12'>
            <div class='row'>
                <div class='col-12'>
                    <h5 class='promo-title'>Promo Code</h5>
                    <form>
                        <div class='form-group'>
                            <input type='text' class='form-control' placeholder='Enter Promo Code'>
                            <button type='submit' class='btn btn-primary apply'>Apply</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class='row'>
                <div class='col-12'>
                    <h4>Order Summary</h4>
                    <table class='table'>
                        <tbody>
                            <tr>
                                <td>Total:</td>
                                <td>PKR $total</td>
                            </tr>
                        </tbody>
                    </table>
                    <button type='submit' class='btn btn-primary checkout'>Proceed to Checkout</button>
                </div>
            </div>
        </div>
    </div>";

    } else {
        echo "<div class='row'>
        <div class='col-12'>
        <p>Your cart is empty.</p>
        </div>
        </div>";
    }
    ?>
</div>



        <!--FOOTER-->
        <div class="footer">
        <div class="footer-box">
            <div class="footer-i f1">
                <h5>Contact</h5>
                <label>4 Jinnah Avenue, F 8/4 F-8</label><br>
                <label>City: Islamabad</label><br>
                <label>Country: Pakistan</label><br>
                <label>Zip Code:  44220</label><br>
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

        </div>

        <div class="footer-copyright">
            &copy; 2024 Bazeena - All rights reserved
        </div>
    </div>

</body>
</html>


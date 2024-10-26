<?php include 'sendemail.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>

    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!--Font Awesome library-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!--css-->
    <link rel="stylesheet" href="contact.css">
    <!--JQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!--Bootstrap js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!--js-->
   

</head>
  <body>

    <!--alert messages start-->
    <?php echo isset($alert) ? $alert : ''; ?>
    <!--alert messages end-->

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
                        <a class="nav-link active" href="../ContactUs/Contact.php">CONTACT</a>
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
    
    <!--CONTACT FORMS-->
    <div class="text-center page-width page-width--narrow">
        <div class="intro">
            <h2>Get in touch</h2>
            <div class="text rte">
                <p>Connect with the passionate team of Bazeena. We're here to help you find the pieces that make you feel 
                    confident and ready to take on the world!
                </p>
            </div>
        </div>   
    </div>
    <h2 class="contactUs">Contact Us</h2>
    <section class="ftco-section contact-bg">
        <div class="contact-wrap">
            <div id="form-message-warning"></div>
            <div id="form-message-success">Your message was sent, thank you!</div>

            <form action="" method="POST" id="contactForm" name="contactForm" class="contactForm">
                <label for="name">Full Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
                <label for="email">Email Address</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                <label for="subject">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                <label for="message">Message</label>
                <textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Message" required></textarea>

                <input type="submit" name="submit" value="Send Message" class="btn btn-primary">
                <div class="submitting"></div>
            </form>
        </div>
    </section> 

    <!-- Social icons section -->
    <h2 class="socials">Follow On</h2>
    <div class="social-media-icons">
        <i class="fab fa-google"></i>
        <i class="fab fa-facebook-f"></i>
        <i class="fab fa-instagram"></i>
        <i class="fab fa-apple"></i>
        <i class="fab fa-linkedin"></i>
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
    <!--contact section end-->

    <script type="text/javascript">
    if(window.history.replaceState){
      window.history.replaceState(null, null, window.location.href);
    }
    </script>

  </body>
</html>

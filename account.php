<?php

    session_start();

    if(isset($_SESSION['customerId'])){
        
        $logout_button = '<a href="logout.php">Logout</a>';
        $edit_profile_button = '<a href="edituser.php">Edit Profile</a>';
    } else {
        
        $logout_button = '';
        $edit_profile_button = '';
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">  
    <title>Account</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <section id="header">
        <a href="#"><img src="assets/rt_logo.png" class="logo" alt="logo" width="100px"></a>

        <div>
            <ul id="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a class="active" href="account.php">Account</a></li>
                <li id="bar-bag"><a href="cart.php"><i class="fas fa-shopping-bag"></i></a></li>
                <a href="#" id="close"><i class="fas fa-times"></i></a>
            </ul>
        </div>
        <div id="mobile">
            <a href="cart.php"><i class="fas fa-shopping-bag"></i></a>
            <i id="bar" class="fas fa-bars"></i>
        </div>

    </section>

    <section id="page-header">
        <h2>Account</h2>
        <p>Login or Register to make a New Account</p>
    </section>

    <section id="login-register" class="section-p1">
    <div class="log-container">
        
        <?php
            if(isset($_SESSION['customerId'])){
                
                echo '<div class="log-button"><a href="logout.php" class="login-btn"><img src="assets/login.png" alt="login"><div class="login"><h5>Logout</h5></div></a></div>';
                echo '<div class="log-button"><a href="edituser.php" class="login-btn"><img src="assets/register.png" alt="edit profile"><div class="login"><h5>Edit Profile</h5></div></a></div>';
            } else {
                
                echo '<div class="log-button"><a href="login.php" class="login-btn"><img src="assets/login.png" alt="login"><div class="login"><h5>Login</h5></div></a></div>';
                echo '<div class="log-button"><a href="register.php" class="login-btn"><img src="assets/register.png" alt="login"><div class="login"><h5>Register</h5></div></a></div>';
            }
        ?>
    </div>
</section>


    
    <section id="newsletter" class="section-p1" >
        <div class="newstext">
            <h4>Subsribe To Our Newsletters</h4>
            <p>Get updated via E-mail about our latest products and <span>special offers.</span></p>
        </div>
        <div class="form">
            <input type="text" placeholder="Your E-mail Address">
            <button class="normal">Subscribe</button>
        </div>
    </section>

    <footer class="section-p1">
        <div class="col">
            <h4 class="poppins-regular">Contact</h4>
            <p><span class="poppins-regular">Address:</span></b> 63 Buitengracht Street, Cape Town, WC, 8001, South Africa</p>
            <p><span class="poppins-regular">Phone:</span> +27 21 907 4860</p>
            <p><span class="poppins-regular">Hours:</span> 08:00 - 17:00, Mon - Sat</p>
            <div class="follow">
                <h4 class="poppins-regular">Follow Us</h4>
                <div class="socials">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                </div>
            </div>
        </div>

        <div class="col">
            <h4 class="poppins-regular">About</h4>
            <a href="#">About Us</a>
            <a href="#">Contact Us</a>
        </div>

        <div class="col">
            <h4 class="poppins-regular">My Account</h4>
            <a href="#">Sign In</a>
            <a href="#">View Cart</a>
        </div>

        <div class="col payment">
            <h4 class="poppins-regular">Secured Payment Gateways</h4>
            <img src="assets/payment.png" alt="payment-icons" width="180px">
        </div>
        
        <div class="copyright">
            <p>© 2024 RetroTone Guitars All rights reserved</p>
        </div>
        
    </footer>

    <script src="script.js"></script>

</body>
</html>

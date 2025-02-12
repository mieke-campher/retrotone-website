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
    <title>Contact</title>
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
                <li><a class="active" href="contact.php">Contact</a></li>
                <li><a href="account.php">Account</a></li>
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
        <h2>Contact Us</h2>
        <p>Give us a call or come visit our store</p>
    </section>

    <section id="contact-details" class="section-p1">
        <div class="details">
            <h2>Contact Us</h2>
            <h3>RetroTone Store</h3>
            <div>
                <li>
                    <i class="fas fa-map-marker-alt"></i>
                    <p>63 Buitengracht Street, Cape Town, WC, 8001, South Africa</p>
                </li>
                <li>
                    <i class="far fa-envelope"></i>
                    <p>store@retrotone.co.za</p>
                </li>
                <li>
                    <i class="fas fa-phone-alt"></i>
                    <p>+27 21 907 4860</p>
                </li>
                <li>
                    <i class="far fa-clock"></i>
                    <p>08:00 - 17:00, Mon - Sat</p>
                </li>
            </div>
        </div>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3310.811916438498!2d18.418119899999997!3d-33.92024!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1dcc67665d7342fd%3A0x54cdeddf4e7ab965!2s63%20Buitengracht%20St%2C%20Cape%20Town%20City%20Centre%2C%20Cape%20Town%2C%208000!5e0!3m2!1sen!2sza!4v1716210338025!5m2!1sen!2sza" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

    <section id="members" class="section-p1">
        <div class="people">
            <div>
                <img src="assets/owner.png" alt="owner">
                <p><span class="poppins-regular">Jared Oosthuizen</span> Owner </br> Phone: +27 73 453 8572
                </br> E-mail: jared@retrotone.co.za</p>
            </div>
            <div>
                <img src="assets/owner2.png" alt="co-owner">
                <p><span class="poppins-regular">Lisa Oosthuizen</span> Co-Owner </br> Phone: +27 83 254 9600
                </br> E-mail: lisa@retrotone.co.za</p>
            </div>
        </div>
    </section>

    <footer class="section-p1">
        <div class="col">
            <h4 class="poppins-regular">Contact</h4>
            <p><span class="poppins-regular">Address:</span> 63 Buitengracht Street, Cape Town, WC, 8001, South Africa</p>
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
            <a href="about.php">About Us</a>
            <a href="contact.php">Contact Us</a>
        </div>

        <div class="col">
            <h4 class="poppins-regular">My Account</h4>
            <a href="login.php">Sign In</a>
            <a href="cart.php">View Cart</a>
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
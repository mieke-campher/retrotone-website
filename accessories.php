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
    <title>Accessories</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <section id="header">
        <a href="#"><img src="assets/rt_logo.png" class="logo" alt="logo" width="100px"></a>

        <div>
            <ul id="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a class="active" href="shop.php">Shop</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
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
        <h2>Accessories</h2>
    </section>

    <section id="product1" class="section-p1">
        <div class="pro-container">
            <div class="pro-container">
                <div class="product">
                    <a href="sproduct.php?id=AC-1" class="spro-link">
                        <img src="assets/Products/Accessories/Capo.png" alt="capo">
                        <div class="description">
                            <span>Earnie Ball</span>
                            <h5>Ernie Ball Axis Capo – Black Satin</h5>
                            <div class="reviewstar">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h4>R335</h4>
                        </div>
                    </a>
                </div>
                <div class="product">
                    <a href="sproduct.php?id=AC-2" class="spro-link">
                        <img src="assets/Products/Accessories/stool.png" alt="foot_stool">
                        <div class="description">
                            <span>Nomad</span>
                            <h5>Nomad NFS-G301 Foot Stool</h5>
                            <div class="reviewstar">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h4>R275</h4>
                        </div>
                    </a>
                </div>
                <div class="product">
                    <a href="sproduct.php?id=AC-3" class="spro-link">
                        <img src="assets/Products/Accessories/strap.png" alt="guitar_strap">
                        <div class="description">
                            <span>Earnie Ball</span>
                            <h5>Ernie Ball Polypro Guitar Strap – Red</h5>
                            <div class="reviewstar">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h4>R190</h4>
                        </div>
                    </a>
                </div>
                <div class="product">
                    <a href="sproduct.php?id=AC-4" class="spro-link">
                        <img src="assets/Products/Accessories/picks.png" alt="picks">
                        <div class="description">
                            <span>Planetwaves</span>
                            <h5>Planet Waves Beatles Signature Guitar Pick Tin – 15 Picks</h5>
                            <div class="reviewstar">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h4>R200</h4>
                        </div>
                    </a>
                </div>
            </div>
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
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
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <section id="header">
        <a href="#"><img src="assets/rt_logo.png" class="logo" alt="logo" width="100px"></a>

        <div>
            <ul id="navbar">
                <li><a class="active" href="index.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
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

    <section id="hero">
        <h1>RetroTone</h1>
        <a href="shop.php"><button>Shop Now</button></a>
    </section>

    <section id="feature" class="section-p1">
        <div class="fe-box fe-box1">
            <img src="assets/feature3.png" alt="free shipping">
            <h6>Promotions</h6>
        </div>
        <div class="fe-box fe-box2">
            <img src="assets/feature1.png" alt="free shipping">
            <h6>Free Shipping</h6>
        </div>
        <div class="fe-box fe-box3">
            <img src="assets/feature2.png" alt="free shipping">
            <h6>2 Year Warranty</h6>
        </div>
        <div class="fe-box fe-box4">
            <img src="assets/feature5.png" alt="free shipping">
            <h6>Quality Assured</h6>
        </div>
        <div class="fe-box fe-box5">
            <img src="assets/feature4.png" alt="free shipping">
            <h6>Shop Nationwide</h6>
        </div>
        <div class="fe-box fe-box6">
            <img src="assets/feature6.png" alt="free shipping">
            <h6>Secure Checkout</h6>
        </div>
    </section>

    <section id="product1" class="section-p1">
        <h2>Featured Acoustic Guitars</h2>
        <p>Best-Selling & Recommended Acoustic Guitars</p>
        <div class="pro-container">
            <div class="product">
                <a href="sproduct.php?id=AG-1" class="spro-link">
                    <img src="assets/Products/Acoustic/MA1.png" alt="Martin-Guitar">
                    <div class="description">
                        <span>Martin</span>
                        <h5>Martin GPC-X2E Rosewood Acoustic-Electric Guitar</h5>
                        <div class="reviewstar">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>R15,995</h4>
                    </div>
                </a>
            </div>
            <div class="product">
                <a href="sproduct.php?id=AG-2" class="spro-link">
                    <img src="assets/Products/Acoustic/FA1.png" alt="Fender-Guitar">
                    <div class="description">
                        <span>Fender</span>
                        <h5>Fender Redondo Player Acoustic Guitar</h5>
                        <div class="reviewstar">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>R9,175</h4>
                    </div>
                </a>
                
            </div>
            <div class="product">
                <a href="sproduct.php?id=AG-3" class="spro-link">
                    <img src="assets/Products/Acoustic/FA2.png" alt="Fender-Guitar">
                    <div class="description">
                        <span>Fender</span>
                        <h5>Fender Tim Armstrong Hellcat Acoustic Guitar</h5>
                        <div class="reviewstar">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>R10,870</h4>
                    </div>
                </a>
            </div>
            <div class="product">
                <a href="sproduct.php?id=AG-4" class="spro-link">
                    <img src="assets/Products/Acoustic/CA1.png" alt="Cort-Guitar">
                    <div class="description">
                        <span>Cort</span>
                        <h5>Cort AD810 OP Acoustic Guitar</h5>
                        <div class="reviewstar">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>R2,340</h4>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <section id="banner" >
        <h4>Promotions</h4>
        <h2>Up to <span>50% off</span> - All Accessories</h2>
        <a href="accessories.php"><button class="normal">Explore More</button></a>
    </section>  

    <section id="product1" class="section-p1">
        <h2>Featured Electric Guitars</h2>
        <p>Best-Selling & Recommended Electric Guitars</p>
        <div class="pro-container">
            <div class="product">
                <a href="sproduct.php?id=EG-1" class="spro-link">
                    <img src="assets/Products/Electric/CE1.png" alt="Cort-Guitar">
                    <div class="description">
                        <span>Cort</span>
                        <h5>Cort CR100 Electric Guitar</h5>
                        <div class="reviewstar">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>R5,299</h4>
                    </div>
                </a>
            </div>
            <div class="product">
                <a href="sproduct.php?id=EG-2" class="spro-link">
                    <img src="assets/Products/Electric/CE2.png" alt="Cort-Guitar">
                    <div class="description">
                        <span>Cort</span>
                        <h5>Cort X100 Electric Guitar</h5>
                        <div class="reviewstar">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>R3,745</h4>
                    </div>
                </a>
            </div>
            <div class="product">
                <a href="sproduct.php?id=EG-3" class="spro-link">
                    <img src="assets/Products/Electric/PE1.png" alt="PRS-Guitar">
                    <div class="description">
                        <span>PRS</span>
                        <h5>PRS SE Silver Sky – Rosewood Fretboard Electric Guitar</h5>
                        <div class="reviewstar">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>R19,990</h4>
                    </div>
                </a>
            </div>
            <div class="product">
                <a href="sproduct.php?id=EG-4" class="spro-link">
                    <img src="assets/Products/Electric/FE1.png" alt="Fender-Guitar">
                    <div class="description">
                        <span>Fender</span>
                        <h5>Fender Player Series Telecaster®</h5>
                        <div class="reviewstar">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>R22,265</h4>
                    </div>
                </a>
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
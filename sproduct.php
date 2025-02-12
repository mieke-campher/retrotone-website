<?php
session_start();

$customerId = $_SESSION['customerId'] ?? null;

$_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];

$servername = "sql206.infinityfree.com"; 
$username = "if0_38299513"; 
$password = "73023Huisies"; 
$dbname = "if0_38299513_RetroTone_DB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    $escapedProductId = $conn->real_escape_string($productId);
    $sql = "SELECT * FROM Products WHERE productID = '$escapedProductId'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $productCategory = $row['Category'];
        $productName = $row['Name'];
        $productPrice = $row['Price'];
        $productDetails = $row['Details'];

        
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addToCart'])) {
            if ($customerId) {
                $quantity = intval($_POST['quantity']);
                $totalPrice = $productPrice * $quantity;

                $sql = "INSERT INTO Cart (CustomerID, productID, Price, Quantity, TotalPrice) VALUES ('$customerId', '$escapedProductId', '$productPrice', '$quantity', '$totalPrice')";
                if ($conn->query($sql) === TRUE) {
                    echo "Product added to cart successfully!";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                header("Location: account.php");
                exit();
            }
        }

    } else {
        echo "Product not found!";
        exit;
    }
} else {
    echo "Product ID not provided!";
    exit;
}

$conn->close();
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
    <title>Shop</title>
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

    <section id="pro-details" class="section-p1">
        <div class="single-pro-img">
            <img src="" width="100%" id="MainImg" alt="">
            <div class="small-img-group" id="smallImgGroup">

            </div>
        </div>
        <div class="single-pro-details">
            <h6><?php echo htmlspecialchars($productCategory); ?></h6>
            <h4><?php echo htmlspecialchars($productName); ?></h4>
            <h2><?php echo "R" . number_format($productPrice, 0, '.', ','); ?></h2>
            <form method="post" action="">
                <input type="number" name="quantity" value="1">
                <button type="submit" name="addToCart" class="normal">Add To Cart</button>
            </form>
            <h3>Product Details</h3>
            <span><?php echo htmlspecialchars($productDetails); ?></span>
        </div>
    </section>

    <script>
        const products = {
            // Acoustic Guitars
            "AG-1": {
                "images": ["assets/Products/Acoustic/MA1.png", "assets/Products/Acoustic/MA1.1.png", "assets/Products/Acoustic/MA1.2.png", "assets/Products/Acoustic/MA1.3.png"]
            },
            "AG-2": {
                "images": ["assets/Products/Acoustic/FA1.png", "assets/Products/Acoustic/FA1.1.png", "assets/Products/Acoustic/FA1.2.png", "assets/Products/Acoustic/FA1.3.png"]
            },
            "AG-3": {
                "images": ["assets/Products/Acoustic/FA2.png", "assets/Products/Acoustic/FA2.1.png", "assets/Products/Acoustic/FA2.2.png", "assets/Products/Acoustic/FA2.3.png"]
            },
            "AG-4": {
                "images": ["assets/Products/Acoustic/CA1.png", "assets/Products/Acoustic/CA1.1.png", "assets/Products/Acoustic/CA1.2.png", "assets/Products/Acoustic/CA1.3.png"]
            },
            // Electric Guitars
            "EG-1": {
                "images": ["assets/Products/Electric/CE1.png", "assets/Products/Electric/CE1.1.png"]
            },
            "EG-2": {
                "images": ["assets/Products/Electric/CE2.png", "assets/Products/Electric/CE2.1.png"]
            },
            "EG-3": {
                "images": ["assets/Products/Electric/PE1.png", "assets/Products/Electric/PE1.1.png", "assets/Products/Electric/PE1.2.png"]
            },
            "EG-4": {
                "images": ["assets/Products/Electric/FE1.png", "assets/Products/Electric/FE1.1.png", "assets/Products/Electric/FE1.2.png"]
            },
            // Accessories
            "AC-1": {
                "images": ["assets/Products/Accessories/Capo.png"]
            },
            "AC-2": {
                "images": ["assets/Products/Accessories/stool.png"]
            },
            "AC-3": {
                "images": ["assets/Products/Accessories/strap.png"]
            },
            "AC-4": {
                "images": ["assets/Products/Accessories/picks.png"]
            },
            // Amplifiers
            "AM-1": {
                "images": ["assets/Products/Amps/FAM1.png", "assets/Products/Amps/FAM1.1.png", "assets/Products/Amps/FAM1.2.png"]
            },
            "AM-2": {
                "images": ["assets/Products/Amps/FAM2.png", "assets/Products/Amps/FAM2.1.png", "assets/Products/Amps/FAM2.2.png"]
            },
            "AM-3": {
                "images": ["assets/Products/Amps/BOSS1.png", "assets/Products/Amps/BOSS1.1.png", "assets/Products/Amps/BOSS1.2.png"]
            },
            "AM-4": {
                "images": ["assets/Products/Amps/FAM3.png", "assets/Products/Amps/FAM3.1.png", "assets/Products/Amps/FAM3.2.png"]
            },
        };

        const urlParams = new URLSearchParams(window.location.search);
        const productId = urlParams.get('id');

        if (products[productId]) {
            const product = products[productId];
            document.getElementById('MainImg').src = product.images[0];

            const smallImgGroup = document.getElementById('smallImgGroup');
            product.images.forEach((imgSrc, index) => {
                const div = document.createElement('div');
                div.className = 'small-img-col';
                const img = document.createElement('img');
                img.src = imgSrc;
                img.width = 100;
                img.className = 'small-img';
                img.onclick = function() {
                    document.getElementById('MainImg').src = imgSrc;
                };
                div.appendChild(img);
                smallImgGroup.appendChild(div);
            });
        } else {
            alert('Product images not found!');
        }

    </script>

    

    <script src="script.js"></script>
</body>

</html>

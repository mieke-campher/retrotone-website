<?php
session_start();

$customerId = $_SESSION['customerId'];


if (!isset($_SESSION['customerId'])) {
    $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
    header("Location: account.php");
    exit(); 
}

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "RetroTone_DB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if(isset($_POST['removeFromCart'])) {
    $productIdToRemove = $_POST['productIdToRemove'];
    $sql = "DELETE FROM Cart WHERE CustomerID = '$customerId' AND productID = '$productIdToRemove'";
    if ($conn->query($sql) === TRUE) {
        echo "Item removed from cart successfully!";
    } else {
        echo "Error removing item from cart: " . $conn->error;
    }
}

$sql = "SELECT p.productID, p.Name, p.Price, c.Quantity, c.TotalPrice, p.ImagePath FROM Products p JOIN Cart c ON p.productID = c.productID WHERE c.CustomerID = '$customerId'";
$result = $conn->query($sql);

$totalPrice = 0;

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
    <title>Cart</title>
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
                <li><a href="account.php">Account</a></li>
                <li id="bar-bag"><a class="active" href="cart.php"><i class="fas fa-shopping-bag"></i></a></li>
                <a href="#" id="close"><i class="fas fa-times"></i></a>
            </ul>
        </div>
        <div id="mobile">
            <a href="cart.php"><i class="fas fa-shopping-bag"></i></a>
            <i id="bar" class="fas fa-bars"></i>
        </div>

    </section>

    <section id="page-header">
        <h2>Cart</h2>
        <p>One step closer to greatness</p>
    </section>

    
    <section id="cart" class="section-p1">
    <table>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Action</th>
        </tr>
        <?php
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td><img src='{$row['ImagePath']}' alt='{$row['Name']}' style='max-width: 100px;'></td>";
            echo "<td>{$row['Name']}</td>";
            echo "<td>R" . number_format($row['Price'], 0, '.', ',') . "</td>";
            echo "<td>{$row['Quantity']}</td>";
            echo "<td>R" . number_format($row['TotalPrice'], 0, '.', ',') . "</td>";
            echo "<td>
                    <form method='post' action=''>
                        <input type='hidden' name='productIdToRemove' value='{$row['productID']}'>
                        <button class='remove-button' type='submit' name='removeFromCart'>Remove from Cart</button>
                    </form>
                  </td>";
            echo "</tr>";

            $totalPrice += $row['TotalPrice'];
        }

        echo "<tr class='total-row'>
                <td colspan='4'></td>
                <td>Total:</td>
                <td>R" . number_format($totalPrice, 0, '.', ',') . "</td>
            </tr>";
        ?>
    </table>
    </section>

    <section id="pay" class="section-p1">
        <div class="pay-container">
            <?php if ($totalPrice > 0): ?>
                <a href="payment.php"><button class="payment-button" type="submit" name="payment"><span>Proceed to Payment</span></button></a>
            <?php endif; ?>
        </div>
    </section>

    <section id="orders" class="section-p1">
        <div class="orders-container">
            <a href="view_orders.php"><button class="normal" type="button"><span>View Orders</span></button></a>
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

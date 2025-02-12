<?php
session_start();

if (!isset($_SESSION['customerId'])) {
    header("Location: login.php");
    exit();
}

$customerId = $_SESSION['customerId'];

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "RetroTone_DB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT o.DatePurchase, o.Quantity, o.TotalPrice, p.Name, p.Price, p.ImagePath
        FROM `Order` o
        JOIN Products p ON o.productID = p.productID
        WHERE o.CustomerID = ?
        ORDER BY o.DatePurchase DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $customerId);
$stmt->execute();
$result = $stmt->get_result();

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
    <title>Order History</title>
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
        <h2>Orders</h2>
        <p>Your orders are listed below</p>
    </section>

    <section id="cart" class="section-p1">
        <table>
            <tr>
                <th>Image</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Date Purchased</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td><img src='{$row['ImagePath']}' alt='{$row['Name']}' style='max-width: 100px;'></td>";
                    echo "<td>{$row['Name']}</td>";
                    echo "<td>R" . number_format($row['Price'], 0, '.', ',') . "</td>";
                    echo "<td>{$row['Quantity']}</td>";
                    echo "<td>R" . number_format($row['TotalPrice'], 0, '.', ',') . "</td>";
                    echo "<td>{$row['DatePurchase']}</td>";
                    echo "</tr>";

                    $totalPrice += $row['TotalPrice'];
                }

                echo "<tr class='total-row'>
                        <td colspan='4'></td>
                        <td>Total:</td>
                        <td>R" . number_format($totalPrice, 0, '.', ',') . "</td>
                    </tr>";
            } else {
                echo "<tr><td colspan='6'>No orders found</td></tr>";
            }
            ?>
        </table>
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


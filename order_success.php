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

$sqlCustomer = "SELECT CustomerName, CustomerEmail, CustomerPhone, CustomerAddress FROM Customer WHERE CustomerID = ?";
$stmtCustomer = $conn->prepare($sqlCustomer);
$stmtCustomer->bind_param("i", $customerId);
$stmtCustomer->execute();
$resultCustomer = $stmtCustomer->get_result();
$rowCustomer = $resultCustomer->fetch_assoc();

$sql = "SELECT o.DatePurchase, o.Quantity, o.TotalPrice, p.Name, p.Price, p.ImagePath
        FROM `Order` o
        JOIN Products p ON o.productID = p.productID
        WHERE o.CustomerID = ? AND o.Status = 'N'";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $customerId);
$stmt->execute();
$result = $stmt->get_result();

$sqlUpdate = "UPDATE `Order` SET Status = 'Y' WHERE CustomerID = ? AND Status = 'N'";
$stmtUpdate = $conn->prepare($sqlUpdate);
$stmtUpdate->bind_param("i", $customerId);

if (!$stmtUpdate->execute()) {
    echo "Error updating order status: " . $stmtUpdate->error;
}

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
    <title>Order Success</title>
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
        <h2>Order Success</h2>
        <p>Thank you for your purchase!</p>
    </section>


    <section id="customer-details" class="section-p1">
        <h2 class="poppins-regular">Order Summary</h2>
        <h3 class="poppins-regular">Customer Details</h3>
        <div class="customer-info">
            <div>
                <p><span class="poppins-regular">Name:</span></p>
                <p><?php echo $rowCustomer['CustomerName']; ?></p>
            </div>
            <div>
                <p><span class="poppins-regular">Email:</span></p>
                <p><?php echo $rowCustomer['CustomerEmail']; ?></p>
            </div>
        </div>
        <div class="customer-info">
            <div>
                <p><span class="poppins-regular">Address:</span></p>
                <p><?php echo $rowCustomer['CustomerAddress']; ?></p>
            </div>
            <div>
                <p><span class="poppins-regular">Phone:</span></p>
                <p><?php echo $rowCustomer['CustomerPhone']; ?></p>
            </div>
        </div>
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
            ?>
        </table>
    </section>

    <section id="ok-button" class="section-p1">
        <div class="ok-container">
            <button class="ok" onclick="window.location.href = 'index.php';">OK</button>
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

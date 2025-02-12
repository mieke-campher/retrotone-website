<?php
session_start();

if (!isset($_SESSION['customerId'])) {
    header("Location: login.php");
    exit();
}

$customerId = $_SESSION['customerId'];

$servername = "sql206.infinityfree.com"; 
$username = "if0_38299513"; 
$password = "73023Huisies"; 
$dbname = "if0_38299513_RetroTone_DB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM Cart WHERE CustomerID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $customerId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "Cart is empty.";
    exit();
}

while ($row = $result->fetch_assoc()) {
    $productId = $row['productID'];
    $quantity = $row['Quantity'];
    $totalPrice = $row['TotalPrice'];

    $checkProductSql = "SELECT productID FROM Products WHERE productID = ?";
    $checkProductStmt = $conn->prepare($checkProductSql);
    $checkProductStmt->bind_param("s", $productId);
    $checkProductStmt->execute();
    $checkProductResult = $checkProductStmt->get_result();

    if ($checkProductResult->num_rows === 0) {
        echo "Product ID $productId does not exist in Products table.";
        exit();
    }

    $insertOrderSql = "INSERT INTO `Order` (CustomerID, productID, DatePurchase, Quantity, TotalPrice, Status) VALUES (?, ?, NOW(), ?, ?, 'N')";
    $insertStmt = $conn->prepare($insertOrderSql);
    $insertStmt->bind_param("issd", $customerId, $productId, $quantity, $totalPrice); 

    if (!$insertStmt->execute()) {
        echo "Error inserting order: " . $insertStmt->error;
        exit();
    }
}

$deleteCartSql = "DELETE FROM Cart WHERE CustomerID = ?";
$deleteStmt = $conn->prepare($deleteCartSql);
$deleteStmt->bind_param("i", $customerId);

if (!$deleteStmt->execute()) {
    echo "Error clearing cart: " . $deleteStmt->error;
    exit();
}

if (headers_sent()) {
    echo "Headers already sent.";
} else {
    header("Location: order_success.php");
    exit();
}

echo "Checkout process completed.";
?>

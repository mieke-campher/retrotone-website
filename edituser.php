<?php

session_start();

$nameErr = $emailErr = $addressErr = $contactErr = $usernameErr = $passwordErr = "";
$name = $email = $address = $contact = $uname = $upassword = "";
$cID;

$oUserName;
$oPassword;
$oName;
$oEmail;
$oPhone;
$oAddress;

$servername = "sql206.infinityfree.com"; 
$username = "if0_38299513"; 
$password = "73023Huisies"; 

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "USE if0_38299513_RetroTone_DB";
$conn->query($sql);

$sql = "SELECT Users.UserName, Users.Password, Customer.CustomerName, Customer.CustomerEmail, Customer.CustomerPhone, Customer.CustomerAddress
    FROM Users, Customer
    WHERE Users.UserID = Customer.UserID AND Users.UserID = " . $_SESSION['customerId'];
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $oUserName = $row['UserName'];
    $oPassword = $row['Password'];
    $oName = $row['CustomerName'];
    $oEmail = $row['CustomerEmail'];
    $oPhone = $row['CustomerPhone'];
    $oAddress = $row['CustomerAddress'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Please enter your name";
    } else {
        $name = test_input($_POST['name']);
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
            $name = "";
        }
    }

    if (empty($_POST["uname"])) {
        $usernameErr = "Please enter your Username";
    } else {
        $uname = test_input($_POST['uname']);
    }

    if (empty($_POST["upassword"])) {
        $passwordErr = "Please enter your Password";
    } else {
        $upassword = test_input($_POST['upassword']);
    }

    if (empty($_POST["email"])) {
        $emailErr = "Please enter your email address";
    } else {
        $email = test_input($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $email = "";
        }
    }

    if (empty($_POST["contact"])) {
        $contactErr = "Please enter your phone number";
    } else {
        $contact = test_input($_POST['contact']);
        if (!preg_match("/^[0-9 -]*$/", $contact)) {
            $contactErr = "Please enter a valid phone number";
            $contact = "";
        }
    }

    if (empty($_POST["address"])) {
        $addressErr = "Please enter your address";
    } else {
        $address = test_input($_POST['address']);
    }

    if (empty($nameErr) && empty($usernameErr) && empty($passwordErr) && empty($emailErr) && empty($contactErr) && empty($addressErr)) {
        $conn = new mysqli($servername, $username, $password);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "USE if0_36624325_db_retrotone";
        $conn->query($sql);

        $sql = "UPDATE Users SET UserName = '$uname', Password = '$upassword' WHERE UserID = " . $_SESSION['customerId'];
        if ($conn->query($sql) === TRUE) {
            $sql = "UPDATE Customer SET CustomerName = '$name', CustomerPhone = '$contact', CustomerEmail = '$email', CustomerAddress = '$address' WHERE UserID = " . $_SESSION['customerId'];
            if ($conn->query($sql) === TRUE) {
                header("Location: index.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
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
    <title>Edit Profile</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<section id="header">
    <a href="index.html"><img src="assets/rt_logo.png" class="logo" width="100px"></a>
</section>

<section id="login-page" class="section-p1">
    <div class="login-container">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <h1>Edit Profile</h1>
            Full Name:<br><input type="text" name="name" placeholder="<?php echo $oName; ?>">
            <span class="error" style="color: red; font-size: 0.8em;"><?php echo $nameErr;?></span><br><br>

            Username:<br><input type="text" name="uname" placeholder="<?php echo $oUserName; ?>">
            <span class="error" style="color: red; font-size: 0.8em;"><?php echo $usernameErr;?></span><br><br>

            New Password:<br><input type="password" name="upassword" placeholder="<?php echo $oPassword; ?>">
            <span class="error" style="color: red; font-size: 0.8em;"><?php echo $passwordErr;?></span><br><br>

            E-mail:<br><input type="text" name="email" placeholder="<?php echo $oEmail; ?>">
            <span class="error" style="color: red; font-size: 0.8em;"><?php echo $emailErr;?></span><br><br>

            Mobile Number:<br><input type="text" name="contact" placeholder="<?php echo $oPhone; ?>">
            <span class="error" style="color: red; font-size: 0.8em;"><?php echo $contactErr;?></span><br><br>

            <label>Address:</label><br>
            <textarea name="address" class="address-input" cols="50" rows="5" placeholder="<?php echo $oAddress; ?>"></textarea>
            <span class="error" style="color: red; font-size: 0.8em;"><?php echo $addressErr;?></span><br><br>

            <input class="buttons" type="submit" name="submitButton" value="Edit">
            <input class="buttons" type="button" name="cancel" value="Cancel" onClick="window.location='index.php';" />
        </form>
    </div>
</section>

</body>
</html>

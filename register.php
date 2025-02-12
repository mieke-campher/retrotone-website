<?php
session_start();

$nameErr = $emailErr = $addressErr = $contactErr = $usernameErr = $passwordErr = "";
$name = $email = $address = $contact = $uname = $upassword = "";

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
		$servername = "sql206.infinityfree.com"; 
		$username = "if0_38299513"; 
		$password = "73023Huisies"; 
		$dbname = "if0_38299513_RetroTone_DB";

		$conn = new mysqli($servername, $username, $password, $dbname);

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$sql = "INSERT INTO Users (UserName, Password) VALUES ('$uname', '$upassword')";
		if ($conn->query($sql) === TRUE) {
			$userID = $conn->insert_id;

			$sql = "INSERT INTO Customer (CustomerName, CustomerPhone, CustomerEmail, CustomerAddress, UserID) 
					VALUES ('$name', '$contact', '$email', '$address', $userID)";
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

function test_input($data) {
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
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<section id="header">
    <a href="index.html"><img src="assets/rt_logo.png" class="logo" width="100px"></a>
</section>

<section id="login-page" class="section-p1">
    <div class="login-container">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <h1>Register</h1>
            Full Name:<br><input type="text" name="name" placeholder="John Doe">
            <span class="error" style="color: red; font-size: 0.8em;"><?php echo $nameErr;?></span><br><br>

            Username:<br><input type="text" name="uname" placeholder="Username">
            <span class="error" style="color: red; font-size: 0.8em;"><?php echo $usernameErr;?></span><br><br>

            New Password:<br><input type="password" name="upassword" placeholder="Password">
            <span class="error" style="color: red; font-size: 0.8em;"><?php echo $passwordErr;?></span><br><br>

            E-mail:<br><input type="text" name="email" placeholder="example@email.com">
            <span class="error" style="color: red; font-size: 0.8em;"><?php echo $emailErr;?></span><br><br>

            Mobile Number:<br><input type="text" name="contact" placeholder="+27 83 123 4567">
            <span class="error" style="color: red; font-size: 0.8em;"><?php echo $contactErr;?></span><br><br>

            <label>Address:</label><br>
            <textarea name="address" class="address-input" cols="50" rows="5" placeholder="Address"></textarea>
            <span class="error" style="color: red; font-size: 0.8em;"><?php echo $addressErr;?></span><br><br>

            <input class="buttons" type="submit" name="submitButton" value="Submit">
            <input class="buttons" type="button" name="cancel" value="Cancel" onClick="window.location='index.php';" />
        </form>
    </div>
</section>

</body>
</html>

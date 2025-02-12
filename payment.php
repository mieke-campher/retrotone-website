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
    <title>Payment</title>
    <link rel="stylesheet" href="style.css">

    <script>
        function validateForm() {
            var cname = document.getElementById("cname").value;
            var ccnum = document.getElementById("ccnum").value;
            var expmonth = document.getElementById("expmonth").value;
            var expyear = document.getElementById("expyear").value;
            var cvv = document.getElementById("cvv").value;

            if (cname === "" || ccnum === "" || expmonth === "" || expyear === "" || cvv === "") {
                document.getElementById("checkoutButton").disabled = true;
            } else {
                document.getElementById("checkoutButton").disabled = false;
            }
        }
    </script>
    
</head>
<body>

    <section id="header">
        <a href="index.php"><img src="assets/rt_logo.png" class="logo" width="100px"></a>
    </section>


    <section id="login-page" class="section-p1">
        <div class="login-container">
            <h1>Card Details</h1>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John Doe" oninput="validateForm()">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="0000-0000-0000-0000" oninput="validateForm()">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September" oninput="validateForm()">
            <label for="expyear">Exp Year</label>
            <input type="text" id="expyear" name="expyear" placeholder="2018" oninput="validateForm()">
            <label for="cvv">CVV</label>
            <input type="text" id="cvv" name="cvv" placeholder="123" oninput="validateForm()">
            <div class="checkout-container">
                <form id="checkoutForm" method="post" action="checkout.php">
                    <button id="checkoutButton" class="payment-button" type="submit" name="checkout" disabled><span>Checkout</span></button>
                </form>
            </div>
        </div>
    </section>

    <?php
    if(isset($_GET['errcode'])){
        if($_GET['errcode']==1){
            echo '<span style="color: red;">Invalid username or password.</span>';
        }elseif($_GET['errcode']==2){
            echo '<span style="color: red;">Please login.</span>';
        }
    }
    ?>

</body>
</html>

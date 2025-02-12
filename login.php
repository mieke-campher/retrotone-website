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
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <section id="header">
        <a href="index.php"><img src="assets/rt_logo.png" class="logo" width="100px"></a>
    </section>


    <section id="login-page" class="section-p1">
        <div class="login-container">
            <h1>Login</h1>
            <form action="checklogin.php" method="post">
                Username:<br><input type="text" name="username"/>
                <br><br>
                Password:<br><input type="password" name="pwd" />
                <br><br>
                <input class="buttons" type="submit" value="Login"/>
                <input class="buttons" type="button" name="cancel" value="Cancel" onClick="window.location='index.php';" />
            </form>
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
<?php
session_start();

if(isset($_POST['username']) && isset($_POST['pwd'])) {
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];

    include "DBconnect.php";

    $sql = "SELECT * FROM Users WHERE UserName=:username AND Password = :pwd;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':username' => $username,
        ':pwd' => $pwd
    ));

    if($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $_SESSION['customerId'] = $row['UserID']; 
        }

        if (isset($_SESSION['redirect_url'])) {
            $redirect_url = $_SESSION['redirect_url'];
            unset($_SESSION['redirect_url']);
            header("Location: $redirect_url");
        } else {
            header("Location: account.php");
        }
        exit();

    } else {
        echo '<span style="color: red;">Login Fail</span>';
        header("Location:login.php?errcode=1");
    }

}

?>
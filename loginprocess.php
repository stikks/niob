<?php
session_start();
require('dbconnect.php');

$tbl_name = "users";

if (isset($_POST['password']) && isset($_POST['username'])) {

    $username = stripslashes($_POST['username']);
    $password = stripslashes($_POST['password']);
    $hashedPassword = md5($password);

    $loginQuery = "SELECT * FROM $tbl_name WHERE username = '$username' AND password = '$hashedPassword'";
    $result = mysqli_query($connection, $loginQuery);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $row = mysqli_fetch_assoc($result);

        if (!$row) {
            echo "<script>alert('Invalid user account'); location.href='index.php';</script>";
            die();
        }

        $user = (object)$row;
        $_SESSION["user"] = $user->username;

        if ($user->is_admin) {
            echo "<script>alert('Welcome admin'); location.href='admin/index.php';</script>";
            die();
        }

        $infoQ = mysqli_query($connection, "SELECT * FROM `niob_info` WHERE phone = $user->username");

        if ($infoQ) {
            $account = mysqli_fetch_assoc($infoQ);
            if (!$account) {
                echo "<script>alert('Update Your Account Information'); location.href='user/profile.php';</script>";
                die();
            }
            $_SESSION['account'] = $account;
            echo "<script>alert('Welcome'); location.href='paymentPage.php';</script>";
            exit();
        }

        echo "<script>alert('Update Your Account Information'); location.href='user/profile.php';</script>";
        die();
    } else {
        echo "<script>alert(
          'Invalid username/password combination'
        ); location.href='index.php';</script>";
        die();
    }
}


?>
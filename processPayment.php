<?php
require 'dbconnect.php';
session_start();

if (isset($_POST['paymentStatus']) && isset($_POST['paymentType'])) {
    $result = array();

    $formData = $_POST;
    $status = stripslashes($formData['paymentStatus']);
    $paymentType = stripslashes($formData['paymentType']);

    $ptQuery = "SELECT * FROM `payment_types` WHERE code = '$paymentType'";
    $ptResult = mysqli_query($connection, $ptQuery);
    $count = mysqli_num_rows($ptResult);

    if ($count == 0) {
        echo "<script>alert('Error!, Invalid Payment Type!.'); location.href='paymentPage.php';</script>";
        die();
    }

    $pt = mysqli_fetch_assoc($ptResult);

    if (isset($formData['amount'])) {
        $amount = (float)$formData['amount'] * 100;
    }
    else {
        echo "<script>alert('Error!, Invalid Amount!.'); location.href='paymentPage.php';</script>";
        die();
    }

    $reference = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8). time();
    $description = "Payment for '$paymentType', Amount - $amount";
    if (isset($_POST['grade'])) {
        $grade = $_POST['grade'];
        $description = "Payment for $paymentType: $grade";;
    }

    if ($status == 'no') {
        // create user account
        $full_name = stripslashes($formData['full_name']);
        $phone = stripslashes($formData['phone']);
        $username = stripslashes($formData['username']);

        $userQuery = "SELECT * FROM `users` WHERE username = '$username'";
        $result = mysqli_query($connection, $userQuery);

        if (mysqli_num_rows($result) == 0) {
            $hashed_password = md5($phone);
            $userQuery = "INSERT INTO `users` (username, password,created_at, updated_at) VALUES ('$username', '$hashed_password', CURRENT_DATE, CURRENT_DATE )";
            $user = mysqli_query($connection, $userQuery);

            if (!$user) {
                echo "<script>alert('Error!, Account not created.'); location.href='index.php';</script>";
                die();
            }
        }
    }

    else {
        $reg_no ='F'. stripslashes($formData['reg_no']);
        $regQuery = "SELECT * FROM `niob_info` WHERE reg_no = '$reg_no'";
        $result = mysqli_query($connection, $regQuery);
        $row = mysqli_fetch_assoc($result);

        if (!$row) {
            echo "<script>alert('Invalid user account'); location.href='paymentPage.php';</script>";
            die();
        }
        $info = (object)$row;
        $username = $info->username;
    }

    // load accounts
    $act_id = $pt['account_id'];
    $actQuery = mysqli_query($connection, "SELECT * FROM `accounts` WHERE id=$act_id");

    $acct = mysqli_fetch_assoc($actQuery);

    if (!$acct) {
        echo "<script>alert('Invalid account number'); location.href='paymentPage.php';</script>";
        die();
    }

    $chargedAmount = (float)$amount;

    switch ($amount) {
        case $amount <= 100000: {
            $chargedAmount += 100 * 100;
            $transAmount = 0.015 * (float)$chargedAmount;
            break;
        }
        case $amount > 100000 && $amount <= 250000: {
            $chargedAmount += 200 * 100;
            $transAmount = 0.015 * (float)$chargedAmount;
            break;
        }
        case $amount > 250000 && $amount <= 500000: {
            $chargedAmount += 300 * 100;
            $transAmount = 0.015 * (float)$chargedAmount + 100 * 100 ;
            break;
        }
        case $amount > 500000 && $amount <= 1000000: {
            $chargedAmount += 500 * 100;
            $transAmount = 0.015 * (float)$chargedAmount + 100 * 100;
            break;
        }
        case $amount > 1000000 && $amount <= 25000000: {
            $chargedAmount += 750 * 100;
            $transAmount = 0.015 * (float)$chargedAmount + 100 * 100;
            break;
        }
        case $amount > 25000000: {
            $chargedAmount += 1000 * 100;
            $transAmount = 0.015 * (float)$chargedAmount + 100 * 100;
            break;
        }
        default:
            $chargedAmount += 100 * 100;
            $transAmount = 0.015 * (float)$chargedAmount;
    }

    $charge = $chargedAmount - $amount;
    $recAmount = $amount / 100;

    $paymentQuery = "INSERT INTO `payment_reference` (username, amount, reference, description, created_at, updated_at) VALUES ('$username', '$recAmount', '$reference', '$description', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
    $pq = mysqli_query($connection, $paymentQuery);

    $baseUrl = 'http://'. $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

    if ($pq) {
        $postData =  array(
            'email' => $username,
            'amount' => $chargedAmount,
            "reference" => $reference,
//            "subaccount" => "ACCT_lmkanc5kwxwymf4",
            'subaccount' => $acct['account_code'],
            'transaction_charge' => $charge,
            'callback_url'=> "$baseUrl/callback.php"
        );
        $url = "https://api.paystack.co/transaction/initialize";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($postData));  //Post Fields
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $headers = [
//            'Authorization: Bearer sk_test_a8b0897d183d6393821b6cad177f7a9cf0d28cf3',
            'Authorization: Bearer sk_live_70c2fc236119d93f51699820f897be98f68daae3',
            'Content-Type: application/json',

        ];

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $request = curl_exec($ch);

        curl_close($ch);

        if ($request) {
            $result = json_decode($request, true);
            $res = (object)$result;
            if ($res->status == false) {
                $msg = $res->message;
                echo "<script>alert('$msg'); location.href='paymentPage.php';</script>";
                die();
            }
            header("Location: ".$result['data']['authorization_url']);
            exit();
        }
    }
    echo "<script>alert('Reference not created!'); location.href='paymentPage.php';</script>";
    die();

}
echo "<script>alert('One or more fields isnt correct or not field'); location.href='paymentPage.php';</script>";
die();

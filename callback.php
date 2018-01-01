<?php
/**
 * Created by PhpStorm.
 * User: stikks
 * Date: 11/28/17
 * Time: 3:10 PM
 */
require 'dbconnect.php';
session_start();

$ch = curl_init();

$reference = isset($_GET['reference']) ? $_GET['reference'] : '';

if(!$reference){
    $_SESSION['message'] = array('type'=>'error', 'data'=>'Invalid transaction reference!');
    header("Location: paymentPage.php");
    exit();
}

curl_setopt_array($ch, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($reference),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        "accept: application/json",
        "authorization: Bearer sk_live_70c2fc236119d93f51699820f897be98f68daae3",
//        "authorization: Bearer sk_test_a8b0897d183d6393821b6cad177f7a9cf0d28cf3",
        "cache-control: no-cache"
    ]
));

$response = curl_exec($ch);
$err = curl_error($ch);

if ($err) {
    $_SESSION['message'] = array('type'=>'error', 'data'=>'Invalid transaction!');
    header("Location: paymentPage.php");
    exit();
}

$transaction = json_decode($response);

if(!$transaction->status){
    $_SESSION['message'] = array('type'=>'error', 'data'=>'API returned error: ' . $transaction->message);
    header("Location: paymentPage.php");
    exit();
}

if('success' == $transaction->data->status){
    $pfQuery = mysqli_query($connection, "SELECT * FROM `payment_reference` WHERE reference='$reference'");
    $pf = mysqli_fetch_assoc($pfQuery);

    if (!$pf) {
        $_SESSION['message'] = array('type'=>'error', 'data'=>'Invalid transaction!');
        header("Location: paymentPage.php");
        exit();
    }

    $updatePF = mysqli_query($connection, "UPDATE `payment_reference` SET status = TRUE WHERE reference = '$reference'");

    if (!$updatePF) {
        $_SESSION['message'] = array('type'=>'error', 'data'=>'Invalid transaction!');
        header("Location: paymentPage.php");
        exit();
    }

    $_SESSION['message'] = array('type'=>'success', 'data'=>'Transaction successful');
    header("Location: paymentPage.php");
    exit();
}
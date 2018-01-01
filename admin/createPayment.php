<?php
/**
 * Created by PhpStorm.
 * User: stikks
 * Date: 11/25/17
 * Time: 8:07 PM
 */
session_start();
require '../dbconnect.php';

if (!isset($_POST['username'])) {
    $_SESSION['message'] = array('type'=>'error', 'data'=>"Member's Phone Number missing");
    header("Location: payments.php");
    die();
}

$username = $_POST['username'];

if(!isset($_POST['reference'])) {
    $_SESSION['message'] = array('type'=>'error', 'data'=>'Payment Reference missing');
    header("Location: payments.php");
    die();
}

$reference = $_POST['reference'];

if(!isset($_POST['payment_type'])) {
    $_SESSION['message'] = array('type'=>'error', 'data'=>'Payment Type missing');
    header("Location: payments.php");
    die();
}

$payment_type = $_POST['payment_type'];

if(!isset($_POST['cadre'])) {
    $_SESSION['message'] = array('type'=>'error', 'data'=>'Membership Cadre missing');
    header("Location: payments.php");
    die();
}

$cadre = $_POST['cadre'];

if(!isset($_POST['amount'])) {
    $_SESSION['message'] = array('type'=>'error', 'data'=>'Amount missing');
    header("Location: payments.php");
    die();
}

$amount = $_POST['amount'];

if(!isset($_POST['description'])) {
    $_SESSION['message'] = array('type'=>'error', 'data'=>'Description missing');
    header("Location: payments.php");
    die();
}

$description = $_POST['description'];

$query = "INSERT INTO `payment_reference` (username, reference, amount, description, status, created_at, updated_at) VALUES ('$username', '$reference', $amount, '$description', TRUE, CURRENT_DATE, CURRENT_DATE )";
$exc = mysqli_query($connection, $query);

if (!$exc) {
    $_SESSION['message'] = array('type'=>'error', 'data'=>'DB Error!, Unable to update record');
    header("Location: payments.php  ");
    die();
}

$_SESSION['message'] = array('type'=>'success', 'data'=>'Payment added');
header("Location: payments.php");
die();

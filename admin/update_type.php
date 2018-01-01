<?php
/**
 * Created by PhpStorm.
 * User: stikks
 * Date: 11/25/17
 * Time: 8:07 PM
 */
session_start();
require '../dbconnect.php';


if (!isset($_POST['id'])) {
    $_SESSION['message'] = array('type'=>'error', 'data'=>'ID missing');
    header("Location: paymentTypes.php");
    die();
}

$id = $_POST['id'];

if(!isset($_POST['name'])) {
    $_SESSION['message'] = array('type'=>'error', 'data'=>'Name missing');
    header("Location: type_info.php?id=$id");
    die();
}

$name = $_POST['name'];

if(!isset($_POST['account_id'])) {
    $_SESSION['message'] = array('type'=>'error', 'data'=>'Account missing');
    header("Location: type_info.php?id=$id");
    die();
}

$account_id = $_POST['account_id'];

$query = "UPDATE `payment_types` SET name = '$name', account_id = $account_id WHERE  id = '$id'";
$exc = mysqli_query($connection, $query);

if (!$exc) {
    $_SESSION['message'] = array('type'=>'error', 'data'=>'DB Error!, Unable to update record');
    header("Location: type_info.php?id=$id");
    die();
}

$_SESSION['message'] = array('type'=>'success', 'data'=>'Record updated');
header("Location: type_info.php?id=$id");
die();

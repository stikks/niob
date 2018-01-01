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
    header("Location: grade_info.php?id=$id");
    die();
}

$name = $_POST['name'];

if(!isset($_POST['price'])) {
    $_SESSION['message'] = array('type'=>'error', 'data'=>'Price missing');
    header("Location: grade_info.php?id=$id");
    die();
}

$price = $_POST['price'];

if(!isset($_POST['class'])) {
    $_SESSION['message'] = array('type'=>'error', 'data'=>'Membership Status missing');
    header("Location: grade_info.php?id=$id");
    die();
}

$class = $_POST['class'];

$query = "UPDATE `cadres` SET name = '$name', price = '$price', class = '$class' WHERE  id = '$id'";
$exc = mysqli_query($connection, $query);

if (!$exc) {
    $_SESSION['message'] = array('type'=>'error', 'data'=>'DB Error!, Unable to update record');
    header("Location: grade_info.php?id=$id");
    die();
}

$_SESSION['message'] = array('type'=>'success', 'data'=>'Record updated');
header("Location: grade_info.php?id=$id");
die();

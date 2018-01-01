<?php 
session_start();

session_destroy();

// header("Location: index.php");

echo "<script>alert('You are now logged out'); location.href='index.php';</script>";


?>

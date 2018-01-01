<?php
$connection = mysqli_connect('localhost', 'lagosnio_admin', 'UpR}8cl-u$wb');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'lagosnio_niob');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}

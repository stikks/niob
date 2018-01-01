<?php
/**
 * Created by PhpStorm.
 * User: stikks
 * Date: 11/19/17
 * Time: 7:55 PM
 */
require('dbconnect.php');

$code = $_POST['code'];
$query = "SELECT * FROM `cadres` WHERE class='$code'";
$results_array = array();
$result = mysqli_query($connection, $query);
while ($row = $result->fetch_assoc()) {
    $results_array[] = $row;
}
echo json_encode($results_array);
exit();

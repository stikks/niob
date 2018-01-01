<?php
    session_start();

    if ($_SESSION['memberphone']) {

        require ('dbconnect.php');

        // echo $_SESSION['memberphone'];
        
        $phone = $_SESSION['memberphone'];

        $tbl_name = 'niob_info';

        $loginquery = "SELECT member_id FROM $tbl_name WHERE member_phone_no = '$phone'";
        $result = mysqli_query($connection, $loginquery);

        echo $result;


    }

?>
<?php
date_default_timezone_set('Africa/Lagos');
session_start();
require('../dbconnect.php');

if ($_FILES['passport']['size'] >= 5000000) {
    echo "<script>alert('File size too large'); location.href='index.php';</script>";
    die();
}

if (isset($_POST['surname']) && isset($_POST['other_names']) && isset($_POST['member_title']) && isset($_POST['gender'])
    && isset($_POST['dob']) && isset($_POST['religion']) && isset($_POST['school']) && isset($_POST['email']) && isset($_POST['niob_admission_date']) && isset($_POST['membership_cadre'])
    && isset($_POST['corbon_number']) && isset($_POST['highest_acad_qual']) && isset($_POST['year_education']) && isset($_POST['current_employer']) && isset($_POST['position_held'])
) {
    $status = $_POST['status'];
    $surname = $_POST['surname'];
    $otherNames = $_POST['other_names'];
    $title = $_POST['member_title'];
    $gender = $_POST['gender'];
    $religion = $_POST['religion'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $membership_cadre = $_POST['membership_cadre'];
    $phone = $_POST['phone'];
    
    $dob = '';
    if (($_POST['dob'])) {
        $dob = $_POST['dob'];
    }

    $niob_addmission_date = '';
    if ($_POST['niob_admission_date']) {
        $niob_addmission_date = stripslashes($_POST['niob_admission_date']);
    }

    $corbon_number = '';
    if ($_POST['corbon_number']) {
        $corbon_number = 'F' . stripslashes($_POST['corbon_number']);
    }

    $school = stripslashes($_POST['school']);
    $member_registration_number = $_POST['member_registration_number'];
    $highest_acad_qual = $_POST['highest_acad_qual'];
    $education_year = $_POST['year_education'];
    $current_employer = $_POST['current_employer'];
    $position_held = $_POST['position_held'];
    $additional_info = $_POST['additional_info'];
    $filePath = '';

    //upload to db its url path
    // drop to a directory in root of folder

    if ($_FILES['passport']['size'] > 0) {
        $filePath = __DIR__ . "/uploads/" . '' . $email . '-' . $_FILES["passport"]["name"];
        $move_result = move_uploaded_file($_FILES["passport"]["tmp_name"], $filePath);

        if (!$move_result) {
            echo "<script>alert('File not saved.'); location.href='members.php';</script>";
            die();
        }
    }

    // check if account exists
    $accQuery = mysqli_query($connection, "SELECT * FROM `niob_info` WHERE phone='$phone'");

    if (!$accQuery) {
        echo "<script>alert('Error: Database Error'); location.href='members.php';</script>";
        die();
    }

    $info = mysqli_fetch_assoc($accQuery);

    if ($info) {
        $filePath = $info['passport'];
        $updateInfo = mysqli_query($connection,
            "UPDATE `niob_info` SET status ='$status', surname = '$surname', other_names = '$otherNames', title = '$title', gender = '$gender', religion = '$religion', email = '$email', address = '$address', membership_cadre = '$membership_cadre',  member_registration_number = '$member_registration_number', niob_admission_date = '$niob_addmission_date', corbon_number = '$corbon_number', highest_acad_qual = '$highest_acad_qual', year_education = '$education_year', current_employer = '$current_employer', position_held = '$position_held', school = '$school', additional_info = '$additional_info', passport = '$filePath' WHERE phone = '$phone'");

        if (!$updateInfo) {
            echo "<script>alert(\"DB Failure\"); location.href='members.php';</script>";
            die();
        }
        $accQuery = mysqli_query($connection, "SELECT * FROM `niob_info` WHERE phone='$phone'");
        $info = mysqli_fetch_assoc($accQuery);
        $_SESSION['account'] = $info;
        echo "<script>alert('Account Information Updated Successfully!'); location.href='members.php';</script>";
        die();
    }

    $query = "INSERT INTO `niob_info` (surname, other_names, title, gender, dob, religion,
          phone, email, address, niob_admission_date, membership_cadre, member_registration_number,
          corbon_number, highest_acad_qual, year_education, current_employer,
          position_held, school, additional_info, passport, status, created_at, updated_at
          )
          VALUES ('$surname', '$otherNames', '$title', '$gender', '$dob', '$religion', '$phone', '$email', '$address',
          '$niob_addmission_date', '$membership_cadre', '$member_registration_number', '$corbon_number',
          '$highest_acad_qual', '$education_year', '$current_employer', '$position_held', '$school', '$additional_info' , '$filePath', '$status', CURRENT_DATE, CURRENT_DATE
           )";
    $result = mysqli_query($connection, $query);

    if ($result) {
        $accQuery = mysqli_query($connection, "SELECT * FROM `niob_info` WHERE phone='$phone'");
        $info = mysqli_fetch_assoc($accQuery);
        echo "<script>alert('Account Information Updated Successfully!'); location.href='members.php';</script>";
        die();
    } else {
        echo "<script>alert(\"DB Failure\"); location.href='members.php';</script>";
        die();

    }
}
echo "<script>alert('One or more fields isnt correct or not field'); location.href='members.php';</script>";
die();
?>
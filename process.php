<?php
date_default_timezone_set('Africa/Lagos');
session_start();
require('dbconnect.php');

if ($_FILES['passport']['size'] >= 5000000) {
    echo "<script>alert('File size too large'); location.href='index.php';</script>";
    die();
}

//if (isset($_POST['surname']) && isset($_POST['other_names']) && isset($_POST['member_title']) && isset($_POST['gender'])
//    && isset($_POST['dob']) && isset($_POST['religion']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['address'])
//    && isset($_POST['niob_admission_date']) && isset($_POST['niob_membership_grade']) && isset($_POST['reg_no']) && isset($_POST['membership_no'])
//    && isset($_POST['corbon_admin_no']) && isset($_POST['highest_acad_qual']) && isset($_POST['year_education']) && isset($_POST['current_employer'])
//    && isset($_POST['position_held']) && isset($_POST['password'])
//) {
if (isset($_POST['phone']) && isset($_POST['password'])
) {
//    $surname = $_POST['surname'];
//    $othernames = $_POST['other_names'];
//    $member_title = $_POST['member_title'];
//    $gender = $_POST['gender'];
//    $dob = date('m/d/y', strtotime($_POST['dob']));
//    $religion = $_POST['religion'];
//    $email = $_POST['email'];
//    $address = $_POST['address'];
//    $niob_addmission_date = date('m/d/y', strtotime($_POST['niob_admission_date']));
//    $niob_membership_grade = $_POST['niob_membership_grade'];
//    $reg_no = 'R00'. stripslashes($_POST['reg_no']);
//    $membership_no = $_POST['membership_no'];
//    $corbon_admin_no = $_POST['corbon_admin_no'];
//    $corbon_admin_date = date('m/d/y', strtotime($_POST['corbon_admin_date']));
//    $highest_acad_qual = $_POST['highest_acad_qual'];
//    $education_year = $_POST['year_education'];
//    $current_employer = $_POST['current_employer'];
//    $position_held = $_POST['position_held'];
//    $additional_info = $_POST['additional_info'];
//    $save_member = $_POST['save_member'];

    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $query = mysqli_query($connection, "SELECT * FROM `users` WHERE username='$phone'");

    if (!$query) {
        echo "<script>alert('Error: Database Error'); location.href='index.php';</script>";
        die();
    }

    if (mysqli_num_rows($query) > 0) {
        echo "<script>alert('Account with this Phone Number already exists!'); location.href='index.php';</script>";
        die();
    }

    // to get the file upload
    //check if it is uploaded
    // check for size
    //check for extensions
    //upload to db its url path
    // drop to a directory in root of folder
//    $filePath = __DIR__ . "/uploads/". ''. $email. '-'. $_FILES["passport"]["name"];
//    $move_result = move_uploaded_file($_FILES["passport"]["tmp_name"], $filePath);
//
//    if (!$move_result) {
//        echo "<script>alert('File not saved.'); location.href='index.php';</script>";
//        die();
//    }

    $hashed_password = md5($password);
    $userQuery = "INSERT INTO `users` (username, password, created_at, updated_at) VALUES ('$phone', '$hashed_password', CURRENT_DATE, CURRENT_DATE )";

    $user = mysqli_query($connection, $userQuery);

    if ($user) {
        $_SESSION['user'] = $phone;
        echo "<script>alert('User Registered Successfully!'); location.href='user/profile.php';</script>";
        die();
//        $query = "INSERT INTO `niob_info` (surname, othernames, title, gender, dob, religion,
//          phone, email, address, niob_admission_date, niob_grade_title, member_registration_number,
//          membership_number, corbon_admission_number, corbon_date_of_admission, academic_qualification, member_year_of_education, member_current_employer,
//          member_position_held, member_additional_infomation, profile_image, created_at, updated_at
//          )
//          VALUES ('$surname', '$othernames', '$member_title', '$gender', '$dob', '$religion', '$phone', '$email', '$address',
//          '$niob_addmission_date', '$niob_membership_grade', '$reg_no', '$membership_no', '$corbon_admin_no', '$corbon_admin_date',
//          '$highest_acad_qual', '$education_year', '$current_employer', '$position_held', '$additional_info' , '$filePath', CURRENT_DATE, CURRENT_DATE
//           )";
//        $result = mysqli_query($connection, $query);
//        if ($result) {
//            echo "<script>alert('User Registered Successfully!'); location.href='index.php';</script>";
//            die();
//        } else {
//            echo "<script>alert(\"User Registration Failed\"); location.href='index.php';</script>";
//            die();
//        }
    }
    echo "<script>alert('Registering user account failed, Database Error!'); location.href='index.php';</script>";
    die();

}
echo "<script>alert('One or more fields isnt correct or not field'); location.href='index.php';</script>";
die();
?>
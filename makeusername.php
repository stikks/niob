
<?php

    // session start
    session_start();
    
    // making database connection
    require ('dbconnect.php');

    $tbl_name = 'niob_info';
    
    // assigning session of member registration number to a variable
    $memRegNo = $_SESSION['member_registration_number'];

    // checking if  the session for member registration number is set
    if ( isset($_SESSION['member_registration_number']) ) {

        $getMemberId = "SELECT member_id from $tbl_name WHERE member_registration_number = '$memRegNo'  ";
        
        $result = mysqli_query($connection, $getMemberId);

        // $count = mysqli_num_rows($result);
        // var_dump($count);
        // exit();

        $good = mysqli_fetch_assoc($result);
        // var_dump($good);
        // exit();

        $row = $good;
        $memid = $row['member_id'];
    }
    
    // if the session of member registration number is not set go back to index page and re register
    else{
        echo "<script>alert('Not allowed on this portal'); location.href='index.php';</script>";        
    }

?>
                <form method='post' action='makeusername.php' required>
                <input type ='text' name='username' placeholder='Username here!' required>
                <input type ='password' name='password' required>
                <input type='hidden' name='foo' value='<?php echo $memid;?>'>
                <input type='submit' name='register'>
                <?php 
                    $username = $_POST['username'];
                    $password = md5($_POST['password']);
                    $id = $_POST['foo'];
                    $submit = $_POST['register'];

                    if ($username && $password && $id && $submit) {
                        $query = "INSERT INTO `users` (member_id, username, password) VALUES ('$id', '$username', '$password' )";
                        $result = mysqli_query($connection, $query);
                        if($result){
                            echo "<script>alert('Username Registered Successfully! You need to login now'); location.href='index.php';</script>";
                        }else{
                            echo "<script>alert('Username Registered Failed Retry'); location.href='makeusername.php';</script>";                            
                        }
                    }
                
                ?>
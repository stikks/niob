    <?php
    session_start();
    require('dbconnect.php');

    if (!$_SESSION['user']) {
        echo "<script>alert('You need to be logged in before you can access the payment portal!'); location.href='index.php';</script>";
    }

    $username = $_SESSION['user'];
    $userQuery = "SELECT * FROM `users` WHERE username = '$username'";
    $result = mysqli_query($connection, $userQuery);
    
    $row = mysqli_fetch_assoc($result);
    $user = (object)$row;
    
    if ($user->is_admin) {
        echo "<script>alert('Welcome Administrator!'); location.href='admin.php';</script>";
        die();
    }else{
        echo "Welcome Normal User: ";
        echo $_SESSION["myusername"]. '<br>';
        echo "Payments would be available soon<br>";
        echo "<a href='logout.php'>loguot.php</a>";

    }
    
    if (!$_SESSION["myusername"]) {
        echo "<script>alert('You need to be logged in before you can access the payment portal!'); location.href='index.php';</script>";
    }else{

       
        
    }

    ?>
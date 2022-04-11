<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
    include "../partials/dbconnect.php";

    $user_email = $_POST['loginemail'];
    $user_password = $_POST['loginpassword'];

    $sql = "SELECT * FROM `users` WHERE `user_email`='$user_email'";
    $result = mysqli_query($con, $sql);
    $num_rows = mysqli_num_rows($result);

    if ($num_rows==1) {
        $row = mysqli_fetch_assoc($result);
        
        if (password_verify($user_password, $row['user_password'])) {
            session_start();
            $_SESSION['loggedin']= true;
            $_SESSION['sno']= $row['sno'];
            $_SESSION['useremail']= $user_email;
            header("location: /forum/index.php?loginsuccess=true"); 
        }
        else {
            header("location: /forum/index.php?loginsuccess_alert=true");
        }
        
    }
    else {
        header("location: /forum/index.php?loginsuccess_alert=true");
    }
    

}

?>

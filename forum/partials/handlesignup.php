<?php

$showerror = false;
$showalert = false;
$success = false;


if ($_SERVER['REQUEST_METHOD']=='POST') {
    include "../partials/dbconnect.php";

    $user_email = $_POST['signupemail'];
    $password = $_POST['signuppassword'];
    $cpassword = $_POST['signupcpassword'];
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $existsql = "SELECT * FROM `users` WHERE `user_email`= '$user_email'";
    $result = mysqli_query($con, $existsql);
    $num_rows = mysqli_num_rows($result);

    if ($num_rows>0) {
        $showerror = true;
        header("location: /forum/index.php?signupsuccess_showerror=true");
        exit();
    }

    else {
        if ($password == $cpassword) {
            $sql = "INSERT INTO `users`(`user_email`, `user_password`, `time`) VALUES ('$user_email','$hash', current_timestamp())";
            $result = mysqli_query($con, $sql);
            $success = true;
            header("location: /forum/index.php?signupsuccess=true");
            exit();
        }
        else {
            $showalert = true;
            header("location: /forum/index.php?signupsuccess_alert=true");
        }
    }

}

?>

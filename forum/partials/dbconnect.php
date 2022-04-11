<?php

// connect database
$servername = "localhost:3307";
$username = "root";
$password = "";
$database = "idiscuss";

$con = mysqli_connect($servername, $username, $password, $database);

if (!$con) {
    die ("ERROR : database does not connected".mysqli_connect_error());
}
else{
    // echo "database connected successfully";
}

?>
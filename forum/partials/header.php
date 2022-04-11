<?php




echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
  <a class="navbar-brand" href="/forum">iDiscuss</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/forum">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
         Popular Categories
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';

        $sql = "SELECT * FROM `categories` LIMIT 5";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
          echo' <li><a class="dropdown-item text-success" href="/forum/threadlist.php?category_id='.$row['category_id'].'">'.$row['category_name'].'</a></li>';
        }
         
       echo' </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact</a>
      </li>
    </ul>
    <form class="d-flex" action="search.php" method="get">
      <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>';


    session_start();
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {
      echo '<p class="text-light my-0 m-lg-2">  welcome '.$_SESSION['useremail'].'</p>
      <a href="/forum/partials/logout.php" class="btn btn-primary">Logout</a>';
    }
    else {
      echo'
      <button class="btn btn-success m-lg-2" data-bs-toggle="modal" data-bs-target="#loginmodal">Login</button>
      <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#signupmodal">Signup</button>';
    }

    echo'
    </div>
  </div>
  </nav>';
    

include "./partials/loginmodal.php";
include "./partials/signupmodal.php";

if (isset($_GET['signupsuccess']) && $_GET['signupsuccess']==true) {

        echo '<div class="my-0 alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congratulations!</strong> You are successfully signed up.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
}

if (isset($_GET['signupsuccess_showerror']) && $_GET['signupsuccess_showerror']==true) {

        echo '<div class="my-0 alert alert-danger alert-dismissible fade show" role="alert">
        <strong>ERROR!</strong> Username is already exist please use different username.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
}

if (isset($_GET['signupsuccess_alert']) && $_GET['signupsuccess_alert']==true) {

        echo '<div class="my-0 alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Alert!</strong> Both password must be same for signup.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
}

if (isset($_GET['loginsuccess']) && $_GET['loginsuccess']==true) {

        echo '<div class="my-0 alert alert-success alert-dismissible fade show" role="alert">
        <strong>success!</strong> You are successfully logged in.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
}

if (isset($_GET['loginsuccess_alert']) && $_GET['loginsuccess_alert']==true) {

        echo '<div class="my-0 alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Alert!</strong> Username or password are wrong.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
}



?>
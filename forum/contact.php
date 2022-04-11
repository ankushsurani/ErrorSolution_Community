<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>iDiscuss - coding forums</title>
</head>

<body>
    <?php include("./partials/dbconnect.php");?>
    <?php
        include("./partials/header.php");
    ?>

    <?php

      $submit = false;

      if ($_SERVER['REQUEST_METHOD']=='POST') {
        $concerns = $_POST['concerns'];
        $selective = $_POST['selective'];
        $upload = $_POST['upload'];

        $sql = "INSERT INTO `contact_us`(`concerns`, `selective_concerns`, `file`, `time`) VALUES ('$concerns','$selective','$upload',current_timestamp())";
        $result = mysqli_query($con, $sql);
        $submit = true;
      }
    ?>


    <?php

      if ($submit) {
          echo '<div class="my-0 alert alert-success alert-dismissible fade show" role="alert">
          <strong>success!</strong> Your form has been submitted. we will solve your problem as soon as.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
      }
?>


<?php echo'

    <div class="container w-50 my-5">
        <h1 class="text-center my-2">Contact us</h1>
        <form class="row g-3" action="/forum/contact.php" method="post">

            <div class="col-12">
                <label for="exampleFormControlTextarea1" class="form-label">Write about your concern</label>
                <textarea class="form-control" id="concerns" name="concerns" rows="3"></textarea>
            </div>
            <div class="col-12">
                <select class="form-select" id="selective" name="selective" aria-label="Default select example">
                    <option selected>What can we help yo with?</option>
                    <option value="1">Please select a topic</option>
                    <option value="2">I lost my password</option>
                    <option value="3">I need to add or remove login credentials</option>
                    <option value="4">I need to delete my user profile</option>
                    <option value="5">I need to merge user profiles</option>
                    <option value="6">My question or answer was denied</option>
                    <option value="7">My question or answer did not meet quality standards</option>
                    <option value="8">My question was closed</option>
                    <option value="9">I want to appeal a suspension</option>
                    <option value="10">I want to report a Code of Conduct violation</option>
                    <option value="11">I would like to advertise on forum Exchange</option>
                    <option value="12">forum Exchange content is being reproduced without attribution</option>

                </select>
            </div>
            <h6 class="mb-1 mt-4">Share your problem with file or image</h6>
            <div class="input-group mb-3 mt-0">
                <input type="file" class="form-control" id="inputGroupFile02" name="upload">
                <label class="input-group-text" name="upload" for="inputGroupFile02">Upload</label>
            </div>
            <div class="col-12">';
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {
                echo'<button type="submit" class="btn btn-primary">Submit</button></div>';
            }
            else {
                echo '<button type="button" class="btn btn-secondary" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="You are not logged in. please login to submit the form.">
                Submit
              </button>';
            }
       echo ' </form>
    </div>';
    ?>



     <!-- footer -->
    <div class="container-fluid-expand-lg mt-auto fixed-bottom">
        <footer class="d-flex flex-wrap justify-content-between align-items-center bg-dark bg-light py-2">
            <p class="col mb-0 text-muted px-2">© 2021 Company, Inc</p>


            <ul class="nav col-md-4 justify-content-end">
                <li class="nav-item"><a href="/forum/index.php" class="nav-link px-3 text-light">Home</a></li>
                <li class="nav-item"><a href="/forum/about.php" class="nav-link px-3 text-light">About</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light " href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Popular Categories
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                        <?php
        $sql = "SELECT * FROM `categories` LIMIT 4";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
          echo' <li><a class="dropdown-item" href="threadlist.php?category_id='.$row['category_id'].'">'.$row['category_name'].'</a></li>';
        }
        ?>

                    </ul>
                <li class="nav-item"><a href="/forum/contact.php" class="nav-link px-3 text-light">Contact</a></li>
            </ul>
        </footer>
    </div>

    <div class="b-example-divider"></div>





    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> -->
    <script>
       var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
  return new bootstrap.Popover(popoverTriggerEl)
})
   </script>
</body>

</html>
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

    <?php
        include("./partials/dbconnect.php");
    ?>
    <?php
        include("./partials/header.php");
    ?>




    <?php
    
    $catid = $_GET['threadid'];   
    
    $sql = "SELECT * FROM `threads` WHERE `thread_id`='$catid'";
    $result= mysqli_query($con, $sql);
    while ($row= mysqli_fetch_assoc($result)) {
        $title = $row['thread_title'];
        $description = $row['thread_desc'];
        $thread_user_id = $row['thread_user_id'];

        $sql3 = "SELECT `user_email` FROM `users` WHERE `sno`='$thread_user_id'";
        $result3 = mysqli_query($con, $sql3);
        $row3 = mysqli_fetch_assoc($result3);

    }
    
    ?>


    <?php

$alert = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comment_content = $_POST['comment'];
    $comment_content = str_replace("<", "&lt;", $comment_content);
    $comment_content = str_replace(">", "&gt;", $comment_content);
    $comment_content = str_replace("'", "\"", $comment_content);
    $sno = $_POST['sno'];

    $sql = "INSERT INTO `comments`(`comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$comment_content','$catid','$sno',current_timestamp())";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $alert = true;
    }
}

?>



    <?php
    
    if ($alert) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success</strong> Your comment was submitted successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    
    ?>

    <!-- category container starts here -->
    <div class="container my-4">
        <div class="container-fluid py-5 container-dark bg-light ps-5 shadow p-3 mb-5 bg-body rounded">
            <h1 class="display-10 fw-bold"> <?php echo $title; ?> forums</h1>
            <p class=" fs-4 my-3"><?php echo $description; ?></p>
            <p class="my-4 link-danger">
                This is peer to peer forum..
                No Spam / Advertising / Self-promote in the forums is not allowed.
                Do not post copyright-infringing material.
                Do not post “offensive” posts, links or images.
                Do not cross post questions.
                Remain respectful of other members at all times.

            </p>
            <p>Posted by - <b> <?php  echo $row3['user_email'];  ?></b></p>
        </div>
    </div>

    <?php    

echo'<div class="container">
<form action="'. $_SERVER['REQUEST_URI'].'" method="post" class="was-validated">';
    
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
        echo'<input type="hidden" name="sno" value="'.$_SESSION['sno'].'">';
    }
   echo' <div class="mb-3">
        <label for="validationTextarea" class="form-label"><h2>Post your comment</h2></label>
        <textarea class="form-control is-invalid " id="comment" name="comment" placeholder="Enter your comment here" required></textarea>
        <div class="invalid-feedback">
        Please enter a comment.
        </div>';
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {
            echo'<button type="submit" class="btn btn-success my-3">Post comment</button>';
        }
        else {
            echo '<button type="button" class="btn btn-secondary my-3" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="You are not logged in. please login to be able to post comment">
            Post comment
          </button>';
        }
    
    echo '</div></form>
</div>';


        ?>

     



    <div class="container my-auto">
        <h1 class="my-5 text-center">Discussions</h1>

        <?php

        $noresult = true;

        $catid = $_GET['threadid']; 
        
        $sql = "SELECT * FROM `comments` WHERE `thread_id`='$catid'";
        $result = mysqli_query($con, $sql);

        while ($row= mysqli_fetch_assoc($result)) {
            $noresult = false;
            $comment_id = $row['comment_id'];
            $comment_content = $row['comment_content'];
            $comment_time = $row['comment_time'];
            $thread_user_id = $row['comment_by'];
            $sql2 = "SELECT `user_email` FROM `users` WHERE `sno`='$thread_user_id'";
            $result2 = mysqli_query($con, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
            
            
          echo '<div class="card my-5 ">
          <div class="card-header d-flex">
          <div class="flex-shrink-0">
          <img src="./partials/images/userss.svg" class="" alt="...">
          </div>
          <p class="link-success fw-light my-0 ps-2 py-1 d-flex-row">Commented by: '.$row2['user_email'].' at - '.$comment_time.'</p>
          </div>
          <div class="card-body">
              <p class="card-text">'.$comment_content.'</p>
          </div>
          </div>';
            
        }


        if ($noresult) {
            echo '<div class="alert alert-success" role="alert">
            <h4 class="alert-heading">No comment posted till now!</h4>
            <hr>
            <p class="mb-0">Be the first person to post a comment.</p>
          </div>';
        }
       ?>
    </div>

    

    <?php
        include("./partials/footer.php");
    ?>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script> -->
    <script>
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
    })
    </script>
</body>

</html>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>iDiscuss - coding forums</title>
  </head>
  <body>
   
    <?php
        include("./partials/dbconnect.php");
        ?>
        <?php
            include("./partials/header.php");
        ?>

     <!-- search starts here -->
    <div class="container my-5">
        <?php
        $noresult = true;
        $query = $_GET['search'];
         $sql = "SELECT * FROM `threads` WHERE MATCH(`thread_title`,`thread_desc`) against ('$query')";
         $result = mysqli_query($con, $sql);
 
         echo'<h1 class="my-5">Search results for "<em>' .$_GET["search"]. '</em>"</h1>';
         while ($row= mysqli_fetch_assoc($result)) {
           $thread_id = $row['thread_id'];
           $thread_title = $row['thread_title'];
           $thread_description = $row['thread_desc'];
           $url = "/forum/thread.php?threadid=".$thread_id;
           $noresult = false;

           
            echo' <div>
             <h5> <a href="'.$url.'">'.$thread_title.'</a></h5>
             <p> '.$thread_description.' </p>
             </div>';
             
             
            }
            if ($noresult) {
              echo '<div class="alert alert-success" role="alert">
              <h4 class="alert-heading">Suggestions:</h4>
              <hr>
              <p class="mb-0"><li>Make sure that all words are spelled correctly.</li>
              <li>Try different keywords.</li>
              <li>Try more general keywords.</li>
              </p>
            </div>';
          }

            ?>
            
            </div>
        
    <?php
        include("./partials/footer.php");
    ?>
  
  

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
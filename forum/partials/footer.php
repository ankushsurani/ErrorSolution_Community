<?php


echo '<div class="container-fluid-expand-lg mt-auto ">
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
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';

                
$sql = "SELECT * FROM `categories` LIMIT 5";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_assoc($result)) {
  echo '<li><a class="dropdown-item" href="threadlist.php?category_id='.$row['category_id'].'">'.$row['category_name'].'</a></li>';
}


         echo'   </ul>
        <li class="nav-item"><a href="/forum/contact.php" class="nav-link px-3 text-light">Contact</a></li>
    </ul>
</footer>
</div>';


?>
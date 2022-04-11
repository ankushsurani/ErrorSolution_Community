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



    <div class="container row mx-auto">

    <h1 class="text-center mt-5">About us</h1>


        <div class="card text-white bg-primary m-5" style="max-width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Adopt a customer-first mindset</h5>
                <p class="card-text">Authentically serve our customers by empowering, listening and collaborating with our fellow Stackers.</p>
            </div>
        </div>
        <div class="card text-white bg-secondary m-5" style="max-width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Be flexible and inclusive</h5>
                <p class="card-text">We do our best work when a diverse group of people collaborate in an environment of respect and trust. Create space for different voices to be heard, and allow flexibility in how people work.</p>
            </div>
        </div>
        <div class="card text-white bg-success m-5" style="max-width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Be transparent</h5>
                <p class="card-text">Communicate openly and honestly, both inside and outside the company. Encourage transparency from others by being empathetic, reliable, and acting with integrity.</p>
            </div>
        </div>
        <div class="card text-white bg-danger m-5" style="max-width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Empower people to deliver outstanding results</h5>
                <p class="card-text">Give people space to get their job done, support them when they need it, and practice blameless accountability.</p>
            </div>
        </div>
        <div class="card text-dark bg-warning m-5" style="max-width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Keep community at our center</h5>
                <p class="card-text">Community is at the heart of everything we do. Nurture healthy communities where everyone is encouraged to learn and give back.</p>
            </div>
        </div>
        <div class="card text-dark bg-info m-5" style="max-width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Learn, share, grow</h5>
                <p class="card-text">Adopt a Growth Mindset. Be curious and eager to learn. Aim for ethical, sustainable, long-term growth, both personally and in the company.</p>
            </div>
        </div>
        


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
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>
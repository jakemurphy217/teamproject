
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Account</title>
    <meta charset="utf-8">



    <!-- so bootstrap can recongise between a mobile and destop device -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- linking the bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!-- JQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <!-- Latest JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <!-- my CSS -->
    <link rel="stylesheet" href="assests/css/style.css.css" type="text/css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light " style="background-color: aquamarine">

        <a class="navbar-brand" href="index.php" style="max-width: 30%;">
            <img src="logo.png" class="img-fluid">InTheKitchen
        </a>

        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
            <span class="navbar-toggler-icon"> </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="index.php" class="nav-link">Home</a>
                </li>

                <li class="nav-item">
                    <a href="favourites.php" class="nav-link">Favourites</a>
                </li>

                <li class="nav-item">
                    <a href="zomato.php" class="nav-link">Restaurants</a>
                </li>

                <li class="nav-item">
                    <a href="About.php" class="nav-link">About</a>
                </li>

                <li class="nav-item">
                    <a href="login.php" class="nav-link">logout</a>
                </li>
            </ul>
        </div>

    </nav>
    <!-- end of navbar -->

    <div class="container">

        <!-- Introduction Row -->
        <h1 class="my-4">About Us
            <small>This is our Team!!</small>
        </h1>
        <p>Hello this is our Web Application for Team Project. For this peoject we have learned many new skills such as JavaScript,PHP,JQuery and New Frameworks such as Axious and Handlebars</p>

        <!-- Team Members Row -->
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h2 class="my-4">Team Pear</h2>
            </div>
            <div class="col-lg-4 col-sm-6 text-center mb-4">
                <img class=" profpic rounded-circle img-fluid d-block mx-auto" src="https://media.licdn.com/dms/image/C4D03AQH1eilqlQDHFA/profile-displayphoto-shrink_200_200/0?e=1550707200&v=beta&t=4PL_Axby7jXQud6bXVQ-jZA4AqPeueyC7zYdFnOgxQo" alt="image" height="800" width="800">
                <h3>Jake Murphy
                    <small> Food2Fork API/Registration</small>
                </h3>
                <p>For My Part, I developed the home page and the recipe search. which was a huge learning curve developing with API's in JSON format and using a frameworks such as Axious to call the API and handlebars which is a templating framework that displays the results. Also developed the favourite button.</p>
            </div>
            <div class="col-lg-4 col-sm-6 text-center mb-4">
                <img class="profpic rounded-circle img-fluid d-block mx-auto" src="https://media.licdn.com/dms/image/C4D03AQEjuo-5f2vzBg/profile-displayphoto-shrink_800_800/0?e=1550707200&v=beta&t=kCkjupVDIL_zwWiY4SYOvQeUIO1nZBTre9Al5Z72BgI" alt="image" height="800" width="800">
                <h3>Gavin Smyth
                    <small>Zomato API/Registration</small>
                </h3>
                <p>For my part I developed the resteraunt page. This allows the users to search through an API choosing what city they want and also what type of food they want. Also, Me and jake developed a functioning Login and registration for the user.</p>
            </div>
            <div class="col-lg-4 col-sm-6 text-center mb-4">
                <img class="profpic rounded-circle img-fluid d-block mx-auto" src="https://media.licdn.com/dms/image/C4D03AQERQ0Dzujq0Vw/profile-displayphoto-shrink_800_800/0?e=1550707200&v=beta&t=kuKF8cewTNXlgT_7zX1SUI9ik1NCmaQnQ1lMVcw8mJ0" alt="image" height="800" width="800">
                <h3>Ciaran Maguire
                    <small>Database and Navigation-Bar</small>
                </h3>
                <p>Developed the database.php page that connects the WebApp to our PHPmyadmin database. This allows to call the database anywhere when developing the WebApp. Also developed the navigation bar that is mobile ready. </p>
            </div>

            <div class="col-lg-4 col-sm-6 text-center mb-4">
                <img class="profpic rounded-circle img-fluid d-block mx-auto" src="https://media.licdn.com/dms/image/C4D03AQEZQsGBE5_c_w/profile-displayphoto-shrink_800_800/0?e=1550707200&v=beta&t=50jfeR99UK-vnIcGyx1ItD5bwWzmMlunGNt__gDt6tk" alt="image" height="800" width="800">
                <h3>Olive Mtambo
                    <small>Accounts Page and Design</small>
                </h3>
                <p>Developed the accounts page and tried to design the website as near as possible to the wireframes. I am beginner to Bootstrap and from this project have learned many new design techniques that i can implemtent in future projects.</p>
            </div>
        </div>


    </div>


    <div class="footer fixed-bottom">

        <div class="container">
            <footer>&copy; TeamPear<br /></footer>

        </div>


    </div>

</body>

</html>

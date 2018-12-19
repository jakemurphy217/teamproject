<?php
session_start();
include_once 'database.php';
include_once 'functions.php';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Home</title>
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
  				<img src="assests/img/logo.png" class="img-fluid">InTheKitchen
  			</a>
				<button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
					<span class="navbar-toggler-icon"></span>
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
            <?php if (!userIsAuthenticated()) { ?>
              <li class="nav-item">
                <a href="login.php" class="nav-link">Login</a>
              </li>
              <li class="nav-item">
                <a href="register.php" class="nav-link">Register</a>
              </li>
            <?php } else { ?>
              <li class="nav-item">
                <a href="logout.php" class="nav-link">Logout</a>
              </li>

            <?php } ?>
					</ul>
				</div>
			</nav>

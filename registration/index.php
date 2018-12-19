<?php

include_once 'includes/header.php';




if (!userIsAuthenticated()) {
  header('Location: login.php ');

} else {
  $userId = $_SESSION["user_id"];

  $favorites = $db->query("SELECT *
    FROM favorites
    WHERE user_id = '${userId}'
  ")->fetchAll();
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (userIsAuthenticated()) {

    // Get Recipe Details
    $userId = $_SESSION["user_id"];
    $recipeId = $_POST["recipe_id"];
    $title = $_POST["title"];
    $imageUrl = $_POST["image_url"];
    $publisher = addslashes($_POST["publisher"]);
    $sourceUrl = $_POST["source_url"];


    // Check if user has already added recipe to favorites
    $recipe = $db->query("SELECT *
      FROM favorites
      WHERE user_id = '${userId}'
      AND recipe_id = '${recipeId}'")->fetchAll();

    if (count($recipe) > 0) {
      // Delete favorite

      $db->query("DELETE
        FROM favorites
        WHERE user_id = '${userId}'
        AND recipe_id = '${recipeId}'");

      echo "Recipe Removed from favorites";

    } else {
      // Add Favorite
      $db->query("INSERT INTO favorites
        (user_id, title, image_url, publisher, source_url, recipe_id)
        VALUES ('${userId}', '${title}', '${imageUrl}', '${publisher}', '${sourceUrl}', '${recipeId}' )");

      echo "Recipe added to favorites";
    }

  } else {
    header('Location: login.php ');
  }
}

?>


<div class="container-fluid">
  <div class="row">
  	<div class="col-md-12 jumbotron">
  		<div class="text">
  			<h1>Welcome</h1>
  			<p> InTheKitchen lets the user search for new recipes and search for resturants nearby</p>
  			<p>Developed by Team Pear</p>
  			<a href="#" class="btn btn-lg btn-success">Youtube</a>
  		</div>
  	</div>
  </div>
</div>

<div class="container-fluid my-container">
	<div class="row my row">
		<div class="col-md-12 col-sm-12 Search">
    	<div class="input-group col-mb-6 Search-Box">
    		<form class="form form-inline md-form me-auto mb-4">
    			<label></label>
    			<input class="post-id-input form-control mr-sm-2" type="text" placeholder="what are you feeling?" aria-label="Search" aria-label="Search">
    				<button class="btn aqua-gradient btn-rounded btn-sm my-0" type="submit" name="button" "btn btn-outline-secondary">Search</button>
    			</form>
    			<div class="input-group-append"></div>
    		</div>
  	  <div class="output"></div>
  	</div>
  </div>
</div>

<?php include_once 'includes/recipes-template.php'; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.js" charset="utf-8"></script>
<script src="assests/js/handlebars-379172e.js" charset="utf-8"></script>
<script src="assests/js/SearchAPI.js" charset="utf-8"></script>

<?php include_once 'includes/footer.php'; ?>
//mysql://b8dcbc2d3d06e8:ae01eeeb@eu-cdbr-west-02.cleardb.net/heroku_3d0bf81e38be15d?reconnect=true
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


?>

<div class="container">
  <?php if (count($favorites) == 0) { ?>

    <h4>You have not added any favorites yet.</h4>

    <?php } else {

        foreach ($favorites as $favorite): ?>
        <div class="recipe">
          <h2>
            <u><?php echo $favorite["title"]; ?></u>
          </h2>
          <img src="<?php echo $favorite["image_url"]; ?>" id="food" />
          <h3>
            <u>Publisher:</u><?php echo $favorite["publisher"]; ?>
          </h3>
          <h3>
            <u>Description:</u>
            <a href="<?php echo $favorite["source_url"]; ?>"><?php echo $favorite["source_url"]; ?></a>
          </h3>
          <form action="index.php" method="post">
            <input name="recipe_id" hidden value="<?php echo $favorite["recipe_id"]; ?>"/>
            <input name="title" hidden value="<?php echo $favorite["title"]; ?>"/>
            <input name="image_url" hidden value="<?php echo $favorite["image_url"]; ?>"/>
            <input name="publisher" hidden value="<?php echo $favorite["publisher"]; ?>"/>
            <input name="source_url" hidden value="<?php echo $favorite["source_url"]; ?>"/>
            <button type="submit" class="btn btn-primary">Remove Favourite</button>
          </form>
        </div>
        <?php endforeach;

    }; ?>
</div>



<?php include_once 'includes/footer.php'; ?>

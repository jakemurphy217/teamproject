<?php
session_start();
//header('location:Login.php');
$con = mysqli_connect('localhost','root','','registration');
if(!$con){
  die("db error");
}

if(isset($_GET["title"])){
  $title = $_GET["title"];
  $image_url = $_GET["image_url"];
  $publisher = $_GET["publisher"];
  $source_url = $_GET["source_url"];
  if(!empty($recipe_id)){
    $recipe_id = mysqli_real_escape_string($con, $recipe_id);
    $user_id = $_SESSION['user_id'];
      
    $query = "SELECT * FROM favorites WHERE user_id = '$user_id' && title = '$title'&& image_url = '$image_url'&& publisher = '$publisher'&& source_url = '$source_url'";
    $result = mysqli_query($con, $query);
    
    if(mysqli_num_rows($result) == 1){
      echo "Already added";
    } else {
      $query = "INSERT INTO favorites (user_id,title,image_url, publisher,source_url) VALUES('$user_id', '$title', '$image_url', '$publisher', '$source_url')";
      $result = mysqli_query($con, $query);
        
      echo "Success";
    }
  }
} else {
  echo "Something went wrong";
}
      
?>

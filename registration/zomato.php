
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

<link rel="stylesheet" href="/assests/css/style.css.css">

 <div class="container">
  <div class="row">
   <div class="col">
    <img src="imgage/food.jpg.jpg" class="d-block mx-auto" alt="">
    <div class="feedback alert alert-danger text-center text-capitalize">please enter city</div>
    <form id="searchForm" class="my-4">
     <!-- form group -->
     <div class="form-group my-3">
      <select class="custom-select text-capitalize" id="searchCategory">


      </select>
     </div>
     <!-- end of form group -->

     <!-- input group -->
     <div class="input-group">
      <input type="text" class="form-control text-capitalize" id="searchCity" placeholder="enter city....">
      <div class="input-group-append">
       <button id="cityBtn" type="submit" class="btn redBtn text-capitalize">search</button>
      </div>
     </div>
     <!-- input group -->


    </form>

    <img src="/imgage/loader.gif" class="loader" alt="">
   </div>
  </div>
 </div>
 <!-- restaurant section -->

 <section class="py-5">
  <div class="container">
   <div class="row" id="restaurant-list">
    <!-- item -->
   

    </div>
   </div>
 </section>
 



 <!-- jquery -->
 <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
 <!-- bootstrap js -->

   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 <!-- script js -->
 <script src="zomato.js"></script>
 
 <div class="footer fixed-bottom">
       
           <div class="container">
                   <footer>&copy; TeamPear<br/></footer>
               
           </div>
        
        
    </div>

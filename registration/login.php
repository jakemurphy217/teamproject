<?php

include_once 'includes/header.php';

if (userIsAuthenticated()) {
  header('Location: index.php ');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $password = $_POST["password"];

  $users = $db->query("SELECT *
    FROM users
    WHERE email = '${email}'
    AND password = '${password}'")->fetchAll();

  if (count($users) == 1) {
    $_SESSION["user_id"] = $users[0]["user_id"];
    header("Location: index.php");
  } else {
    echo "Wrong username or password";
  }
}

?>

<div class="container">
  <h2>Login</h2>
  <form action="login.php" method="post">
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>



<?php include_once 'includes/footer.php'; ?>

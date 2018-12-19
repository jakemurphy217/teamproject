<?php

include_once 'includes/header.php';

if (userIsAuthenticated()) {
  header('Location: index.php ');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $password = $_POST["password"];

  // Check if user exists
  $users = $db->query("SELECT * FROM users WHERE email = '${email}'")->fetchAll();

  if (count($users) != 0) {
    echo "User already exists";
  } else {
    // echo "INSERT INTO users (email, password) VALUES ('${email}', '${password}')";
    $db->query("INSERT INTO users (email, password) VALUES ('${email}', '${password}')");
    echo "Succesfully Registed";
  }
}

?>

<div class="container">
  <h2>Register</h2>
  <form action="register.php" method="post">
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

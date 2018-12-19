<?php

$serverName ="eu-cdbr-west-02.cleardb.net";
$username = "b8dcbc2d3d06e8";
$password = "ae01eeeb";
$databaseName = "heroku_3d0bf81e38be15d";

try {
  $db = new PDO("mysql:host=$serverName;dbname=${databaseName}", $username, $password);
  // set the PDO error mode to exception
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

?>

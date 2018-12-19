<?php

function userIsAuthenticated() {
  return isset($_SESSION["user_id"]);
}

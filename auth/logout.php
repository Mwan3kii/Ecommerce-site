<?php
include_once("../database.php");
// setcookie("login", "", time() - 3600, "/");
session_start();
session_unset();  // Remove all session variables
session_destroy();
// Redirect the user back to the login page or homepage
header("Location: ../");
exit();
?>
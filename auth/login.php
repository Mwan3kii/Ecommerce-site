<?php
session_start();
include_once("../database.php");

$email = $_POST["email"];
$password = $_POST["password"];

$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    if($row = $result->fetch_assoc()) {
        // setcookie("login_session", "1", time() + (86400 * 30), "/");
        setcookie("login", "1", time() + (86400 * 30), "/");
        header("Location: ../");
    }
} else {
    $_SESSION['error_message'] = 'Invalid username or password.';
    header("Location: login.html");
}
?>

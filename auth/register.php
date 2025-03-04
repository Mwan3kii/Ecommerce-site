<?php
session_start();
include_once("../database.php");

$name = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
// $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

if ($conn->query($sql)) {
    $_SESSION["user"] = $name;
    $_SESSION["login"] = "1";
    echo "Registration successful!";
    echo "<script>
          window.location.href = '../';
          </script>";
} else {
    echo "Error: " . $conn->error;
    alert("Error");
}


$conn->close();

?>
<?php
include_once("../database.php");

$name = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
// $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

if ($conn->query($sql)) {
    echo "Registration successful!";
    echo "<script>
          window.location.href = '../index.html';
          </script>";
} else {
    echo "Error: " . $conn->error;
    alert("Error");
}


$conn->close();

?>
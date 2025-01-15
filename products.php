<?php
include_once("./database.php");

$name = $_POST["product"];
$description = mysqli_real_escape_string($conn, $_POST["description"]);
$price = $_POST["price"];
$file = $_FILES["image"]["name"];
$file_path = "uploads/" . basename($file);
$file_size = $_FILES["image"]["size"];
$tmp_file = $_FILES["image"]["tmp_name"];
$file_type = strtolower(pathinfo($file_path,PATHINFO_EXTENSION));


// Check file size
if ($file_size > 5000000000) {
    die ("Your file is too large.");
}
// check file extension
if($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg" && $file_type != "gif" && $file_type != "webp" ) {
    die ("The type of file is not allowed");
}
// give file tmp location to server
if (move_uploaded_file($tmp_file, $file_path)) {
    echo "The file has been uploaded.";
} else {
    echo "There was an error uploading your file.";
}

$sql = "INSERT INTO products (name, description, price, image) VALUES ('$name', '$description', '$price', '$file')";

if ($conn->query($sql)) {
    echo "products saved";
    echo "<script>
            setTimeout(function() {
                window.location.href = 'products.html';
            }, 1000);
          </script>";
} else {
    echo "Error: " . $conn->error;
    alert("Error");
}

$conn->close();

?>
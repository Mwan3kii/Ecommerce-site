<?php
include_once("./database.php");

$sql_fetch = "SELECT * FROM products";
$prod = new stdClass();
$text = "";
$result = $conn->query($sql_fetch);

if ($result->num_rows > 0) {
    // Checks if result contains rows
    while($row = $result->fetch_assoc()) {
    $text.= "
    <div>
            <div class='product-image'>
                <a href='single-product.php?id=" . $row['ID'] . "'>
                <img src='uploads/" . $row['IMAGE'] . "' alt='product'>
                </a>
                <button class='cart-button'>
                    Add to cart
                </button>
            </div>
            <h4>" . $row['NAME'] . "</h4>
            <span class='price'>
                <del>Ksh " . $row['PRICE'] . "</del>
                Ksh " . $row['PRICE'] . "
            </span>
            </div>
        ";
}
} else {
    echo "No products";
}

// $prod->resp = $text;
echo $text;

$conn->close();
?>
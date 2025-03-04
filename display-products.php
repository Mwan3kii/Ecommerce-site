<?php
session_start();
include_once("./database.php");

$sql_fetch = "SELECT * FROM products WHERE ID = 12";
$prod = new stdClass();
$text = "";
$result = $conn->query($sql_fetch);

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if ($result->num_rows > 0) {
    // Checks if result contains rows
    while($row = $result->fetch_assoc()) {
    $existing = array_filter($_SESSION['cart'], function($item) use ($row) {
        return $item['name'] === $row['NAME'];
    });
    if (!$existing) { // if not already in cart
        $_SESSION['cart'][] = [
            'name' => $row['NAME'],
            'price' => $row['PRICE']
        ];
    }
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
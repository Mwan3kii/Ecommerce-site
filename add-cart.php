<?php
session_start();
include_once("./database.php");
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if ($product_id > 0) {
    $sql = "SELECT * FROM products WHERE ID = $product_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $existing = array_filter($_SESSION['cart'], function($item) use ($row) {
                return $item['id'] === $row['ID'];
            });
            if (!$existing) { // if not already in cart
                $_SESSION['cart'][] = [
                    'id' => $row["ID"],
                    'name' => $row['NAME'],
                    'price' => $row['PRICE'],
                    'image' => $row['IMAGE']
                ];
            }
        }
        // echo json_encode($_SESSION['cart']);
        echo json_encode($_SESSION['cart']);
    } else {
        echo "No products added to cart";
    }
} else {
    echo "No products added to cart";
}
?>

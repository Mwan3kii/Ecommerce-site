<?php
include_once("./database.php");
// Get the product ID from the URL
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$item = "";

if ($product_id > 0) {
    // Fetch product details from the database
    $sql = "SELECT * FROM products WHERE ID = $product_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        $item.= "
        <div class='single-image'>
                <img src='uploads/" . $row['IMAGE'] . "' alt='single product'>
                <button class='single-btn'>
                    Add to cart
                </button>
            </div>
            <div class='product-description'>
                <h2>" . $row['NAME'] . "</h2>
                <div style='display: flex; gap: 20px;'>
                    <del>Ksh" . $row['PRICE'] . "</del>
                    <h3>Ksh" . $row['PRICE'] . "</h3>
                </div>
                <div style='margin-top: 15px;'>
                    <span>Special Price</span>
                    Get extra 5% off (price inclusive of discount)
                </div>
                <div>
                    <h5>Description:</h5>
                    <p>" . $row['DESCRIPTION'] . "</p>
                </div>
                <h4>Check delivery, payment options and charges at your location</h4>
            </div>";
        }
    } else {
        echo "Product not found.";
    }
} else {
    echo "Invalid product ID.";
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Site</title>
    <link rel="stylesheet" href="/assests/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <header class="header-top">
        <div class="header-container">
            <h1 class="title">SHOPPY<span class="spanh1">Kart</span></h1>
            <div class="navbar-div">
                <ul class="nav-ul">
                    <li class="nav-item">HOME</li>
                    <li class="nav-item">ABOUT</li>
                    <li class="nav-item">PRODUCTS</li>
                    <li class="nav-item">CONTACT</li>
                    <li class="search-bar">
                        <span class="fas fa-search me-2" aria-hidden="true"></span>
                    </li>
                </ul>
            </div>
            <div class="auth-div">
                <button class="nav-btn">
                    <div class="fas fa-user user"></div>
                    <span>Login</span>
                </button>
                <button class="nav-btn">
                    <span class="fas fa-shopping-bag"></span>
                    <span>Cart</span>
                </button>
            </div>
        </div>
    </header>
    <section style="height: 90px;"></section>
    <section>
        <div>
            <div class="product-banner">
                <div class="productb">
                    <h5 class="product-h5">Single Product</h5>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="single-container">
        <?php echo $item; ?>
            <!-- <div class="single-image">
                <img src="" alt="single product">
                <button class="single-btn">
                    Add to cart
                </button>
            </div>
            <div class="product-description">
                <h2></h2>
                <div style="display: flex; gap: 20px;">
                    <del>Ksh</del>
                    <h3>Ksh</h3>
                </div>
                <div style="margin-top: 15px;">
                    <span>Special Price</span>
                    Get extra 5% off (price inclusive of discount)
                </div>
                <div>
                    <h5>Description:</h5>
                    <p></p>
                </div>
                <h4>Check delivery, payment options and charges at your location</h4>
            </div> -->
        </div>
    </section>
    <footer class="footer-section">
        <div class="footer-div">
            <h2 class="footer-title">Special Offer every week with a 50 % discount</h2>
            <div class="footer-container">
                <div>
                    <h6>Useful links</h6>
                    <div class="footer-info">
                        <ul>
                            <li>Home</li>
                            <li>About</li>
                            <li>Products</li>
                            <li>Checkout</li>
                            <li>Cart</li>
                            <li>login</li>
                        </ul>
                    </div>
                </div>
                <div>
                    <h6>Address</h6>
                    <div class="footer-info">
                        <ul>
                            <li>Nairobi, Kenya</li>
                            <li>+(254) 166 241 60</li>
                            <li>agathamwaniki@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div>
                    <h6>Payment Method</h6>
                    <div class="footer-info">
                        <ul>
                            <li>
                                <span class="payment-span">
                                    <img src="images/pesapal.png" alt="pesapal logo">
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="headline">
                <p>© 2024 ShoppyKart. All rights reserved | Designed by Agatha Mwaniki</p>
                <div class="socials">
                    <a>
                        <button class="social-btn">
                            <span class="fab fa-github"></span>
                        </button>
                    </a>
                    <a>
                        <button class="social-btn">
                            <span class="fab fa-twitter"></span>
                        </button>
                    </a>
                    <a>
                        <button class="social-btn">
                            <span class="fab fa-linkedin-in"></span>
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <!-- <script>
            setTimeout(function () {
                $(document).ready(function () {
                    alert("Button clicked");
                    $("#spinner").show(); 
                    $.get("single-product.php", function (data, status) {
                        alert("Data received" + data + "\nStatus: " + status);
                        $("#spinner").hide();
                        // const json_feedback = JSON.parse(data);
                        // alert(json_feedback.status);
                        $(".single-container").html(data);    
                        // $("#view-table").html(json_feedback.html_res);
                    });
                });
            }, 1000);
    
        </script> -->
    </footer>
    
</body>

</html>
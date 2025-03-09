<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Site</title>
    <link rel="stylesheet" href="/assests/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- <script src="./script.js?q=1" defer></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./script.js" defer></script>
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
                <button class="cart-btn" id="cartButton">
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
                    <h5 class="product-h5">Products</h5>
                </div>
            </div>
        </div>
    </section>
    <div id="popupCart" style="display: none;">
        <div class="cart-section">
            <div class="cart-container">
                <div style="display: flex; justify-content: space-between;">
                    <h2>CART</h2>
                    <div style="gap: 20px; display: flex;">
                        <a href="empty-cart.php">
                            <button type="button" class="clear-cart">Clear cart</button>
                        </a>
                        <button type="button" class="cart-close">×</button>
                    </div>
                </div>
                <div class="cart-list">
                <?php session_start();
                if (isset($_SESSION["cart"])): ?>
                    <ul>
                    <?php foreach ($_SESSION['cart'] as $index => $item): ?>
                        <li>
                            <h4><?php echo htmlspecialchars($item["name"]); ?></h4>
                            <div style="display: flex; gap: 40px;">
                                <div>
                                    <input class="cart-quantity" data-sbmincart-idx="0" name="quantity_1" type="text"
                                        pattern="[0-9]*" value="1" autocomplete="off">
                                    <button type="button" class="remove-cart" >×</button>
                                </div>
                                <span class="cart-price"><?php echo htmlspecialchars($item["price"]); ?></span>
                            </div>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                    <?php else: ?>
                        <p>No products added to cart</p>
                <?php endif; ?>
                
                </div>
                <div style="display: flex; justify-content: space-between;">
                    <div class="cart-total">Subtotal: $999.98 USD</div>
                    <a href="checkout.php">
                        <button class="cart-checkout" type="submit">Check Out</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <section>
        <div class="products-section">
            <div class="products-div">
                <div class="products-display">
                    <!-- Products will be dynamically manipulated here -->
                    
                </div>
            </div>
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
        <script>
            // $.get("view.php", function (data, status) {
            //     products = data;
            // });
            setTimeout(function () {
            // $("#spinner").show();
            $(document).ready(function () {
                // alert("Button clicked");
                $("#spinner").show();
                $.get("display-products.php", function (data, status) {
                    // alert("Data received" + data + "\nStatus: " + status);
                    $("#spinner").hide();
                    // const json_feedback = JSON.parse(data);
                    // alert(json_feedback.status);
                    $(".products-display").html(data);
                    // $("#view-table").html(json_feedback.html_res);
                });
            });
        }, 500);
        </script>

        <script>
            $(document).ready(function() {
                $(".products-display").on("click", ".cart-button", function() {
                let productId = $(this).data("id");

                $.get("add-cart.php?id=" + productId, function(data) {
                    $("#popupCart .cart-list").load(" #popupCart .cart-list > *");
                    // $("#popupCart .cart-list").html(JSON.parse(data));
                    $("#popupCart").show(); // Show the cart
                    });
            });
        });
        </script>
    </footer>
</body>

</html>
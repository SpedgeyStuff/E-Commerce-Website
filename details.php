<!DOCTYPE html>

<?php include("functions/functions.php"); ?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>McKinley Comics Co</title>
    <link rel="stylesheet" href="dist/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="styles/main.css" />

</head>

<body>
    <div id="page-container">
        <div id="content-wrap">
            <!-- Banner -->
            <div class="container-fluid">

                <!-- Logo -->
                <div class="row site-banner">
                    <div class="col-sm-8 col-md-8 col-lg-8">
                        <a href="./index.html">
                            <img class="logo" src="img/logo.png">
                        </a>
                    </div>
                    <div class="col-sm-4 basket-wrapper rounded">
                        <b> Shopping Basket </b>
                        Total Items:
                        Total Price:
                        <a href="basket.php">Go to basket</a>
                    </div>
                </div>

                <!-- Nav Bar -->
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 site-nav-bar">
                        <ul class="nav nav-pills nav-justified">
                            <!-- nav-justified used instead of nav-fill since it makes all the buttons the same size , rather than ones with more text being longer, while still filling the row-->
                            <li class="nav-item">
                                <a class="nav-link active" href="./index.html">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="./shop.php">Shop</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="#">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Login/Sign Up</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div id="page-content">
                <div class="container bold-border rounded shop-wrapper">
                    
                        <?php
                        if(isset($_GET['product_id'])){
                            $product_id = $_GET['product_id'];          // create local variable of the user's chosen product ID
                        }

                        $get_products = "select * from products where product_id='$product_id'";    // get product from database
                        $run_products = mysqli_query($con, $get_products);

                        while ($product_row = mysqli_fetch_array($run_products)) {
                            $product_id = $product_row['product_id'];
                            $product_brand = $product_row['brand'];
                            $product_name = $product_row['name'];
                            $product_price = $product_row['price'];
                            $product_image = $product_row['image'];
                            $product_keywords = $product_row['keywords'];
                            $product_description = $product_row['description'];

                            echo " 
                            <div class='row product-detail-box'>
                                <div class='col-sm-4 column'>
                                    <img class='product-detail-image thin-border img-responsive rounded' src='admin/product_images/$product_image'>
                                </div>
                                <div class='col-sm-8 product-detail-text-wrapper'>
                                    <h1 class='product-detail-title'>$product_name</h1>
                                    <p class='product-detail-description'>$product_description</p>
                                    <div class='product-price product-detail-price'>
                                        <a href='index.php?product_id=$product_id' class='btn btn-primary btn-sm float-right'>Add To Cart</a>
                                        <h2 class='price-text'>£$product_price</h2>
                                    </div>
                                </div>
                            </div>
                            ";}
                            ?>
                    
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="footer">
            <div class="container-fluid">
                <h2 style="text-align: center; color:white;"> &copy; 2019 by Daniel McKinley for
                    E-Commerce at
                    City University London
                </h2>
            </div>
        </footer>
    </div>

    <!-- FIXME: JavaScript may not be working properly?-->
    <script src="dist/js/jquery-3.0.0.slim.min.js"></script>
    <script src="dist/js/bootstrap.js"></script>
</body>

</html>
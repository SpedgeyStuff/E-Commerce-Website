<!DOCTYPE html>

<?php 
session_start();
include("functions/functions.php"); 
?>

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
                        <?php basket(); ?>
                        <b> Shopping Basket </b>
                        Total Items: <?php total_items(); ?>
                        Total Price: £<?php total_price(); ?>
                        <a href="basket.php">View</a>
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
								<a class="nav-link active" href="./about.html">About</a>
							</li>
							<li class="nav-item">
								<a class="nav-link active" href="./login.php">Login/Sign Up</a>
							</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="container page-content">
                <form class="bold-border table-wrapper rounded" action="" method="post" enctype="multipart/form-data">
                    <table class="table">
                        <tr align="center">
                            <td colspan="8">
                                <h2>Basket/Checkout</h2>
                            </td>
                        </tr>
                        <tr align="center">
                            <th>Remove</th>
                            <th></th>
                            <th>Product(s)</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>

                        <?php 
                        $total = 0;
                        $ip = getIp();
                        $get_basket_items = "select * from basket where ip_add='$ip'";
                        $run_items = mysqli_query($con, $get_basket_items);
                        while ($products = mysqli_fetch_array($run_items)) {
                            $product_id = $products['p_id'];
                            $basket_products = "select * from products where product_id='$product_id'";
                            $run_price = mysqli_query($con, $basket_products);
                            while ($p_price = mysqli_fetch_array($run_price)) {
                                $product_price = array($p_price['price']);
                                $product_title = $p_price['name'];
                                $product_image = $p_price['image'];
                                $single_price = $p_price['price'];
                                $values = array_sum($product_price);
                                $total += $values;
                                ?>

                        <tr>
                            <td align="center"><input type="checkbox" name="remove[]" value="<?php echo $product_id; ?>" /></td>
                            <td><img src="admin/product_images/<?php echo $product_image; ?>" width="60" height="auto" /></td>
                            <td><?php echo $product_title ?></td>
                            <td align="center"><input type="text" size="3" name="qty" value="<?php echo $_SESSION['qty'];?>" /></td>
                            <?php 
                                if(isset($_POST['update_cart'])){
                                    $qty = $_POST['qty'];
                                    $update_qty = "update basket set qty='$qty'";
                                    $run_qty = mysqli_query($con, $update_qty);

                                    $_SESSION['qty']=$qty;
                                    $total = $total*$qty;
                                }
                            ?>
                            <td align="center">£<?php echo $single_price ?></td>
                        </tr>
                        <?php 
                    }
                } ?>

                        <tr align="right">
                            <td colspan="4">Sub-Total:</td>
                            <td align="center">£<?php echo $total ?></td>
                        </tr>

                        <tr align="center">
                            <td colspan="5">   
                                <!--TODO: not working?? error 404 when clicking the update button -->
                                <input class="btn btn-primary btn-sm" type="submit" name="update_basket" value="Update Basket" /> <!--<button class="btn btn-primary btn-sm" name="update_basket">Update Basket</button>-->
                                <a class='btn btn-primary btn-sm' href="checkout.php">Checkout</a>
                            </td>
                        </tr>
                    </table>
                </form>

                <?php 
                    global $con;
                    $ip = getIp();
                    if (isset($_POST['update_basket'])) {
                        foreach ($_POST['remove'] as $remove_id) { 
                            $delete_product = "delete from basket where p_id='$remove_id' AND ip_add='$ip'";
                            $run_delete = mysqli_query($con, $delete_product);
                            if($run_delete){
                                echo "<script>window.open('basket.php','_self')</script>";//"<script>window.open('basket.php','_self')</script>";
                            }
                        }
                    }
                
                ?>

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
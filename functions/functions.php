<?php

$con = mysqli_connect("localhost", "root", "", "e-com_website");


//get the categories
function getCategories()
{

    global $con;    // gives access within function scope

    $get_categories = "select * from categories";   // store results of SQL query into local variable "$get_categories"

    $run_categories = mysqli_query($con, $get_categories);

    while ($row_categories = mysqli_fetch_array($run_categories)) {
        $category_id = $row_categories['category_id'];
        $category_title = $row_categories['category_title'];
        //echo"<li><a href='#'>$category_title</a></li>";
        echo "
        <a class='btn btn-primary btn-block' href='shop.php?category=$category_id'>$category_title</a>";
    }
}

//get the brand
function getBrands()
{
    global $con;    // gives access within function scope

    $get_brands = "select * from brands";   // store results of SQL query into local variable "$get_categories"

    $run_brands = mysqli_query($con, $get_brands);

    while ($row_brands = mysqli_fetch_array($run_brands)) {
        $brand_id = $row_brands['brand_id'];
        $brand_title = $row_brands['brand_title'];
        echo "<a class='btn btn-primary btn-block' href='shop.php?brand=$brand_id'>$brand_title</a>";
    }
}

function getProducts()
{

    if(!isset($_GET['category'])){     // these two if statements cover the base case of no category or brand being set by the user
        if(!isset($_GET['brand'])){
            global $con;    // gives access within function scope

            $get_products = "select * from products order by RAND() LIMIT 0, 6";
            $run_products = mysqli_query($con, $get_products);

            while ($product_row = mysqli_fetch_array($run_products)) {
                $product_id = $product_row['product_id'];
                $product_category = $product_row['category'];
                $product_brand = $product_row['brand'];
                $product_name = $product_row['name'];
                $product_price = $product_row['price'];
                $product_image = $product_row['image'];

                echo " 
                <div class='col-xs-6 col-sm-4 col-md-4 col-lg-3 my-md-1'>
                    <div class='product-box rounded'>
                        <div>
                            <a href='details.php?product_id=$product_id' class='thumbnail'>
                                <img class='product-thumbnail img-responsive' src='admin/product_images/$product_image'>
                            </a>
                        </div>
                        <div>
                            <div class='product-title'><a href='details.php?product_id=$product_id'>$product_name</a></div>
                            <div class='product-price'>
                                <a href='index.php?product_id=$product_id' class='btn btn-primary btn-sm float-right'>Add To Cart</a>
                                <div class='price-text'>£$product_price</div>
                            </div>
                        </div>
                    </div>
                </div>";
            }
        }
    }
}

function getProductsByCategory(){
    if(isset($_GET['category'])){
        $category_id = $_GET['category'];

        global $con;    // gives access within function scope

        $get_category_products = "select * from products where category='$category_id'";
        $run_category_products = mysqli_query($con, $get_category_products);

        $count = mysqli_num_rows($run_category_products);

        if($count==0){
            echo"<h2 style='text-align: center; color:white; padding:5px;'>There are currently no products in this category.</h2>";
            exit();
        } else {
            while ($product_category_row = mysqli_fetch_array($run_category_products)) {
                $product_id = $product_category_row['product_id'];
                $product_name = $product_category_row['name'];
                $product_price = $product_category_row['price'];
                $product_image = $product_category_row['image'];

                echo " 
                <div class='col-xs-6 col-sm-4 col-md-4 col-lg-3 my-md-1'>
                    <div class='product-box rounded'>
                        <div>
                            <a href='details.php?product_id=$product_id' class='thumbnail'>
                                <img class='product-thumbnail img-responsive' src='admin/product_images/$product_image'>
                            </a>
                        </div>
                        <div>
                            <div class='product-title'><a href='details.php?product_id=$product_id'>$product_name</a></div>
                            <div class='product-price'>
                                <a href='index.php?product_id=$product_id' class='btn btn-primary btn-sm float-right'>Add To Cart</a>
                                <div class='price-text'>£$product_price</div>
                            </div>
                        </div>
                    </div>
                </div>";
        }
    }
    }
}

function getProductsByBrand(){
    if(isset($_GET['brand'])){
        $brand_id = $_GET['brand'];

        global $con;    // gives access within function scope

        $get_brand_products = "select * from products where brand='$brand_id'";
        $run_brand_products = mysqli_query($con, $get_brand_products);

        $count = mysqli_num_rows($run_brand_products);

        if($count==0){
            echo"<h2>There are currently no products by this brand.</h2>";
            exit();
        } else {

        while ($product_brand_row = mysqli_fetch_array($run_brand_products)) {
            $product_id = $product_brand_row['product_id'];
            $product_name = $product_brand_row['name'];
            $product_price = $product_brand_row['price'];
            $product_image = $product_brand_row['image'];

            echo " 
            <div class='col-xs-6 col-sm-4 col-md-4 col-lg-3 my-md-1'>
                <div class='product-box rounded'>
                    <div>
                        <a href='details.php?product_id=$product_id' class='thumbnail'>
                            <img class='product-thumbnail img-responsive' src='admin/product_images/$product_image'>
                        </a>
                    </div>
                    <div>
                        <div class='product-title'><a href='details.php?product_id=$product_id'>$product_name</a></div>
                        <div class='product-price'>
                            <a href='index.php?product_id=$product_id' class='btn btn-primary btn-sm float-right'>Add To Cart</a>
                            <div class='price-text'>£$product_price</div>
                        </div>
                    </div>
                </div>
            </div>";
        }
    }
    }
}

 
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
        echo "<button type='button' data-toggle='button' class='btn btn-primary btn-block'>$category_title</button>";
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
        //echo"<li><a href='#'>$category_title</a></li>";
        echo "<button type='button' data-toggle='button' class='btn btn-primary btn-block'>$brand_title</button>";
    }
}

function getProducts()
{
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
        <div class='col-xs-6 col-sm-3 col-md-2 column rounded product-box'>
        <a href='#' class='thumbnail'>
            <img class='product-thumbnail img-responsive' src='admin/product_images/$product_image'>
        </a>
        <div class='product-title'>$product_name</div>
        <div class='product-price'>
            <a href='#' class='btn btn-primary btn-sm float-right'>BUY</a>
            <div class='price-text'>£2.99</div>
        </div>
    </div>";

        /* TODO: used later
        $product_keywords = $product_row['keywords'];
        $product_description = $product_row['description'];
        */
    }
}

 
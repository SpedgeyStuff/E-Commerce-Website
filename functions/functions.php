<?php

$con = mysqli_connect("localhost","root","","e-com_website");   


//get the categories
function getCategories(){

    global $con;    // gives access within function scope

    $get_categories = "select * from categories";   // store results of SQL query into local variable "$get_categories"

    $run_categories = mysqli_query($con, $get_categories);

    while ($row_categories=mysqli_fetch_array($run_categories)){
        $category_id = $row_categories['category_id'];
        $category_title = $row_categories['category_title'];
        //echo"<li><a href='#'>$category_title</a></li>";
        echo"<button type='button' data-toggle='button' class='btn btn-primary btn-block'>$category_title</button>";
    }

}

//get the brand
function getBrands(){
    global $con;    // gives access within function scope

    $get_brands = "select * from brands";   // store results of SQL query into local variable "$get_categories"

    $run_brands = mysqli_query($con, $get_brands);

    while ($row_brands=mysqli_fetch_array($run_brands)){
        $brand_id = $row_brands['brand_id'];
        $brand_title = $row_brands['brand_title'];
        //echo"<li><a href='#'>$category_title</a></li>";
        echo"<button type='button' data-toggle='button' class='btn btn-primary btn-block'>$brand_title</button>";
    }
}

?>

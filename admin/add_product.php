<!DOCTYPE html>

<?php include("includes/db.php"); ?>

<html>

<head>
    <title>Add Product</title>
    <link rel="stylesheet" href="../dist/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../styles/main.css" />
</head>

<body>

    <div class="container page-content">
        <form class="bold-border table-wrapper" action="insert_product.php" method="post" enctype="multipart/form-data">
            <table class="table">
                <tr align="center">
                    <td colspan="8">
                        <h2>Insert Product</h2>
                    </td>
                </tr>

                <tr>
                    <td align="right">Product Title:</td>
                    <td><input type="text" name="product_title" /></td>
                </tr>
                <tr>
                    <td align="right">Product Category:</td>
                    <td><select name="product_category">
                            <option>Select a Category</option>

                            <?php

                            global $con;    // gives access within function scope

                            $get_categories = "select * from categories";   // store results of SQL query into local variable "$get_categories"

                            $run_categories = mysqli_query($con, $get_categories);

                            while ($row_categories = mysqli_fetch_array($run_categories)) {
                                $category_id = $row_categories['category_id'];
                                $category_title = $row_categories['category_title'];
                                echo "<option value='$category_id'>$category_title</option>";
                            }

                            ?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="right">Product Brand:</td>
                    <td><select name="product_brand">
                            <option>Select a Brand</option>

                            <?php

                            global $con;    // gives access within function scope

                            $get_brands = "select * from brands";   // store results of SQL query into local variable "$get_categories"

                            $run_brands = mysqli_query($con, $get_brands);

                            while ($row_brands = mysqli_fetch_array($run_brands)) {
                                $brand_id = $row_brands['brand_id'];
                                $brand_title = $row_brands['brand_title'];
                                echo "<option value='$brand_id'>$brand_title</option>";
                            }

                            ?>

                        </select></td>
                </tr>
                <tr>
                    <td align="right">Product Image:</td>
                    <td><input type="file" name="product_image" /></td>
                </tr>
                <tr>
                    <td align="right">Product Description:</td>
                    <td><textarea name="product_description" cols="30" rows="10"></textarea></td>
                </tr>
                <tr>
                    <td align="right">Product Keywords:</td>
                    <td><input type="text" name="product_keywords" /></td>
                </tr>
                <tr>
                    <td align="right">Product Price:</td>
                    <td><input type="text" name="product_price" /></td>
                </tr>
                <tr align="right">
                    <td colspan="8"><input type="submit" name="insert_post" value="Submit" /></td>
                </tr>
            </table>
        </form>
    </div>

</body>

</html> 
<!DOCTYPE html>

<?php include("functions/functions.php");?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>McKinley Comics Co</title>
    <link rel="stylesheet" href="dist/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="styles/main.css" />

</head>

<body>

    <!-- Banner -->
    <div class="container-fluid header">

        <!-- Logo -->
        <div class="row site-banner">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <a href="./index.html">
                    <img class="logo" src="img/logo.png">
                </a>
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

    <div class="container page-content bold-border rounded">
        <div class="row shop-wrapper">
            <!-- Sidebar -->
            <div class="col-sm-3 sidebar-wrapper">
                <!-- Search Box -->
                <div class="sidebar-section">
                    <div class="sidebar-heading"> Search Our Products: </div>
                    <div class="form-group">
                        <form method="get" action="results.php" enctype="multipart/form-data">
                            <div class="row">
                                <div class=col-sm-8>
                                    <input type="text" class="form-control" name="user_query"
                                        placeholder="Type here..." />
                                </div>
                                <div class="col-sm-3">
                                    <input type="submit" class="btn btn-primary" name="search" value="Go" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="sidebar-section">
                    <!-- TODO: might need to remove "data-toggle="button"" IN PHP FUNCTIONS ECHO STATEMENT-->
                    <div class="sidebar-heading"> Filter By Brand: </div>
                    <div class="row">
                        <div class="col-sm-12 btn-group-vertical">
                            <?php getBrands(); ?>
                        </div>
                    </div>
                </div>
                <div class="sidebar-section">
                    <div class="sidebar-heading"> Filter By Product: </div>
                    <div class="row">
                        <div class="col-sm-12 btn-group-vertical">
                            <?php getCategories(); ?>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Product display area-->
            <div class="col-sm-9 product-display-wrapper">
				<?php getProducts(); ?>
            </div>
        </div>
	</div>
	
	<!-- Footer -->
	<div class="footer">
		<div class="container-fluid">
			<h2 style="text-align: center; color:white;"> &copy; 2019 by Daniel McKinley for
				E-Commerce at
				City University London
			</h2>
		</div>
	</div>
	
    <!-- FIXME: JavaScript may not be working properly?-->
    <script src="dist/js/jquery-3.0.0.slim.min.js"></script>
    <script src="dist/js/bootstrap.js"></script>
</body>


</html>
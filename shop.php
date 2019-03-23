<!DOCTYPE html>

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
    <div class="container-fluid">

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
                        <a class="nav-link active" href="#">Shop</a>
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

    <div class="container page-content">
        <div class="row">
            <div class="col-sm-3 sidebar-wrapper" style="background-color: blue; height: 200px;">

            </div>
            <div class="col-sm-9 product-display-wrapper" style="background-color: red; height: 200px;">

            </div>
        </div>
    </div>


    <!--FIXME: JavaScript may not be working properly?-->
    <script src="dist/js/jquery-3.0.0.slim.min.js"></script>
    <script src="dist/js/bootstrap.js"></script>
</body>

</html> 
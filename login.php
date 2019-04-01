<!DOCTYPE html>

<?php 
include("functions/functions.php");
include("includes/db.php");
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
                                <a class="nav-link active" href="./about.html">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="./login.php">Login/Sign Up</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-sm-6">

                    </div>
                    <div class="col-sm-6 page-content bold-border rounded my-md-1" style="background: whitesmoke;">
                        <form action="login.php" method="post" enctype="multipart/form-data">
                            <table align="right">
                                <tr>
                                    <td>
                                        <h2>Create Account</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">Forename:</td>
                                    <td><input type="text" name="c_forename" required /></td>
                                </tr>
                                <tr>
                                    <td align="right">Surname:</td>
                                    <td><input type="text" name="c_surname" required /></td>
                                </tr>
                                <tr>
                                    <td align="right">Email:</td>
                                    <td><input type="text" name="c_email" required /></td>
                                </tr>
                                <tr>
                                    <td align="right">Password:</td>
                                    <td><input type="text" name="c_password" required /></td>
                                </tr>
                                <tr>
                                    <td align="right">Address:</td>
                                    <td><textarea cols="22" rows="5" name="c_address" required> </textarea></td>
                                </tr>
                                <tr>
                                    <td align="center" colspan="1"><input type="submit" name="register" value="Create" /></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
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

    <!--FIXME: JavaScript may not be working properly?-->
    <script src="dist/js/jquery-3.0.0.slim.min.js"></script>
    <script src="dist/js/bootstrap.js"></script>
</body>

</html>

<?php 
if (isset($_POST['register'])) {
	$ip = getIp();

	$c_forename = $_POST['c_forename'];
	$c_surname = $_POST['c_surname'];
	$c_email = $_POST['c_email'];
	$c_password = $_POST['c_password'];
	$c_address = $_POST['c_address'];

	$insert_c = "insert into user (email, forename, surname, address, password, admin) VALUES ('$c_email',$c_forename', '$c_surname', '$c_address', '$c_password', '0')";
	$run_c = mysqli_query($con, $insert_c);

	if ($run_c) {
		echo "<script>alert('Registration succesful!')</script>";
	}
}
?> 
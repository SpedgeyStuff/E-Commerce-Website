<?php
$con = mysqli_connect("localhost","root","","e-com_website");

if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL server: " . mysqli_connect_error();
}
?>
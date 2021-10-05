<?php 

$server = "localhost";
$user = "vighnesh";
$pass = "Vighnesh.123";
$database = "blog";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}


?>
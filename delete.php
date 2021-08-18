<?php

include ('config.php');

$pid= $_GET['pid'];
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
$result=mysqli_query($conn,"DELETE from  post where pid='$pid'");
if($result){
    echo "<script>alert('Successfully Updated.')</script>";
   
}
else{
    echo "<script>alert('updation failed.')</script>";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Homepage</title>
        <link rel="stylesheet" href="createpost.css">
    </head>
    <body>
        <img src="">
        <nav>
            <img src="PicsArt_07-31-02.19.24.png" class="logo">
            <ul>
                <li><a href="index.php" class="active">HOME</a></li>
                <li><a href="welcome.php">DASHBOARD</a></li>
                <li><a href="#">CAREER</a></li>
                <li><a href="#">ABOUT US</a></li>
                <li><a href="deletepost.php">DELETE MENU</a></li>
                
            </ul>
        </nav>
    </body>
    </html>
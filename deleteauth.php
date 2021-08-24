<?php

include ('config.php');


session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
$id= $_GET['id'];
$result=mysqli_query($conn,"DELETE from  users where id='$id'");
if($result){
    echo "<script>alert('Successfully Deleted.')</script>";
   
}
else{
    echo "<script>alert('Deletion failed.')</script>";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Homepage</title>
        <link rel="stylesheet" href="css/createpost.css">
        <link rel="stylesheet" href="css/footer.css">  
    </head>
    <body>
        <img src="">
        <nav>
            <img src="css/images/logo2.png" class="logo">
            <ul>
                <li><a href="index.php" class="active">HOME</a></li>
                <li><a href="welcome.php">DASHBOARD</a></li>
                <li><a href="#">CAREER</a></li>
                <li><a href="#">ABOUT US</a></li>
                <li><a href="deletepost.php">DELETE MENU</a></li>
                
            </ul>
        </nav>
        <?php include('footer.php');?>
    </body>
    </html>
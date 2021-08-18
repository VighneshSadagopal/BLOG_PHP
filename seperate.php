<?php

include ('config.php');
session_start();



$pid= $_GET['pid'];



$query=mysqli_query($conn,"SELECT * from post where pid=$pid ");
while($res=mysqli_fetch_array($query)){

    $author=$res['author'];
    $title=$res['title'];
    $description= $res['description'];
    $short= $res['short'];
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Homepage</title>
        <link rel="stylesheet" href="seperate.css">
        <script src="https://kit.fontawesome.com/ec41712638.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <img src="">
        <nav>
            <img src="PicsArt_07-31-02.19.24.png" class="logo">
            <ul>
                <li><a href="index.php" >HOME</a></li>
                <li><a href="#">CAREER</a></li>
                <li><a href="#">ABOUT</a></li>
                <li><a href="login.php">LOGIN</a></li>
                <li><a href="register.php">REGISTER NOW</a></li>
                
            </ul>
        </nav>
        <div class="container">
            <form action="" method="post" class="login-email">
               
                <div class="input-group">
               <h1> <input type="text" value=<?php echo $author?> name="author" readonly></h1>
                </div>
               
                <div class="input-group">
                <input type="text" placeholder="Title Name"value=<?php echo $title?> name="title" readonly>
                </div>
             
                <div class="input-group">
                <textarea readonly cols="60"  resize:none, overflow:hidden><?php echo $description ?></textarea>
                </div>
               
                <script src="nav_responsive.js"></script>
        </body>
    </html>
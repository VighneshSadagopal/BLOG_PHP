<?php

include 'config.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login1.php");
}

?>




<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Homepage</title>
        <link rel="stylesheet" href="homepage.css">
        
    </head>
    <body vlink="black">
        <img src="">
        <nav>
            <img src="PicsArt_07-31-02.19.24.png" class="logo">
            <ul>
                <li><a href="#" class="active">HOME</a></li>
                <li><a href="login1.php">DASHBOARD</a></li>
                <li><a href="#">CAREER</a></li>
                <li><a href="#">ABOUT US</a></li>
                <li><a href="logout.php"><i class="tiny material-icons">power_settings_new</i>&nbsp;LOGOUT</a></li>
               
                
            </ul>
        </nav>
        <div class="post">
            
    <?php
             
             $query = "SELECT * FROM post ORDER BY pid DESC";
 $query_run= mysqli_query($conn, $query);
 $check_post= mysqli_num_rows($query_run) > 0;

 if($check_post)
 {
     while($res = mysqli_fetch_array($query_run))
     {

 ?>


 <div class="container">

     <h1><?php echo $res['title'] ?></h1><br>
    <p id="auth">~<?php echo $res['author'] ?></p>
     <p><?php echo $res['short'] ?></p>
     <p id="read"><?php echo "<a href=\"seperate1.php?pid=$res[pid]\">"?>Read more...</a></p>

 </div>

 <?php

 
     }

 }
 else{
     echo " NO POST FOUND";
 }


 ?>
        </div>
    </body>
    </html>
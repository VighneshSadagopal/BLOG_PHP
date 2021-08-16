<?php

include 'config.php';
session_start();



?>




<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Homepage</title>
        <link rel="stylesheet" href="homepage.css">
        <script src="https://kit.fontawesome.com/ec41712638.js" crossorigin="anonymous"></script>
        
    </head>
    <body >
       <div class="image">
        <div class="navbar" id='nav'>
        <div class="content">
          <div class="logo">
            <img src="logo2.png">
          </div>
          <ul class="menu-list">
            <div class="icon cancel-btn">
              <i class="fas fa-times"></i>
            </div>
            <li><a href="homepage.css">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Carrer</a></li>
            <li><a href="#">Contact Us</a></li>
            
            <li><a href="login1.php" id="right">Login/Register</a></li>
           
           
          </ul>
          <div class="icon menu-btn">
            <i class="fas fa-bars"></i>
          </div>
        </div>
</div>
    </div>
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

     <h1><?php echo $res['title'] ?></h1><br><br>
   
     <p><?php echo $res['short'] ?> </p>
    <p id="read"><?php echo "<a href=\"seperate.php?pid=$res[pid]\">"?>Read more...</a><p id="auth">~<?php echo $res['author'] ?></p></p>

 </div>

 <?php

 
     }

 }
 else{
     echo " NO POST FOUND";
 }


 ?>
        </div>
        <div class="sidebar">
          
      </div>
        <script src="index.js"></script>
        <script src="nav_responsive.js"></script>
    </body>
    </html>
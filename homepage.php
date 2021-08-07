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
        <style>
            a{
                text-decoration:none;
                color:black;
            }
            
            </style>
    </head>
    <body vlink="black">
        <img src="">
        <nav>
            <img src="PicsArt_07-31-02.19.24.png" class="logo">
            <ul>
                <li><a href="#" class="active">HOME</a></li>
                <li><a href="index.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
                
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

     <h1><?php echo"<a href=\"seperate.php?pid=$res[pid]\"><?a>".$res['title'] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;~<?php echo $res['author'] ?></h1><br>
     <h3> Short desc:</h3>
     <p><?php echo $res['short'] ?></p>


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
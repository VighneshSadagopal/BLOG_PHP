<?php

include 'config.php';
session_start();

if (isset($_SESSION['username'])){
  $id=$_SESSION['id'];
}
else{
   header("Location: login.php");
}

$author=$_SESSION['username'];
$queryy=mysqli_query($conn,"SELECT * from users where  username='$author' ");
            
if ($queryy->num_rows > 0){

while($row = mysqli_fetch_array($queryy))
{


?>




<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Homepage</title>
        <link rel="stylesheet" href="css/homepage.css">
        
    </head>
    <body vlink="black">
     
        <div class="image">
        <h1>WELCOME &nbsp;&nbsp;<?php echo $author ?></h1>
         <a href="#post" id="bb">Check Out</a>
        <div class="navbar" id='nav'>
        <div class="content">
          <div class="logo">
            <img src="css/images/logo2.png">
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
            
            <li><a href="login.php" id="right">Dashboard</a></li>
           
           
          </ul>
          <div class="icon menu-btn">
            <i class="fas fa-bars"></i>
          </div>
        </div>
</div>
    </div>
        <div class="post" id="post">
            
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

}}
 ?>
        </div>
        <script src="css/js/nav_responsive.js"></script>
    </body>
    </html>
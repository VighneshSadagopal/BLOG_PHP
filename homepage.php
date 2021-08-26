<?php

include 'config.php';
session_start();


if (isset($_SESSION['username'])){
  $id=$_SESSION['id'];
}
else{
   header("Location: login.php");
}
?>




<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Homepage</title>
        <link rel="stylesheet" href="css/homepage.css">
        <link rel="stylesheet" href="css/carousel.css">
        <link rel="stylesheet" href="css/footer.css">
        <link rel="stylesheet" href="css/nav.css">
        <script src="https://kit.fontawesome.com/ec41712638.js" crossorigin="anonymous"></script>
        
    </head>
    <body >


   <?php include('nav.php');?>
   <div class="right">
          <li><a href="login.php" id="name"  >Dashboard</a>
      
              </div>
              <div class="icon menu-btn">
                <i class="fas fa-bars" ></i>
              </div>
            </div>
          </div>
      <div class="whole">
      <div class="carousel">
      <div class="carousel__item carousel__item--visible">
        <img src="css/images/background.png" />
        <h1>WELCOME <?php echo $_SESSION['username']?></h1>
         <a href="#post" id="bb">Lets Dive In</a>
      </div>
      <?php
                    
                    $query = "SELECT * FROM post ORDER BY pid DESC";
                    $query_run= mysqli_query($conn, $query);
                    $check_post= mysqli_num_rows($query_run) > 0;
      
                    if($check_post)
                    {
                      while($res = mysqli_fetch_array($query_run))
                      {
                        $image=$res['images'];
      
                  ?>
      
      <div class="carousel__item ">
        <img src="images/<?php echo $image ?>" />
        <h1><?php echo $res['title'] ?></h1><br><br>
      </div>
      <?php 
                      }}
      ?>
      

      <div class="carousel__actions">
      <i class="fas fa-chevron-left"id="carousel__button--prev" aria-label="Previous slide"></i>
        <i class="fas fa-chevron-right"   id="carousel__button--next" aria-label="Next slide"></i>
      </div>
      </div>

      <div class="post" id ="post">
            
            <?php
                    
              $query = "SELECT * FROM post ORDER BY pid DESC";
              $query_run= mysqli_query($conn, $query);
              $check_post= mysqli_num_rows($query_run) > 0;

              if($check_post)
              {
                while($res = mysqli_fetch_array($query_run))
                {
                  $image=$res['images'];

            ?>


          <div class="container">
            <img src="images/<?php echo $image?>">
            <h1><?php echo $res['title'] ?></h1><br><br>
            <p><?php echo $res['short'] ?> </p>
            <p id="read"><?php echo "<a href=\"seperate.php?pid=$res[pid]\">"?>Read more...</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>~<?php echo $res['author'] ?></span></p>
          </div>

            <?php
              }
              }
              else{
                  echo " NO POST FOUND";
              }


            ?>
          
   
        </div>
      </div>


      
        


</body>
<script src="css/js/carousel.js"></script>
<script src="css/js/index.js"></script>
        <script src="css/js/nav_responsive.js"></script>
<html>
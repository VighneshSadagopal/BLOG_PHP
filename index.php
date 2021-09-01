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

  <link rel="stylesheet" href="scss/carousel.css">
  <link rel="stylesheet" href="css/footer.css">
  <link rel="stylesheet" href="scss/nav.css">
  <link rel="stylesheet" href="scss/container.css">
  <link rel="stylesheet" href="scss/style.css">

  <script src="https://kit.fontawesome.com/ec41712638.js" crossorigin="anonymous"></script>

</head>

<body>


  <?php include('nav.php'); ?>
  <div class="right">

    <?php
    if (isset($_SESSION['username'])) {
    ?> <li><a href="login.php">Dashboard</a></li>
    <?php
    } else { ?><li><a href="login.php" id="name">LOGIN</a></li><?php } ?>

  </div>

  </ul>
  <div class="icon menu-btn">
    <i class="fas fa-bars"></i>

  </div>
  </div>
  </div>
  <div class="whole">
    <div class="carousel">
      <div class="carousel__item carousel__item--visible">
        <img src="css/images/background.png" />
        <h1>WELCOME TO THE OCEAN</h1>
        <a href="#post" id="bb">Lets Dive In</a>
      </div>
      <?php

      $query = "SELECT * FROM post ORDER BY pid DESC";
      $query_run = mysqli_query($conn, $query);
      $check_post = mysqli_num_rows($query_run) > 0;

      if ($check_post) {
        while ($res = mysqli_fetch_array($query_run)) {
          $image = $res['images'];

      ?>

          <div class="carousel__item ">
            <img src="images/<?php echo $image ?>" />
            <h1><?php echo $res['title'] ?></h1><br><br>
          </div>
      <?php
        }
      }
      ?>


      <div class="carousel__actions">
        <i class="fas fa-chevron-left" id="carousel__button--prev" aria-label="Previous slide"></i>
        <i class="fas fa-chevron-right" id="carousel__button--next" aria-label="Next slide"></i>
      </div>

    </div>

    <?php include('container.php'); ?>
  </div>







</body>
<script src="css/js/carousel.js"></script>
<script src="css/js/nav_responsive.js"></script>

<html>
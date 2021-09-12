<?php

include 'templates/classes/autoload.php';
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


  <div class="navbar" id="nav">
    <div class="content1">
      <div class="logo">
        <img src="css/images/logo2.png">
      </div>
      <ul class="menu-list">
        <div class="icon cancel-btn">
          <i class="fas fa-times"></i>
        </div>
        <li><a href="index.php">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Carrer</a></li>
        <li><a href="#">Contact Us</a></li>
        <div class="right">

          <?php
          if (isset($_SESSION['username'])) {
          ?> <li><a href="templates/login/login.php">Dashboard</a></li>
          <?php
          } else { ?><li><a href="templates/login/login.php" id="name">LOGIN</a></li><?php } ?>

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

      $p = new Post;
      $sql = $p->getAllPost();

      foreach ($sql as $row) {
        $image = $row['images'];

      ?>

        <div class="carousel__item ">
          <img src="images/<?php echo $image ?>" />
          <h1><?php echo $row['title'] ?></h1><br><br>
        </div>
      <?php
      }

      ?>


      <div class="carousel__actions">
        <i class="fas fa-chevron-left" id="carousel__button--prev" aria-label="Previous slide"></i>
        <i class="fas fa-chevron-right" id="carousel__button--next" aria-label="Next slide"></i>
      </div>

    </div>

    <form method="post">
      <select id="search" name="category">
        <option value="">Search By Category</option>
        <option value="social">Social</option>
        <option value="anime">Anime</option>
        <option value="food">Food</option>
        <option value="gaming">Gaming</option>
        <option value="travel">Travel</option>
        <option value="sports">Sports</option>
      </select>
      <button type="submit" name="show" id="show"><i class="fas fa-search"></i></button>
    </form>
    <div class="post" id="post">


      <?php
      $category = "";
      if (isset($_POST['show'])) {
        $category = $_POST['category'];
      }
      if (!$category == "") {


        $sql = $p->getAllPostByCategory($category);

        foreach ($sql as $row) {
          $image = $row['images'];

      ?>

          <div class="container">
         
              <img src="images/1630508748052.png" id="tag" disabled>
              <p id="category"><?php echo $row['category'] ?> </p>
              <div id="zoom">
          <img src="images/<?php echo $image ?>">   </div>
              <h1><?php echo $row['title'] ?></h1><br><br>
              <p><?php echo $row['short'] ?> </p>
              <p id="read"><?php echo "<a href=\"seperate1.php?pid=$row[pid]\">" ?>Read more</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>~<?php echo $row['author'] ?></span></p>
            </div>


          <?php
        }
      } else {

        $sql = $p->getAllPost();

        foreach ($sql as $row) {
          $image = $row['images'];

          ?>

            <div class="container">

              <img src="images/1630508748052.png" id="tag" disabled>
              <p id="category"><?php echo $row['category'] ?> </p>
              <div id="zoom">
                <img src="images/<?php echo $image ?>">
              </div>
              <h1><?php echo $row['title'] ?></h1><br><br>
              <p><?php echo $row['short'] ?> </p>
              <p id="read"><?php echo "<a href=\"seperate1.php?pid=$row[pid]\">" ?>Read more</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>~<?php echo $row['author'] ?></span></p>

            </div>

        <?php

        }
      }



        ?>




        <?php include('templates/headers/footer.php'); ?>
          </div>
    </div>







</body>
<script src="css/js/carousel.js"></script>
<script src="css/js/nav_responsive.js"></script>

<html>
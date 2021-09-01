<?php
include('config.php');
session_start();

$category = $_POST['category']; 
if (isset($_POST['show'])) {

 



}

?>






<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="scss/nav.css">
  <link rel="stylesheet" href="scss/container.css">
  <link rel="stylesheet" href="scss/category.css">


  <script src="https://kit.fontawesome.com/ec41712638.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/footer.css">

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php include('nav.php'); ?>
  <div class="right">
    <li><a href="#" id="name"><?php echo $_SESSION['username'] ?>&nbsp;<i class="fas fa-caret-down"></i></a>
      <ul>
        <li><a href="authinfo.php"> Author info</a></li>
        <li><a href="login.php"> Dashboard</a></li>
        <li><a href="logout.php"><i class="fas fa sign-out alt"></i>&nbsp;LOGOUT</a></li>
      </ul>
    </li>

  </div>

  </ul>
  <div class="icon menu-btn">
    <i class="fas fa-bars"></i>

  </div>
  </div>
  </div>
  </div>
  <div class="image">



  </div>
  <form method="post">

    <select id="category" name="category">
      <option value="">Select Type for your blog</option>
      <option value="social">Social</option>
      <option value="cooking">Cooking</option>
      <option value="food">Food</option>
      <option value="gaming">Gaming</option>
      <option value="travel">Travel</option>
      <option value="sports">Sports</option>



    </select>
    <button type="submit" name="show" id="show"><i class="fas fa-search"></i></button>
  </form>



  <div class="post" id="post">


    <?php
    if(!$category==""){

     
      $query = "SELECT * FROM post WHERE category='$category' ORDER BY pid DESC";
      $query_run = mysqli_query($conn, $query);
      $check_post = mysqli_num_rows($query_run) > 0;

      if ($check_post) {
        while ($res = mysqli_fetch_array($query_run)) {
          $image = $res['images'];

    ?>


          <div class="container">
            <img src="images/<?php echo $image ?>">
            <h1><?php echo $res['title'] ?></h1><br><br>
            <p><?php echo $res['short'] ?> </p>
            <p id="read"><?php echo "<a href=\"seperate.php?pid=$res[pid]\">" ?>Read more...</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>~<?php echo $res['author'] ?></span></p>
          </div>

        <?php

        }
      }
    }else{
      $query = "SELECT * FROM post ORDER BY pid DESC";
      $query_run = mysqli_query($conn, $query);
      $check_post = mysqli_num_rows($query_run) > 0;

      if ($check_post) {
        while ($res = mysqli_fetch_array($query_run)) {
          $image = $res['images'];

    ?>


          <div class="container">
            <img src="images/<?php echo $image ?>">
            <h1><?php echo $res['title'] ?></h1><br><br>
            <p><?php echo $res['short'] ?> </p>
            <p id="read"><?php echo "<a href=\"seperate.php?pid=$res[pid]\">" ?>Read more...</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>~<?php echo $res['author'] ?></span></p>
          </div>

        <?php

        }
      }
    }
  
   
    ?>




    <?php include('footer.php'); ?>
  </div>


</body>

</html>
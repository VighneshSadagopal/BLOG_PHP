<?php
include('../classes/autoload.php');
session_start();



?>






<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="../../css/nav.css">
  <link rel="stylesheet" href="../../css/container.css">
  <link rel="stylesheet" href="../../css/category.css">


  <script src="https://kit.fontawesome.com/ec41712638.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/footer.css">

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script>
    $(document).click(function(){
      $("#category").load("#post");
    });
  </script>
</head>

<body>
  <?php include('../headers/nav.php'); ?>
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



 <?php include 'container.php'?>
  </div>


</body>

</html>
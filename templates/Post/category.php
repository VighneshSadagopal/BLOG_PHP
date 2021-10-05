<?php
include('../classes/autoload.php');
if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 1;
}
session_start();

if (isset($_SESSION['username'])) {
  $id = $_SESSION['id'];
} else {
  header("Location: ../login/login.php");
}
if(!$category = $_POST['category']){
  $category = "";
}
$image = $_SESSION['profilepic'];
?>






<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="../../css/nav.css">
  <link rel="stylesheet" href="../../css/container.css">
  <link rel="stylesheet" href="../../css/footer.css">
  <link rel="stylesheet" href="../../css/style.css">



  <script src="https://kit.fontawesome.com/ec41712638.js" crossorigin="anonymous"></script>


  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  
</head>

<body>
  <?php include('../headers/nav.php'); ?>
  <div class="right">
  <img src="../../images/<?php echo $image ?>" id =" clipped" class="extra">
    <li><a href="#" id="name"><?php echo $_SESSION['username'] ?>&nbsp;<i class="fas fa-caret-down"></i></a>
      <ul>
        <li><a href="../Authors/account.php"> Details</a></li>
        <li><a href="../login/login.php"> Dashboard</a></li>
        <li><a href="../login/logout.php"><i class="fas fa sign-out alt"></i>&nbsp;LOGOUT</a></li>
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
      <option value="anime">Anime</option>
      <option value="food">Food</option>
      <option value="gaming">Gaming</option>
      <option value="travel">Travel</option>
      <option value="sports">Sports</option>



    </select>
    <button type="submit" name="show" id="show"><i class="fas fa-search"></i></button>
  </form>



  <div class="wrap-content">
  <div class="wrap-1">
    <?php 

$dash = "category.php";
include('../Post/container.php'); 

?>
</div>
<div class="side">
     

      <ul>


        <li>
          <h2>Recent Post <i class="fas fa-caret-down"></i></h2>
          <?php
          $sql = $p->getRecent();

          foreach ($sql as $row) {
            $image = $row['images'];
          ?>
            <ul>
              <l1>
                <div class="recent">
                  <div class="container">

                    <img src="../../images/<?php echo $image ?>">
                    <h1><?php echo $row['title'] ?></h1>
                  </div>
                </div>
              </l1>
            </ul>

          <?php } ?>
        </li>
        <li>
          <h2>Trending Topics<i class="fas fa-caret-down"></i></h2>
        </li>
        <li>
          <h2>Authors <i class="fas fa-caret-down"></i></h2>
        </li>
        <li>
          <h2>Most Liked <i class="fas fa-caret-down"></i></h2>
        </li>

      </ul>

    </div>

  </div>
  </div>

    <div class="foot more">
        <?php include('../headers/footer.php');
        ?>
    </div>
    <script src="../../css/js/nav_responsive.js"></script>

    <script src="../../css/js/loadcreate.js"></script>
  
    <script>
  
  </script>
        </body>

        </html>
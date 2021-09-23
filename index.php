<?php

include 'templates/classes/autoload.php';
session_start();

if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 1;
}

?>




<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Homepage</title>

  <link rel="stylesheet" href="css/carousel.css">
  <link rel="stylesheet" href="css/old/footer.css">
  <link rel="stylesheet" href="css/nav.css">
  <link rel="stylesheet" href="css/container.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

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
        <li><a href="index">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Carrer</a></li>
        <li><a href="#">Contact Us</a></li>
        <div class="right">

          <?php
          if (isset($_SESSION['username'])) {
            $image = $_SESSION['profilepic'];
          ?>
            <img src="images/<?php echo $image ?>" id=" clipped" class="extra">
            <li><a href="templates/login/login" id="name">Dashboard</a></li>
          <?php
          } else { ?><li><a href="templates/login/login" id="name">LOGIN</a></li><?php } ?>

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
        <a href="#" id="bb">Lets Dive In</a>
      </div>


      <div class="carousel__item ">
        <img src="css/images/constilation.gif">
        <h1>Search for blogs of your Liking</h1>
        <a href="#featured" id="bb">Check Out</a>
      </div>
      <div class="carousel__item ">
        <img src="css/images/blog2.jpg">
        <h1>Become an author and help in growing the knowledge</h1>
        <a href="#" id="bb">Lets See</a>
      </div>


      <div class="carousel__actions">
        <i class="fas fa-chevron-left" id="carousel__button--prev" aria-label="Previous slide"></i>
        <i class="fas fa-chevron-right" id="carousel__button--next" aria-label="Next slide"></i>
      </div>

    </div>
    <div class="tags">
      <h1>Featured Post</h1>
    </div>
    <div class="featured" id="featured">
      <div class="wrap">
        <div class="wrap-1 extra">
          <div class="feature1">
            <span><i class="fas fa-circle"></i>Anime</span>
            <span2><i class="fas fa-star"></i></span2>
            <div id="zoom">
              <img src="images/Boruto-Anime-and-Manga-Featured.jpg">

            </div>
            <h1>Can Boruto surpass naruto and saskue</h1>

          </div>
          <div class="feature2">
            <span><i class="fas fa-circle"></i>Travel</span>
            <span2><i class="fas fa-star"></i></span2>

            <div id="zoom">
              <img src="images/Lonavalamh.jpg">
            </div>
            <h1>Lonavala Best Trip Now</h1>
          </div>
          <div class="feature3">
            <span><i class="fas fa-circle"></i>Social</span>
            <span2><i class="fas fa-star"></i></span2>
            <div id="zoom">
              <img src="images/earth.jpg">
            </div>
            <h1>Planet Earth</h1>
          </div>
          <div class="feature4">
            <span><i class="fas fa-circle"></i>Sports</span>
            <span2><i class="fas fa-star"></i></span2>
            <div id="zoom">
              <img src="images/transfers-messi.jpg">
            </div>
            <h1>Messi Transfer excites</h1>
          </div>
        </div>
        <div class="feature5">
          <span><i class="fas fa-circle"></i>Food</span>
          <span2><i class="fas fa-star"></i></span2>
          <div id="zoom">
            <img src="images/food.jpg">
          </div>
          <h1>10 Protien foods good for health</h1>
        </div>
      </div>
    </div>
    <div class="aboutus" id="about">
      <h1>About Us</h1>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur reiciendis quam architecto animi cum perspiciatis porro, necessitatibus, laboriosam vitae provident earum modi molestias magnam, ullam doloribus ad quidem iusto. Harum nihil vel hic soluta laudantium consequatur vitae culpa, aut porro sint impedit? Modi quaerat voluptatum eum explicabo voluptas officia minima. Minima ducimus, necessitatibus ea perferendis adipisci, sint eaque voluptatem minus quod neque deserunt accusantium maiores. Quasi ipsam possimus magni. Aperiam amet culpa facilis beatae aliquam inventore animi nesciunt assumenda. Natus, placeat blanditiis repellat beatae ducimus esse officiis? Nihil alias blanditiis labore cumque consequatur tempore beatae, impedit, dignissimos natus illum repellat.</p>
    </div>

    <div class="tags1">
      <h1>All Post</h1>
    </div>
    <div class="wrap-content">
      <div class="wrap-1">
      <div class="dash_post" id="post">


        <?php
        $p = new Post;
        $sql = $p->getAllPost();
        $count = $p->rowCount();
        $per_page = 4;
        $nom_of_pages = ceil($count / $per_page);
        $start = ($page - 1) * $per_page;

        $sql1 = $p->getPerPost($start, $per_page);

        foreach ($sql1 as $row) {
          $image = $row['images'];
          $short = substr($row['description'], 0, 255);
          $desc = trim($short, ("/\r|\n/"));

        ?>


          <div class="container">
            <div id="zoom">
              <span1><i class="fas fa-circle"></i><?php echo $row['category'] ?> </span1>

              <img src="images/<?php echo $image ?>">

              <div class="content">
                <h1><?php echo $row['title'] ?></h1><br><br>
                <p><?php echo $desc ?> </p>
                <div class="authread">
                <p id="read"><?php echo "<a href=\"templates/Post/seperate1.php?pid=$row[pid]\">" ?>Read more</a></p>
                <span>~<?php echo $row['author'] ?></span>
                </div>
              </div>
            </div>
          </div>

        <?php

        }
        ?>






      </div>
      </div>
      <div class="side view">

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

                      <img src="images/<?php echo $image ?>">
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
    <ul class="pagination">

<?php
for ($i = 1; $i <= $nom_of_pages; $i++) {
?>
  <li <?php
      if ($page == $i) {
        echo "class='active'";
      }
      ?>><a href="<?php echo $i; ?>"><?php echo $i; ?></a></li>
<?php
}
?>

</ul>
  </div>







  <div class="foot">
    <?php include('templates/headers/footer.php');
     ?>
  </div>
</body>
<script src="css/js/carousel.js"></script>
<script src="css/js/nav_responsive.js"></script>

<html>
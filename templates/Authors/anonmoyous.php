<?php

include '../classes/autoload.php';
include '../classes/config.php';

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
if (isset($_REQUEST['info'])) {

    if ($_REQUEST['info'] == "login") {
        echo "<div id='alert'><small1> Login Successfull&nbsp;&nbsp;&nbsp;</small1></div>";
    }
}
if (isset($_REQUEST['info'])) {

    if ($_REQUEST['info'] == "success") {
        echo "<div id='alert'><small1>Wow Registration successful</small1></div>";
    }
}
$u = new Users;


$author = $_SESSION['username'];


$query =  $u->getUserByName($author);

if ($u->rowcount() > 0) {

    foreach ($query as $row) {
        $image = $row['profilepic']; ?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Welcome</title>
            <link rel="stylesheet" href="../../css/style.css">
            <link rel="stylesheet" href="../../css/container.css">
            <link rel="stylesheet" href="../../css/nav.css">
            <link rel="stylesheet" href="../../css/footer.css">
            <link rel="stylesheet" href="../../css/notify.css">
            <script src="https://kit.fontawesome.com/ec41712638.js" crossorigin="anonymous"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
            <script>
                setTimeout(fade_out, 5000);

                function fade_out() {
                    $("#alert").fadeOut().empty();
                }
            </script>
            <script src= "https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.0/FileSaver.min.js"></script>

        </head>

        <body vlink=" black">
            <p class="unauthenticate"><a href="../Admin/authenticate.php">Join US</a><i class="fas fa-circle"></i></p>
            <div class="image">
                <h1>WELCOME &nbsp;<?php echo $author ?></h1>
                <a href="#create" id="bb">Check Out</a>
                <?php include('../headers/nav.php'); ?>



                <div class="right">
                    <img src="../../images/<?php echo $image ?>" id =" clipped" class="extra">
                    <li><a href="#" id="name"><?php echo $_SESSION['username'] ?>&nbsp;<i class="fas fa-caret-down"></i></a>
                        <ul>

                            <li><?php echo "<a href=\"account.php?id=$row[id]\">" ?>Details</a></li>
                            
                            <li><a href="../Post/category.php">Category</a></li>
                            <li><a href="../login/logout.php"><i class="tiny material-icons">power_settings_new</i>&nbsp;Logout</a></li>
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




           
<div class="wrap-content">
  <div class="wrap-1">
    <?php
    }
}
$dash = 'welcome.php';

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
<?php

include '../classes/autoload.php';
$id = $_GET['id'];
session_start();

if ($_SESSION['id'] !==  $id){
    header("Location: ../login/login.php");
} 

$u = new Users;

$author = $_SESSION['username'];
$query =  $u->getUserByName($author);

if ($u->rowcount() > 0) {

    foreach ($query as $row) {

        $image = $row['profilepic'];
?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Welcome</title>
            <link rel="stylesheet" href="../../css/style.css">
            <link rel="stylesheet" href="../../css/footer.css">
            <link rel="stylesheet" href="../../css/nav.css">
            <link rel="stylesheet" href="../../css/container.css">
            <script src="https://kit.fontawesome.com/ec41712638.js" crossorigin="anonymous"></script>
        </head>

        <body vlink=" black">
            <div class="image" id="img">
                <h1>WELCOME &nbsp;&nbsp;<?php echo $author ?></h1>
                <a href="#create" id="bb">Check Out</a>
                <?php include('../headers/nav.php'); ?>


                <div class="right">
                <img src="../../images/<?php echo $image ?>" id =" clipped" class="extra">
                    <li><a href="#" id="name"><?php echo $_SESSION['username'] ?>&nbsp;<i class="fas fa-caret-down"></i></a>
                        <ul>
                            <li><?php echo "<a href=\"account.php?id=$row[id]\">" ?>Details</a></li>
                            <li><a href="../login/login.php">Dashboard</a></li>
                            <li><a href="../login/logout.php"><i class="tiny material-icons">power_settings_new</i>&nbsp;LOGOUT</a></li>
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
            <?php echo "<a href=\"../Post/editpost.php?id=$id\">" ?><i class="fas fa-pen-square" id="edit"></i></a>
            <div class="dash_post">
            <?php
        }
    }
    $p = new Post;
    $id = $_GET['id'];
    $author = $_SESSION['username'];
    $query =  $p->getPostById($id);
    $count = $p->rowcount();
    $per_page = 2;
    $nom_of_pages = ceil($count / $per_page);
    if ( $count > 0) {
    
        foreach ($query as $row) {
    
            $images = $row['images'];
            $short = substr($row['description'], 0, 255);
             $desc = trim($short, ("/\r|\n/"));
            ?>
               

               <div class="container">
        <div id="zoom">
          <span1><i class="fas fa-circle"></i><?php echo $row['category'] ?> </span1>

          <img src="../../images/<?php echo $images ?>">

          <div class="content">
            <h1><?php echo $row['title'] ?></h1><br><br>
            <p><?php echo $desc ?> </p>
            <div class="authread">
              <p id="read"><?php echo "<a href=\"../Post/seperate1.php?pid=$row[pid]\">" ?>Read more</a></p>
                <span>~<?php echo $row['author'] ?></span>
            </div>
          </div>
        </div>
      </div>

    <?php

    }


        }
     else {
        echo " NO POST FOUND";
    }


        ?>

        <?php include('../headers/footer.php'); ?>
            </div>
            <script src="../../css/js/nav_responsive.js"></script>

        </body>

        </html>
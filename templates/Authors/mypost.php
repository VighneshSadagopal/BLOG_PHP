<?php

include '../classes/autoload.php';

session_start();

if (isset($_SESSION['username'])) {
} else {
    header("Location: login");
}
$u = new Users;
$id = $_GET['id'];
$author = $_SESSION['username'];
$query =  $u->getUserByName($author);

if ($u->rowcount() > 0) {

    foreach ($query as $row) {


?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Welcome</title>
            <link rel="stylesheet" href="../../css/style.css">
            <link rel="stylesheet" href="../../css/old/footer.css">
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
                    <li><a href="#" id="name"><?php echo $_SESSION['username'] ?>&nbsp;<i class="fas fa-caret-down"></i></a>
                        <ul>
                            <li><?php echo "<a href=\"account?id=$row[id]\">" ?>Details</a></li>
                            <li><a href="../login/login">Dashboard</a></li>
                            <li><a href=""><i class="tiny material-icons">power_settings_new</i>&nbsp;LOGOUT</a></li>
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

            <div class="post">
            <?php
        }
    }
    $p = new Post;
    $id = $_GET['id'];
    $author = $_SESSION['username'];
    $query =  $p->getPostById($id);

    if ($p->rowcount() > 0) {
    
        foreach ($query as $res) {
    
            $image = $res['images'];
            ?>
               

                <div class="container">
                <button id="ed1"><?php echo "<a href=\"edit.php?pid=$res[pid]\">" ?>
                        <div class="tooltip"><i class="tiny material-icons">edit</i><span class="tooltext">EDIT</span></div>
                    </a></button>
                    <img src="images/1630508748052.png" id="tag" disabled>
                    <p id="category"><?php echo $res['category'] ?> </p>
                    <img src="images/<?php echo $image ?>">
                    <h1><?php echo $res['title'] ?></h1><br><br>
                    <p><?php echo $res['short'] ?> </p>
                    <p id="read"><?php echo "<a href=\"seperate.php?pid=$res[pid]\">" ?>Read more...</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>~<?php echo $res['author'] ?></span></p>
                </div>
        <?php


        }
    } else {
        echo " NO POST FOUND";
    }


        ?>

        <?php include('../headers/footer.php'); ?>
            </div>
            <script src="css/js/nav_responsive.js"></script>

        </body>

        </html>
<?php

include 'autoload.php';
include 'config.php';
session_start();


if (isset($_SESSION['username']) && $_SESSION['usertype']== "admin") {
    $id = $_SESSION['id'];
} else {
    header("Location: login.php");
}


if (isset($_REQUEST['info'])) {
    if ($_REQUEST['info'] == "login") {
        echo "<div id='alert'><small1> Login Successfull&nbsp;&nbsp;&nbsp;</small1></div>";
    }
}

$notify = mysqli_query($conn, "SELECT status from policy where status='unchecked'");
$count = mysqli_num_rows($notify);
$cc = $count > 0;
if ($cc) {
    echo "<div id='alert'><down> A New Request Is Occured Please Review</down></div>";
}

if (isset($_REQUEST['info'])) {
    if ($_REQUEST['info'] == "sent") {
        echo "<div id='alert'><small1> Email Successfully Sent &nbsp;&nbsp;&nbsp;</small1></div>";
    }
    if ($_REQUEST['info'] == "reject") {
        echo "<div id='alert'><small1> Request Successfully Rejected&nbsp;&nbsp;&nbsp;</small1></div>";
    }
}

$author = $_SESSION['username'];

$query = mysqli_query($conn, "SELECT * from users where  username='$author' ");

if ($query->num_rows > 0) {

    while ($row = mysqli_fetch_array($query)) {

?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Welcome</title>
            <link rel="stylesheet" href="scss/style.css">
            <link rel="stylesheet" href="scss/container.css">
            <link rel="stylesheet" href="scss/nav.css">
            <link rel="stylesheet" href="css/footer.css">
            <link rel="stylesheet" href="scss/notify.css">
            <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
            <script>
                setTimeout(fade_out, 5000);

                function fade_out() {
                    $("#alert").fadeOut().empty();
                }
            </script>

            <script src="https://kit.fontawesome.com/ec41712638.js" crossorigin="anonymous"></script>

        </head>

        <body vlink=" black">
            <p class="authenticate">Authenticated <i class="fas fa-circle"></i></p>
            <?php include('nav.php'); ?>



            <div class="right">
                <li><a href="#" id="name"><?php echo $_SESSION['username'] ?>&nbsp;<i class="fas fa-caret-down"></i></a>
                    <ul>
                        <li><a href="authinfo.php"> Author</a></li>

                        <input type="text" id="notify" value="<?php echo $count ?>">
                        <li><a href="authreq.php">Request</a></li>
                        <li><?php echo "<a href=\"account.php?id=$row[id]\">" ?>Details</a></li>
                        <li><a href="category.php">Category</a></li>
                        <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a></li>
                    </ul>
                </li>

            </div>

            </ul>
            <div class="icon menu-btn">
                <i class="fas fa-bars"></i>

            </div>
            </div>
            </div>
            <div class="image">

                <h1>WELCOME &nbsp;<?php echo $author ?></h1>
                <a href="#create" id="bb">Check Out</a>

            </div>



            <button id="create"> <?php echo "<a href=\"createpost.php?id=$row[id]\">" ?><div class="tooltip"><i class="small material-icons">control_point</i></a>
                    <span class="tooltext">Create</span>
                </div>
            </button><br><br>
            <button id="ed1"> <a href="editpost.php">
                    <div class="tooltip"><i class="tiny material-icons">edit</i><span class="tooltext">EDIT</span></div>
                </a></button>

    <?php
        include('container.php');
    }
} ?>
  <script src="css/js/index.js"></script>
        </body>

        </html>
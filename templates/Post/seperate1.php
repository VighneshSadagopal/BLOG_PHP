<?php

include('../classes/autoload.php');




$pid = $_GET['pid'];



$p = new Post;
$sql=$p->getPostById($pid);

foreach($sql as $res){
    $author = $res['author'];
    $title = $res['title'];
    $description = $res['description'];
    $short = $res['short'];
    $image = $res['images'];
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="../../css/seperate.css">
    <link rel="stylesheet" href="../../css/nav.css">
    <link rel="stylesheet" href="../../css/footer.css">
</head>
<?php include('../headers/nav.php'); ?>

<div class="right">
    <?php
    session_start();

    if (isset($_SESSION['username'])) { ?>
     <img src="../../images/<?php echo $_SESSION['profilepic'] ?>" id =" clipped" class="extra">
        <li><a href="#" id="name"><?php echo $_SESSION['username'] ?>&nbsp;<i class="tiny material-icons">arrow_drop_down_circle</i></a>
            <ul>

                <li><a href="../login/login.php">Dashboard</a></li>
                <li><?php echo "<a href=\"mypost.php?id=$res[id]\">" ?>My Post</a></li>
                <li><?php echo "<a href=\"account.php?id=$res[id]\">" ?>DETAILS</a></li>
                <li><a href="../login/logout.php"><i class="tiny material-icons">power_settings_new</i>&nbsp;LOGOUT</a></li>
            </ul>
        </li>
    <?php
    } else { ?><li><a href="../login/login.php" id="name">LOGIN</a></li><?php } ?>

</div>

</ul>
<div class="icon menu-btn">
    <i class="fas fa-bars"></i>
</div>
</div>
</div>

<body>
    <div class="image">
        <img src="../../images/<?php echo $image ?>">
        <h1><?php echo $title ?></h1>
        <p> ~<?php echo $author ?></p>


    </div>
    <div class="con">
        <div class="container">
            <form action="" method="post" class="login-email">

                <div class="input-group">
                    <textarea readonly cols="1000" resize:none, overflow:hidden><?php echo $description ?></textarea>
                </div>
        </div>


</body>

</html>
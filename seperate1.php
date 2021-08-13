<?php

include ('config.php');
session_start();


if (isset($_SESSION['username'])){
  
 }
 else{
     header("Location: login1.php");
 }

$pid= $_GET['pid'];



$query=mysqli_query($conn,"SELECT * from post where pid=$pid ");
while($res=mysqli_fetch_array($query)){

    $author=$res['author'];
    $title=$res['title'];
    $description= $res['description'];
    $short= $res['short'];
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Homepage</title>
        <link rel="stylesheet" href="seperate.css">
    </head>
    <body>
        <img src="">
        <nav>
            <img src="PicsArt_07-31-02.19.24.png" class="logo">
            <ul>
                <li><a href="homepage.php" >HOME</a></li>
                <li><a href="login1.php">DASHBOARD</a></li>
                <li><a href="#">CAREER</a></li>
                <li><a href="#">ABOUT</a></li>
                <li><a href="logout.php"><i class="tiny material-icons">power_settings_new</i>&nbsp;LOGOUT</a></li>
                
            </ul>
        </nav>
        <div class="container">
            <form action="" method="post" class="login-email">
               
                <div class="input-group">
               <h1> <input type="text" value=<?php echo $author?> name="author" readonly></h1>
                </div>
               
                <div class="input-group">
                <input type="text" placeholder="Title Name"value=<?php echo $title?> name="title" readonly>
                </div>
             
                <div class="input-group">
                <textarea readonly cols="60"  resize:none, overflow:hidden><?php echo $description ?></textarea>
                </div>
               

        </body>
    </html>
<?php

include ('config.php');

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
                <li><a href="index.php">LOGIN</a></li>
                <li><a href="register.php">REGISTER NOW</a></li>
                
            </ul>
        </nav>
        <div class="container">
            <form action="" method="post" class="login-email">
               
                <div class="input-group">
               <h1> <input type="text" value=<?php echo $author?> name="author"></h1>
                </div>
               
                <div class="input-group">
                <input type="text" placeholder="Title Name"value=<?php echo $title?> name="title">
                </div>
             
                <div class="input-group">
                <textarea cols="50" rows="16" ><?php echo $description ?></textarea>
                </div>
               

        </body>
    </html>
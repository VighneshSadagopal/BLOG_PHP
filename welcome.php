<?php 

include 'config.php';

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body vlink =" black">
        <nav>
            <img src="PicsArt_07-31-02.19.24.png" class="logo">
            <ul>
                <li><a href="homepage.php" class="active">HOME</a></li>
                <li><a href="index.php">DASHBOARD</a></li>
                <li><a href="logout.php">LOGOUT</a></li>
                
            </ul>
        </nav>
     
    <?php echo "<h1>Welcome " . $_SESSION['username'] . "</h1>"; ?>

    <div class="post">

            <button id="create"><a href="createpost.php">Create Post</a></button>
       
          <button id="ed1"> <a href="editpost.php">EDIT</a></button>
          <button id="de1"> <a href="deletepost.php">DELETE</a></button>



    <?php
             
                    $query = "SELECT * FROM post ORDER BY pid DESC";
        $query_run= mysqli_query($conn, $query);
        $check_post= mysqli_num_rows($query_run) > 0;

        if($check_post)
        {
            while($row = mysqli_fetch_array($query_run))
            {

        ?>
   

        <div class="container">

            <h1><?php echo $row['title'] ?></h1>
            <p><?php echo $row['description'] ?></p>

      
        </div>
    
        <?php

        
            }

        }
        else{
            echo " NO POST FOUND";
        }
    
    
        ?>

        
    </div>
       
</body>
</html>
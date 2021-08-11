<?php

include 'config.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login1.php");
}

if (isset($_POST['submit'])){

    if (!empty( $_POST['author']) && !empty($_POST['title']) && !empty($_POST['description']) && !empty( $_POST['short'])){

       $author= $_POST['author'] ;
        $title= $_POST['title'] ;
       $description= $_POST['description'] ;
       $short = $_POST['short'] ;
           $query_run=mysqli_query($conn,"INSERT into post(author, title , description , short ) VALUES('$author','$title','$description','$short')");
      
            if($query_run){
                echo "<script>alert('Form Submitted Successfully.')</script>";

               
              
            }
            else{
            echo  "<script>alert('Form not submitted.')</script>";
            }
           
    }
else{
echo "<script>alert('all fields are required.')</script>";
    }
}

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Homepage</title>
        <link rel="stylesheet" href="createpost.css">
    </head>
    <body>
        <img src="">
        <nav>
            <img src="PicsArt_07-31-02.19.24.png" class="logo">
            <ul>
                <li><a href="welcome.php" >DASHBOARD</a></li>
                <li><a href="logout.php">LOGOUT</a></li>
                
            </ul>
        </nav>
        <div class="container">
            <form action="" method="post" class="login-email">
                <p class="login-text" style="font-size: 1.2rem; font-weight: 800;">Author Name : </p>
                <div class="input-group">
                <input type="text" value=<?php echo $_SESSION['username']?> name="author">
                </div>
                <p class="login-text" style="font-size: 1.2rem; font-weight: 800;">POST TITLE</p>
                <div class="input-group">
                <input type="text" placeholder="Title Name" name="title">
                </div>
                <p class="login-text" style="font-size: 1.2rem; font-weight: 800;">Description</p>
                <div class="input-group">
                <textarea cols="45" rows="4" name="description" maxlength="800"></textarea>
                </div><br>
                <p class="login-text" style="font-size: 1.2rem; font-weight: 800;">Short Description</p>
                <div class="input-group">
                <textarea cols="45" rows="3"  name="short"maxlength="255"></textarea>
                </div>
                <div class="input-group">
                <button type="submit" name ="submit" class="btn">SUBMIT</button>
                </div>
        </form>
        </div>
    </body>
    </html>
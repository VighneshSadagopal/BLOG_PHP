<?php

include 'config.php';
session_start();

if (isset($_SESSION['username'])) {
    

}
else{
    header("Location: login1.php");
}
$id=$_REQUEST['id'];
if (isset($_POST['submit'])){
    if (!empty( $_POST['author']) && !empty($_POST['title']) && !empty($_POST['description']) && !empty( $_POST['short'])){
        
 $author= $_POST['author'];
 $title= $_POST['title'] ;
 $description= $_POST['description'] ;
 $short = $_POST['short'] ;
    
$query_run=mysqli_query($conn,"INSERT into post(author, title , description , short,id ) VALUES('$author','$title','$description','$short','$id')");
                
                    if($query_run){
                    echo "<script>alert('Form Submitted Successfully.')</script>";                        
                    }
                    else{
                    echo  "<script>alert('Form not submitted.')</script>";
                    }
                      
                }
                else{
                     echo "<small> ALL Fields Are Required</small>";
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
                <li><a href="#">CAREER</a></li>
                <li><a href="#">ABOUT US</a></li>
                <li><a href="#"><?php echo  $_SESSION['username'] ?>&nbsp;<i class="tiny material-icons">arrow_drop_down_circle</i></a>
                    <ul>
                        <li><a href="account.php">View Details</a></li>
                        <li><a href="logout.php"><i class="tiny material-icons">power_settings_new</i>LOGOUT</a></li>
                    </ul>
                    </li>
                
            </ul>
        </nav>
        <div class="container">
            <form action="" method="post" class="login-email" name="form" >
                <p class="login-text" style="font-size: 1.2rem; font-weight: 800;">Author Name : </p>
                <div class="input-group">
                <input type="text" value=<?php echo $_SESSION['username']?> name="author" minlength="2" id="input-field">
              
                </div>
                <p class="login-text" style="font-size: 1.2rem; font-weight: 800;">POST TITLE</p>
                <div class="input-group">
                <input type="text" placeholder="Title Name" name="title" minlength="5" id="input-field">
             
                </div>
                <p class="login-text" style="font-size: 1.2rem; font-weight: 800;">Description</p>
                <div class="input-group">
                <textarea cols="54" rows="4" name="description" maxlength="1000" id="input-field"></textarea>
              
                </div><br>
                <p class="login-text" style="font-size: 1.2rem; font-weight: 800;">Short Description</p>
                <div class="input-group">
                <textarea cols="54" rows="3"  name="short"maxlength="300" id="input-field"></textarea>
              
                </div>
                <div class="input-group">
                <button type="submit" name ="submit" class="btn">SUBMIT</button>
                </div>
        </form>
        </div>
        <script src="createpost.js"></script>
    </body>
    </html>
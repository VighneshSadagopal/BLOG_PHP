<?php

include 'config.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("location:login1.php");

}

$id=$_SESSION['id'];

if (isset($_POST['submit'])){
    
    if (!empty( $_POST['author']) && !empty($_POST['email']) && !empty($_POST['dob']) && !empty( $_POST['password']) && !empty( $_POST['usertype'])){
  

 $author= $_POST['author'];
 $email= $_POST['email'] ;
 $password= md5($_POST['password'] );
 $dob = $_POST['dob'] ;
 $your = $_POST['your'] ;
 $usertype = $_POST['usertype'] ;
    
$query_run=mysqli_query($conn,"INSERT into users(author, email, password,dob, your,usertype ) VALUES('$author','$email','$password','$dob'.'$your'.'$usertype')");
                
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

                $sql=mysqli_query($conn,"SELECT * from users where id='$id' ");
            
if ($sql->num_rows > 0){

while($row = mysqli_fetch_array($sql))
{

              
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Homepage</title>
        <link rel="stylesheet" href="createpost.css">
        <script src="https://kit.fontawesome.com/ec41712638.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="navbar" id="nav">
    <div class="content">
      <div class="logo">
        <img src="logo2.png">
      </div>
      <ul class="menu-list">
        <div class="icon cancel-btn">
          <i class="fas fa-times"></i>
        </div>
        <li><a href="admin.php">Dashboard</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Services</a></li>
        <li><?php echo "<a href=\"mypost.php?id=$row[id]\">"?>My Post</a></li>

        <div class="right">
        <li><a href="#" id="name" ><?php echo $_SESSION['username']?>&nbsp;<i class="tiny material-icons" >arrow_drop_down_circle</i></a>
            <ul>
                <li ><?php echo "<a href=\"account.php?id=$row[id]\">"?>VIEW DETAILs</a></li>
                <li ><a href="logout.php"><i class="tiny material-icons" >power_settings_new</i>&nbsp;LOGOUT</a></li>
            </ul>
        </li>
</div>
        
      </ul>
      <div class="icon menu-btn">
        <i class="fas fa-bars"></i>
      </div>
    </div>
</div>
        <div class="container">
            <form action="" method="post" class="login-email" name="form" >
                <p class="login-text" style="font-size: 1.2rem; font-weight: 800;">Author Name : </p>
                <div class="input-group">
                <input type="text"  name="author" minlength="2" id="input-field">
                </div>

                <p class="login-text" style="font-size: 1.2rem; font-weight: 800;">Email</p>
                <div class="input-group">
                <input type="email" placeholder="email" name="email" minlength="5" id="input-field">
                </div>

                <p class="login-text" style="font-size: 1.2rem; font-weight: 800;">Date Of Birth</p>
                <div class="input-group">
                <input type="date" name="dob"
                   
                    min="1990-01-01" max="2021-12-31">
               
                </div><br>
                <p class="login-text" style="font-size: 1.2rem; font-weight: 800;">Password</p>
                <div class="input-group">
				<input type="password" placeholder="Password" name="password"  required>
            </div>

                <p class="login-text" style="font-size: 1.2rem; font-weight: 800;">Description</p>
                <div class="input-group">
                <textarea cols="40" rows="3"  name="your"maxlength="300" id="input-field"></textarea>
                </div>
                    
                <p class="login-text" style="font-size: 1.2rem; font-weight: 800;">usertype</p>
                <div class="input-group">
                <input type="text"  name="usertype">
                </div>

                <div class="input-group">
                <button type="submit" name ="submit" class="btn">SUBMIT</button>
                </div>
        </form>
        </div>

        <?php
}}
?>
        
    </body>
    </html>
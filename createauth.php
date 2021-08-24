<?php

include 'config.php';
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
}
$id=$_SESSION['id'];

if (isset($_POST['submit'])){
    
    if (!empty( $_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty( $_POST['usertype'])){
  

 $username= $_POST['username'];
 $email= $_POST['email'] ;
 $password= md5($_POST['password']) ;
 $dob = $_POST['dob'] ;
 $your = $_POST['your'] ;
 $usertype = $_POST['usertype'] ;
    
$query_run=mysqli_query($conn,"INSERT into users(username, email , password ,dob,your,usertype ) VALUES('$username','$email','$password','$dob','$your','$usertype')");
                
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
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/nav.css">
        <link rel="stylesheet" href="css/footer.css">  
        <script src="https://kit.fontawesome.com/ec41712638.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="navbar" id="nav">
    <div class="content">
      <div class="logo">
        <img src="css/images/logo2.png">
      </div>
      <ul class="menu-list">
        <div class="icon cancel-btn">
          <i class="fas fa-times"></i>
        </div>
        <li><a href="login.php">Dashboard</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Services</a></li>
        <li><?php echo "<a href=\"mypost.php?id=$row[id]\">"?>My Post</a></li>

        <div class="right">
        <li><a href="#" id="name" ><?php echo $_SESSION['username']?>&nbsp;<i class="fas fa-caret-down"></i></a>
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
<div class="image">
  
 
  </div>
<div class ="contain2">
     

     <div class="logo">
         <img src="css/images/logo3.png"><h2>Visual Select</h2>
     </div>
     <form action="" method="POST" class="form" onsubmit="return validated()">
         <h3>Create Author</h3>
         <input type="text" placeholder="Username" name="username"  required>
     
     <input type="email" placeholder="Email" name="email"  required>

     <input type="password" placeholder="Password" name="password"  required>

     <input type="date"  placeholder="Date Of Birth" name="dob"  >

     <textarea id="txt" name="your"  rows="4" cols="40"></textarea>
     
     <input type="text"  placeholder="usertype" name="usertype"  >

     

 
         <button name="submit" class="btn">Submit</button>
</form>
     

 </div>


        <?php
}}
?>
         <script src="css/js/nav_responsive.js"></script>
         <?php include('footer.php');?>
    </body>
    </html>
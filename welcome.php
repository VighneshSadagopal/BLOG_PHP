<?php 

include 'config.php';

session_start();

if (!isset($_SESSION['id'])){
    header("Location: login.php");
}

$author=$_SESSION['username'];
$query=mysqli_query($conn,"SELECT * from users where  username='$author' ");
            
if ($query->num_rows > 0){

while($row = mysqli_fetch_array($query))
{

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="style1.css">  
    <script src="https://kit.fontawesome.com/ec41712638.js" crossorigin="anonymous"></script>
 
</head>
<body vlink =" black">
<div class="image">
         <h1>WELCOME &nbsp;&nbsp;<?php echo $author ?></h1>
         <a href="#create" id="bb">Check Out</a>
   
<div class="navbar" id="nav">
    <div class="content">
      <div class="logo">
        <img src="logo2.png">
      </div>
      <ul class="menu-list">
        <div class="icon cancel-btn">
          <i class="fas fa-times"></i>
        </div>
        <li><a href="homepage.php">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="login.php">Dashboard</a></li>
        <li><?php echo "<a href=\"mypost.php?id=$row[id]\">"?>My Post</a></li>
        <div class="right">
        <li><a href="#" id="name" ><?php echo $_SESSION['username']?>&nbsp;<i class="tiny material-icons" >arrow_drop_down_circle</i></a>
            <ul>
                <li ><?php echo "<a href=\"account.php?id=$row[id]\">"?>DETAILS</a></li>
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
</div>
     

    <div class="post" id ="post">

    <button id="create"> <?php echo "<a href=\"createpost.php?id=$row[id]\">"?><div class="tooltip"><i class="small material-icons">control_point</i></a>
<span class="tooltext">Create</span></div>
</button>
       
     

    <?php
}}     
        $query = "SELECT * FROM post ORDER BY pid DESC";
        $query_run= mysqli_query($conn, $query);
        $check_post= mysqli_num_rows($query_run) > 0;

        if($check_post)
        {
            while($row = mysqli_fetch_array($query_run))
            {

        ?>
        

        <div class="container" id="contain">

            <h1><?php echo "<a href=\"seperate1.php?pid=$row[pid]\">"?><?php echo $row['title'] ?></a></h1>
            <p><?php echo $row['short'] ?><p id="auth">~<?php echo $row['author'] ?></p></p>

      
        </div>
    
        <?php

        
            }

        }
        else{
            echo " NO POST FOUND";
        }
    
    
        ?>
    </div>
    <div class ="sidebar">
        <p>Search Post </p>
    <input type="text" placeholder="Search By Author Name" name="search">&nbsp;<button type="submit" ><i class="fas fa-search"></i></button>
      </div>
      <script src="nav_responsive.js"></script>
</body>
</html>
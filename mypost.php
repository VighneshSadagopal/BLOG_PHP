<?php 

include 'config.php';

session_start();

if (isset($_SESSION['username'])){
  
}
else{
    header("Location: login.php");
}

$id=$_GET['id'];
$author=$_SESSION['username'];
$query=mysqli_query($conn,"SELECT * from users where id=$id ");
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
    <link rel="stylesheet" href="css/style1.css">  
    <link rel="stylesheet" href="css/footer.css">  
    <script src="https://kit.fontawesome.com/ec41712638.js" crossorigin="anonymous"></script>
</head>
<body vlink =" black">
<div class="image" id="img">
         <h1>WELCOME &nbsp;&nbsp;<?php echo $author ?></h1>
         <a href="#create" id="bb">Check Out</a>
<div class="navbar" id="nav">
    <div class="content">
      <div class="logo">
        <img src="css/images/logo2.png">
      </div>
      <ul class="menu-list">
        <div class="icon cancel-btn">
          <i class="fas fa-times"></i>
        </div>
        <li><a href="login.php">All Post</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Services</a></li>
        

        <div class="right">
        <li><a href="#" id="name" ><?php echo $_SESSION['username']?>&nbsp;<i class="fas fa-caret-down"></i></a>
            <ul>
                <li ><?php echo "<a href=\"account.php?id=$row[id]\">"?>VIEW DETAILs</a></li>
                <li ><a href=""><i class="tiny material-icons" >power_settings_new</i>&nbsp;LOGOUT</a></li>
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

    <div class="post">
   <?php 
}}   
    $id=$_GET['id'];
$author=$_SESSION['username'];
$query=mysqli_query($conn,"SELECT * from post where id=$id ");
if ($query->num_rows > 0){

while($row = mysqli_fetch_array($query))
{

   ?>
       

        <div class="container">
         

            <h1><?php echo $row['title'] ?></h1>  <div class="edbtn">
        <button id="ed1"> <?php echo "<a href=\"edit.php?pid=$row[pid]\"><?a>"?><div class="tooltip"><i class="tiny material-icons">edit</i><span class="tooltext">EDIT</span></div></button>
       <button id="de1"> <a href="deletepost.php"><div class="tooltip"><i class="tiny material-icons">delete</i></a><span class="tooltext">DELETE</span></div></button>
       </div>
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
    <script src="css/js/nav_responsive.js"></script>
    <?php include('footer.php');?>
</body>
</html>
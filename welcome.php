<?php 

include 'config.php';

session_start();

if (isset($_SESSION['username'])){
   $id=$_SESSION['id'];
}
else{
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
    <link rel="stylesheet" href="css/style1.css">  
    <link rel="stylesheet" href="css/footer.css">  
    <script src="https://kit.fontawesome.com/ec41712638.js" crossorigin="anonymous"></script>
 
</head>
<body vlink =" black">
<div class="image">
         <h1>WELCOME &nbsp;<?php echo $author ?></h1>
         <a href="#create" id="bb">Check Out</a>
         <?php include('nav.php'); ?>
        
        
     
        <div class="right">
        <li><a href="#" id="name" ><?php echo $_SESSION['username']?>&nbsp;<i class="fas fa-caret-down"></i></a>
            <ul>
               
                <li ><?php echo "<a href=\"account.php?id=$row[id]\">"?>My Details</a></li>
                <li ><?php echo "<a href=\"mypost.php?id=$row[id]\">"?>My Post</a></li>
                <li ><a href="logout.php"><i class="tiny material-icons" >power_settings_new</i>&nbsp;Logout</a></li>
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
     
  
    
<button id="create"> <?php echo "<a href=\"createpost.php?id=$row[id]\">"?><div class="tooltip"><i class="small material-icons">control_point</i></a>
<span class="tooltext">Create</span></div>
</button><br><br>
    <div class="con">
    <div class="post">
    
  
       
     

    <?php
}}     
        $query = "SELECT * FROM post ORDER BY pid DESC";
        $query_run= mysqli_query($conn, $query);
        $check_post= mysqli_num_rows($query_run) > 0;

        if($check_post)
        {
            while($row = mysqli_fetch_array($query_run))
            {
                $image=$row['images'];
        ?>
       
        <div class="container">

        <img src="images/<?php echo $image?> "id="img2">
            <h1><?php echo $row['title'] ?></h1> <div class="edbtn"> </div>
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
    </div>
      <script src="css/js/index.js"></script>
      <?php include('footer.php')?>
</body>
</html>
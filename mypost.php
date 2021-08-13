<?php 

include 'config.php';

session_start();

if (isset($_SESSION['username'])){
  
}
else{
    header("Location: login1.php");
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
    <link rel="stylesheet" href="style1.css">  
</head>
<body vlink =" black">
        <nav>
            <img src="PicsArt_07-31-02.19.24.png" class="logo">
            <ul>
                <li><a href="homepage.php" class="active">HOME</a></li>
                <li><a href="login1.php">ALL POST</a></li>
                <li><a href="#">CAREER</a></li>
                <li><a href="#">ABOUT US</a></li>
                <li><a href="#"><?php echo  $_SESSION['username'] ?>&nbsp;<i class="tiny material-icons">arrow_drop_down_circle</i></a>
                    <ul>
                    <li><?php echo "<a href=\"account.php?id=$row[id]\">"?>View Details</a></li>
                        <li><a href="logout.php"><i class="small material-icons">power_settings_new</i>&nbsp;LOGOUT</a></li>
                    </ul>
                    </li>
                
            </ul>
        </nav>
     
    <?php echo "<h1>Welcome " . $_SESSION['username'] . "</h1>"; ?>

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
        
        <button id="ed1"> <?php echo "<a href=\"edit.php?pid=$row[pid]\"><?a>"?><div class="tooltip"><i class="tiny material-icons">edit</i><span class="tooltext">EDIT</span></div></button>
       <button id="de1"> <a href="deletepost.php"><div class="tooltip"><i class="tiny material-icons">delete</i></a><span class="tooltext">DELETE</span></div></button>


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
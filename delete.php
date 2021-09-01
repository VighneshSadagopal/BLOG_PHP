<?php

include ('config.php');

$pid= $_GET['pid'];
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
$result=mysqli_query($conn,"DELETE from  post where pid='$pid'");
if($result){
    echo "<script>alert('Successfully Updated.')</script>";
   
}
else{
    echo "<script>alert('updation failed.')</script>";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Homepage</title>
        <link rel="stylesheet" href="css/createpost.css">
        <link rel="stylesheet" href="css/footer.css">  
    </head>
    <body>
        <img src="">
        <?php include('nav.php');?>
        <div class="right">
        <li><a href="#" id="name" ><?php echo $_SESSION['username']?>&nbsp;<i class="fas fa-caret-down"></i></a>
            <ul>
               
                <li ><?php echo "<a href=\"account.php?id=$row[id]\">"?>My Details</a></li>
                
                <li ><a href="logout.php"><i class="tiny material-icons" >power_settings_new</i>&nbsp;Logout</a></li>
            </ul>
        </li>
</div>
        
      </ul>
      <div class="icon menu-btn">
        <i class="fas fa-bars"></i>
      
      </div>
      <div>
        <input type="checkbox" class="checkbox" id="chk" />
        <label class="label" for="chk">
            <i class="fas fa-moon"></i>
            <i class="fas fa-sun"></i>
            <div class="ball"></div>
        </label>
    </div>
    </div>
</div>
</div>
    </body>
    </html>
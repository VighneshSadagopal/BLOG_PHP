<?php 

include 'config.php';

session_start();

if (isset($_SESSION['username'])){
   $id=$_SESSION['id'];
}
else{
    header("Location: login1.php");
}





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="author.css">  
    <script src="https://kit.fontawesome.com/ec41712638.js" crossorigin="anonymous"></script>
 
</head>
<body vlink =" black">
<div class="image">
         <h1>View Our Contributers</h1>
         <a href="#create" id="bb">GO--></a>
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
        <li><a href="admin.php">Dashboard</a></li>
        
     
        <div class="right">
        <li><a href="#" id="name" ><?php echo $_SESSION['username']?>&nbsp;<i class="tiny material-icons" >arrow_drop_down_circle</i></a>
            <ul>
               
            <li><a href="createauth.php"> Create New Author</a></li>
                <li><a href="logout.php"><i class="tiny material-icons" >power_settings_new</i>&nbsp;LOGOUT</a></li>
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

<?php
$query=mysqli_query($conn,"SELECT * FROM users");
if($query->num_rows > 0){


while($res=mysqli_fetch_array($query)){
?>
     <div class="post">
         <div class="container">
         <button id="ed1"> <?php echo "<a href=\"authoredit.php?id=$res[id]\"><?a>"?><div class="tooltip"><i class="tiny material-icons">edit</i><span class="tooltext">EDIT</span></a></div></button>

           <?php echo "<h1>".$res['username']."</h1>" ?>
           <?php echo "<p>".$res['your']."</p>" ?>
           <?php echo "<p>".$res['dob']."</p>" ?>
             
        </div>
    </div>
  
    <?php
    
  }
}
?>
</body>
</html>
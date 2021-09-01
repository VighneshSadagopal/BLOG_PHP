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
    <link rel="stylesheet" href="scss/style.css">  
    <link rel="stylesheet" href="scss/container.css">  
    <link rel="stylesheet" href="scss/nav.css">  
    <link rel="stylesheet" href="css/footer.css">  
    <script src="https://kit.fontawesome.com/ec41712638.js" crossorigin="anonymous"></script>
 
</head>
<body vlink =" black">
<p class="authenticate">Authenticated <i class="fas fa-circle"></i></p>
<div class="image">
         <h1>WELCOME &nbsp;<?php echo $author ?></h1>
         <a href="#create" id="bb">Check Out</a>
         <?php include('nav.php'); ?>
        
        
     
        <div class="right">
        <li><a href="#" id="name" ><?php echo $_SESSION['username']?>&nbsp;<i class="fas fa-caret-down"></i></a>
            <ul>
               
                <li ><?php echo "<a href=\"account.php?id=$row[id]\">"?>Details</a></li>
                <li ><?php echo "<a href=\"mypost.php?id=$row[id]\">"?>MyPost</a></li>
                <li ><a href="category.php">Category</a></li>
                <li ><a href="logout.php"><i class="tiny material-icons" >power_settings_new</i>&nbsp;Logout</a></li>
            </ul>
        </li>
</div>
        
      </ul>
      <div class="icon menu-btn">
        <i class="fas fa-bars"></i>
      
      </div>
     <!-- <div>
        <input type="checkbox" class="checkbox" id="chk" />
        <label class="label" for="chk">
            <i class="fas fa-moon"></i>
            <i class="fas fa-sun"></i>
            <div class="ball"></div>
        </label>
    </div>-->
    </div>
</div>
</div>
     
  
    
<button id="create"> <?php echo "<a href=\"createpost.php?id=$row[id]\">" ?><div class="tooltip"><i class="small material-icons">control_point</i></a>
<span class="tooltext">Create</span></div>
</button><br><br>


        <?php }} include('container.php');?>
   
  
    <script src="css/js/nav_responsive.js"></script>
     
     
</body>
</html>
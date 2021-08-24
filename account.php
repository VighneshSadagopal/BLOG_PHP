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

    while($res=mysqli_fetch_array($query)){
       
      
           

        $author=$res['username'];
        $email=$res['email'];
        $dob=$res['dob'];
        $your=$res['your'];
    }
            }
            else{
                echo "<script>alert('LogIn To Your Account.')</script>";
                $author="";
                $title="";
                $description="";
                $short="";

            }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="css/style2.css">  
    <link rel="stylesheet" href="css/footer.css">  
    <script src="https://kit.fontawesome.com/ec41712638.js" crossorigin="anonymous"></script>
</head>
<body vlink =" black">
        <nav>
            <img src="css/images/logo2.png" class="logo">
            <ul>
                <li><a href="homepage.php" class="active">HOME</a></li>
                <li><a href="login.php">DASHBOARD</a></li>
                <li><a href="#">CAREER</a></li>
                <li><a href="#">ABOUT US</a></li>
                <li><a href="#">Details</a>
                    <ul>
                        <li><a href="logout.php"><i class="tiny material-icons">power_settings_new</i>&nbsp;LOGOUT</a></li>
                    </ul>
                    </li>
            </ul>
        </nav>
        <?php
            
             $query=mysqli_query($conn,"SELECT * from users where  username='$author' ");
            
             if ($query->num_rows > 0){
        
            while($row = mysqli_fetch_array($query))
            {

        ?>
        <div class="content">
        <button id="ed1"><?php echo "<a href=\"authoredit.php?id=$row[id]\">"?><div class="tooltip"><i class="tiny material-icons">edit</i><span class="tooltext">EDIT</span></div></a></button>
            <form>
                <h2>Name :-</h2>
                <div class="input-group"><input type="text" name="author" value=<?php echo $author?> readonly>
                </div>
                <h2>Email :-</h2>
                <div class="input-group"><input type="email" name="email" value=<?php echo $email?> readonly>
                </div>
                <h2>D.O.B :-</h2>
                <div class="input-group"><input type="text" name="dob"value=<?php echo $dob?> readonly>
                </div>
                <h2>Describe Yourself :-</h2>
                <div class="input-group"><textarea readonly cols="50" resize:none><?php echo $your?></textarea>
                </div>
            </form>
            <?php

        
                         }

                }else{
                echo " NO POST FOUND";
                     }


                ?>

        </div>
        <script src="css/js/nav_responsive.js"></script>
        <?php include('footer.php');?>
</body>
</html>
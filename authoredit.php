<?php

include ('config.php');
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

$id= $_REQUEST['id'];
$author=$_SESSION['username'];

$query=mysqli_query($conn,"SELECT * from users where id=$id  ");
if ($query->num_rows > 0){

    while($res=mysqli_fetch_array($query)){
       
      
           
        $id=$res['id'];
        $author=$res['username'];
        $email=$res['email'];
        $dob=$res['dob'];
        $your=$res['your'];
    
        
       
?>
<?php

    if(isset($_POST['update'])){

    
        $author=$_POST['username'];
        $email=$_POST['email'];
        $dob=$_POST['dob'];
        $your=$_POST['your'];

        $result=mysqli_query($conn,"UPDATE users SET username='$author',email='$email',dob='$dob',your='$your'where id='$id'");
        if($result){
            echo "<script>alert('Successfully Updated.')</script>";
        }
        else{
            echo "<script>alert('updation failed.')</script>";
        }
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Homepage</title>
        <link rel="stylesheet" href="css/createpost.css">
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
        <li><a href="admin.php">Dashboard</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Services</a></li>
        <li><?php echo "<a href=\"mypost.php?id=$res[id]\">"?>My Post</a></li>

        <div class="right">
        <li><a href="#" id="name" ><?php echo $_SESSION['username']?>&nbsp;<i class="tiny material-icons" >arrow_drop_down_circle</i></a>
            <ul>
                <li ><?php echo "<a href=\"account.php?id=$res[id]\">"?>VIEW DETAILs</a></li>
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
        <?php
    }
            }
            else{
                echo "<script>alert('LogIn To Your Account.')</script>";
                $author="";
                $email="";
                $dob="";
                $your="";

            }
?>
        <div class="container">
            <form action="" method="post" class="login-email">
                <p class="login-text" style="font-size: 1.5rem; font-weight: 800;">Author Name : </p>
                <div class="input-group">
                <input type="text" value=<?php echo $author?> name="username" required>
                </div>
                <p class="login-text" style="font-size: 1.5rem; font-weight: 800;">EMAIL</p>
                <div class="input-group">
                <input type="text" placeholder="Title Name"value=<?php echo $email?> name="email">
                </div>
                <p class="login-text" style="font-size: 1.5rem; font-weight: 800;">DOB</p>
                <div class="input-group">
                <input type="date" name="dob"
                    value=<?php echo $dob?> 
                    min="1990-01-01" max="2021-12-31">
                </div>
                <p class="login-text" style="font-size: 1.5rem; font-weight: 800;">Describe Yourself</p>
                <div class="input-group">
                <textarea cols="50" rows="3" name="your"><?php echo $your ?></textarea>
                </div>
                <div class="input-group">
                <button type="submit" name ="update" class="btn">UPDATE</button>
                </div>
        </form>
        <script src="css/js/nav_responsive.js"></script>
        </body>
    </html>
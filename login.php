<?php 

include 'config.php';


session_start();
ob_start();

error_reporting(0);

if(isset($_SESSION['username'])){
  header("location:welcome.php");
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        $_SESSION['id'] = $row['id'];
    
        if($row['usertype']=="admin"){ 
          if(isset($_SESSION['username'])){
           header("location:admin.php");
        }
      }
        elseif($row['usertype']=="user"){
          if(isset($_SESSION['username'])){
                    header("location:welcome.php");
          } 
            }else {
        echo "<small>Email Or Password is Incorrect Please re-enter</small>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>  
        <link rel="stylesheet" href="css/index.css">
        <meta charset="UTF-8">
        <script src="https://kit.fontawesome.com/ec41712638.js" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login page</title>
    </head>
    <body>
    

        <a href="index.php"><i class="fas fa-arrow-circle-left" id="back"></i></a>
        <div class="contain1">


            <img src="css/images/falls.jpg" class="image">
           
            <h1>Welcome to <br>the Next Gen Of Blogs</h1>
        </div>
        <div class ="contain2">
            <div class="logo">
                <img src="css/images/logo3.png"><h2>Visual Select</h2>
            </div>
            <form action="" method="POST" class="form" onsubmit="return validated()">
                <h3>Sign In</h3>
                <input type="text" placeholder="username"  name="email" value="<?php if(isset($_COOKIE['emailcookie'])){echo $_COOKIE['emailcookie'];} ?>">
                <input type="password" placeholder="password" name="password" value="<?php if(isset($_COOKIE['passwordcookie'])){echo $_COOKIE['passwordcookie'];} ?>">
                <button type="submit" name="submit" class="btn">Sign In</button>
            </form>
            <input type="checkbox" name="remember" class="remember"><p>Remember me</p>
            <text>Dont Have a Account ? <span><a href="register.php">Register Now</span></a></text>
        </div>
        <script src="javascript" href="css/js/login.js"></script>
    </body>
</html>


<?php
session_start();
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


            <img src="css/images/falls.jpg" class="image" id="img">
           
            <h1>Welcome to <br>the Next Gen Of Blogs</h1>
        </div>
        <div class ="contain2">
            <div class="logo">
                <img src="css/images/logo3.png"><h2>Visual Select</h2>
            </div>
            <form action="" method="POST" class="form" onsubmit="return validated()">
                <h3>Sign In</h3>
                <input type="text" placeholder="username" id="email" name="email" >
                <input type="password" placeholder="password" name="password" id="password" >
                <button type="submit" name="submit" class="btn">Sign In</button>
            </form>
            <input type="checkbox" name="rememberme" ><p>Remember me</p>
            <text>Dont Have a Account ? <span><a href="register.php">Register Now</span></a></text>
        </div>
        <script src="javascript" href="css/js/login.js"></script>
    </body>
</html>
<?php
if(isset($_POST['submit'])){
    if(isset($_POST['rememberme'])){
        echo "checked";
    }
    else{
        echo "not checked";
    }
}
   
?>
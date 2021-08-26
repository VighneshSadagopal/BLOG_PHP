<?php 

include 'config.php';

session_start();

if(isset($_SESSION['username'])){
    if($_SESSION['usertype'] =="admin"){
        header("location:admin.php");
    }
    elseif($_SESSION['usertype'] =="user"){
        header("location:welcome.php");
    }

}

if (isset($_POST['submit'])) {
  
       
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    
   
    

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql); 
    
    $row = mysqli_fetch_assoc($result);
    
       
        $_SESSION['email'] = $row['email'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['usertype']=$row['usertype'];
    
        if($row['usertype']=='admin'){ 
            if(isset($_POST['check'])){
                setcookie('emailcookie',$email,time()+60*60);
                setcookie('passwordcookie',base64_encode($password),time()+60*60);
        
            }
           
                header("location:admin.php");
            }
      
        elseif($row['usertype']=='user'){
            if(isset($_POST['check'])){
                setcookie('emailcookie',$email,time()+60*60);
                setcookie('passwordcookie',base64_encode($password),time()+60*60);
        
            }
           
                header("location:welcome.php");
            }
        else {
        echo "<small>Email Or Password is Incorrect Please re-enter</small>";
    }
   
}



?>


<!DOCTYPE html>
<html lang="en">
    <head>  
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/nav.css">
  <link rel="stylesheet" href="css/footer.css">
        <meta charset="UTF-8">
        <script src="https://kit.fontawesome.com/ec41712638.js" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login page</title>
    </head>
    <body>
    

      <?php include('nav.php');?>
      <div class="right">
          <li><a href="index.php" id="name"  >Home</a>
      
              </div>
</div>
</div>
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
                <input type="text" placeholder="username" id="email" name="email" value=<?php if(isset($_COOKIE['emailcookie'])){ echo $_COOKIE['emailcookie'];}?>>
                <input type="password" placeholder="password" name="password" id="password"value=<?php if(isset($_COOKIE['passwordookie'])){echo base64_decode($_COOKIE['passwordcookie']);}?> >
                <button type="submit" name="submit" class="btn">Sign In</button>
             
                <input type="checkbox" name="check" >
                <p>Remember me</p>
            </form>
         
         
          
            <text>Dont Have a Account ? <span><a href="register.php">Register Now</span></a></text>
        </div>
        <?php include('footer.php');?>
        <script src="javascript" href="css/js/login.js"></script>
    </body>
</html>


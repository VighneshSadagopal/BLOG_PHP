<?php 

include 'autoload.php';

$u= new Users;

session_start();

if(isset($_SESSION['username'])){
    if($_SESSION['usertype'] =="admin"){
        header("location:admin.php");
    }
    elseif($_SESSION['usertype'] =="user"){
        header("location:welcome.php");
    }
    elseif($_SESSION['usertype'] ==""){
        header("location:anonmoyous.php");
    }

}


if (isset($_POST['submit'])) {
  
       
    $email = $_POST['email'];
    $password = md5($_POST['password']);
   $sql=$u->login($email,$password);
   foreach ($sql as $data) {
        $_SESSION['email'] = $data['email'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['id'] = $data['id'];
        $_SESSION['usertype']=$data['usertype'];
        

   
   $res= $u->rowCount() > 0;
   echo $res;
        if($res){

       
    
        if($data['usertype']=='admin'){ 
            if(isset($_POST['check'])){
                setcookie('emailcookie',$email,time()+60*60);
                setcookie('passwordcookie',base64_encode($password),time()+60*60);
        
            }
           
                header("location:admin.php?info=login");
            }
      
        elseif($data['usertype']=='user'){
            if(isset($_POST['check'])){
                setcookie('emailcookie',$email,time()+60*60);
                setcookie('passwordcookie',base64_encode($password),time()+60*60);
        
            }
           
                header("location:welcome.php?info=login");
            }
            elseif($data['usertype']==''){
                if(isset($_POST['check'])){
                    setcookie('emailcookie',$email,time()+60*60);
                    setcookie('passwordcookie',base64_encode($password),time()+60*60);
            
                }else{
                    echo "error occured";
                }
                    header("location:anonmoyous.php?info=login");
               
        }
        
            
        
    }else{
                echo "<small>Email or Password is Incorrect</small>";
            }
        }         

    }


?>


<!DOCTYPE html>
<html lang="en">
    <head>  
  <link rel="stylesheet" href="Scss/index.css">
  <link rel="stylesheet" href="scss/nav.css">
  <link rel="stylesheet" href="css/footer.css">
        <meta charset="UTF-8">
        <script src="https://kit.fontawesome.com/ec41712638.js" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login page</title>
    </head>
    <body>
    

      <?php include('nav.php');?>
          
      <div class="right">
            
      
        </div>
        
      </ul>
      <div class="icon menu-btn">
        <i class="fas fa-bars"></i>
      
      </div>
    </div>
</div>

        <div class="contain1">


            <img src="css/images/falls.jpg" class="image" id="img">
           
            <h1>Welcome to <br>the Next Gen Of Blogs</h1>
        </div>
        <div class ="contain2">
        <div class="whole">
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
</div>
        <?php include('footer.php');?>
        <script src="css/js/nav_responsive.js"></script>
    </body>
</html>


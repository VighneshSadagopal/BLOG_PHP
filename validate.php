<?php
include('config.php');

session_start();
if(isset($_POST['submit'])) {
 
  
       
  $email = $_POST['email'];
  $password = md5($_POST['password']);

  
 
  

  $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
  $result = mysqli_query($conn, $sql); 
  
  $res = mysqli_fetch_assoc($result);
  
  if($email == $res['email'] and $password==$res['password'] and $res['usertype']=='admin'){
    if(isset($_POST['check'])){
        setcookie('email',$email,time()+60*60*7);
        setcookie('password',$password,time()+60*60*7);
    }
 
    $_SESSION['username']=$username;
    header("location:admin.php");

  
}elseif($email == $res['email'] and $password==$res['password'] and $res['usertype']=='user'){
    if(isset($_POST['check'])){
        setcookie('email',$email,time()+60*60*7);
        setcookie('password',$password,time()+60*60*7);
    }
   
    $_SESSION['username']=$username;
    header("location:welcome.php");

  
}
}


    
    

?>

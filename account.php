<?php 

include 'config.php';
include 'database.php';

    $obj = new Database();


session_start();

if (isset($_SESSION['username'])){
 
}
else{
    header("Location: login.php");
}
$id=$_GET['id'];
$author=$_SESSION['username'];
 $obj->select('users','*',null,'id="'.$id.'"');
if ($obj->num_rows > 0){

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
    <link rel="stylesheet" href="css/nav.css">  
    
    <script src="https://kit.fontawesome.com/ec41712638.js" crossorigin="anonymous"></script>
</head>
<body vlink =" black">

       
    
       
        <script src="css/js/nav_responsive.js"></script>
      
</body>
</html>
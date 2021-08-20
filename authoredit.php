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
<html lang="en">
<head>
    <link rel="stylesheet" href="css/index.css">
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/ec41712638.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Author Edit</title>
</head>
<body>
    
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
   
        <div class="image">
  
 
        <a href="authinfo.php"><i class="fas fa-arrow-circle-left" id="back"></i></a>
        </div>
        <div class ="contain2">
           

            <div class="logo">
                <img src="css/images/logo3.png"><h2>Visual Select</h2>
            </div>
			<form action="" method="POST" class="form" onsubmit="return validated()">
                <h3>Author Details</h3>
				<input type="text" placeholder="Username" name="username" value="<?php echo $author; ?>" required>
			
			<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>

            <input type="date"  placeholder="Date Of Birth" name="dob"  value=<?php echo $dob?>  >
	
			<textarea id="txt" name="your" value=<?php echo $your ?> rows="4" cols="48"></textarea>
	   
			

		
                <button name="update" class="btn">Update</button>
</form>
            
    
        </div>
		<script src="javascript" href="css/js/login.js"></script>
</body>
</html>
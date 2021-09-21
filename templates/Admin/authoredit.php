<?php

include ('../classes/autoload.php');
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

$id= $_REQUEST['id'];
$author=$_SESSION['username'];
$u = new users;

$query =  $u->getUserById($id);

if ($u->rowcount() > 0) {

    foreach ($query as $res) {
      
           
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

        $data=['username'=>$username,'email'=>$email,'password'=>$password,'your'=>'','usertype'=>'','dob'=>$dob];
        $result = $u->updateUser($data);
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
    <link rel="stylesheet" href="../../css/index.css">
    <link rel="stylesheet" href="../../css/nav.css">
    <link rel="stylesheet" href="../../css/old/footer.css">  
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
  
 
        <a href="../Authors/authinfo"><i class="fas fa-arrow-circle-left" id="back"></i></a>
        </div>
        <div class ="contain2">
           

            <div class="logo">
                <img src="../../css/images/logo3.png"><h2>Visual Select</h2>
            </div>
			<form action="" method="POST" class="form" onsubmit="return validated()">
                <h3>Author Details</h3>
				<input type="text" placeholder="Username" name="username" value="<?php echo $author; ?>" required>
			
			<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>

            <input type="date"  placeholder="Date Of Birth" name="dob"  value=<?php echo $dob?>  >
	
			<textarea id="txt" name="your" value=<?php echo $your ?> rows="4" cols="30"></textarea>
	   
			

		
                <button name="update" class="btn">Update</button>
</form>
            

        </div>
		<script src="javascript" href="css/js/login.js"></script>
</body>
</html>
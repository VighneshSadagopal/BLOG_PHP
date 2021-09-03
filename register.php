<?php 

include 'database.php';

$obj = new Database();

session_start();

if (isset($_SESSION['username'])) {
    header("Location: login.php");
}

if (isset($_POST['submit']))
 {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			if ($result) {
			$obj->insert('users',['username'=>$username,'email'=>$email,'password'=>$password]);
			echo "<small1>Wow Registration successful</small1> ";
			
			
			//	echo "<small1>Wow Registration successful</small1>";
			//	$username = "";
			//	$email = "";
			//	$_POST['password'] = "";
			//	$_POST['cpassword'] = "";
				
			} else {
				echo "<small2>Woops! Something Wrong Went.</small2>";
			}
		} else {
			echo "<small>Woops! Email Already Exists.</small>";
		}
		
	} else {
		echo "<small3>Password Not Matched.</small3>";
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="scss/index.css">
	<link rel="stylesheet" href="scss/nav.css">
	<link rel="stylesheet" href="css/footer.css">
	<link rel="stylesheet" href="scss/notify.css">
    <meta charset="UTF-8">
      <script src="https://kit.fontawesome.com/ec41712638.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		
		</style>
    <title>Login page</title>
</head>
<body>
<?php include('nav.php');?>
    
        
      </ul>
      <div class="icon menu-btn">
        <i class="fas fa-bars"></i>
      
      </div>
    </div>
</div>

   
        <div class="contain1">
    <img src="css/images/falls.jpg" class="image" id="img">
    <h1>Enter Your Details <br>and Join US</h1>
 
    
        </div>
        <div class ="contain2">
           
<div class="whole">
            <div class="logo">
                <img src="css/images/logo3.png"><h2>Visual Select</h2>
            </div>
			<form action="" method="POST" class="form" onsubmit="return validated()">
                <h3>Sign Up</h3>
				<input type="text" placeholder="Username" name="username"  required>
			
			<input type="email" placeholder="Email" name="email"  required>
	
			<input type="password" placeholder="Password" name="password"  required>
	   
			<input type="password" placeholder="Confirm Password" name="cpassword"  required>

			<input type="date"  placeholder="Date Of Birth" name="dob" >
                <button name="submit" class="btn">Sign In</button>
</form>
            
         <text>Already Registered&nbsp;&nbsp;&nbsp;<span><a href="login.php">Login Now</span></a></text>
        </div>
		</div>
		<script src="css/js/nav_responsive.js"></script>
		
 <?php include('footer.php');?>
</body>
</html>
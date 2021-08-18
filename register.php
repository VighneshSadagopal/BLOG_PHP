<?php 

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: login2.php");
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
			$sql = "INSERT INTO users (username, email, password)
					VALUES ('$username', '$email', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<small>Wow Registration successful</small>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
				
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="index.css">
    <meta charset="UTF-8">
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
</head>
<body>
    

   
        <div class="contain1">
    <img src="falls.jpg" class="image">
    <txt id="h1">Enter Your Details <br>and Join US</txt>
 
    
        </div>
        <div class ="contain3">
           

            <div class="logo">
                <img src="logo3.png"><h2>Visual Select</h2>
            </div>
			<form action="" method="POST" class="form" onsubmit="return validated()">
                <h3>Sign In</h3>
				<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
			
			<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
	
			<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
	   
			<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>

			<input type="date"  placeholder="Date Of Birth" name="dob" >
                <button name="submit" class="btn">Sign In</button>
</form>
            
         <text>Already Registered&nbsp;&nbsp;&nbsp;<span><a href="login.php">Login Now</span></a></text>
        </div>
		<script src="javascript" href="login.js"></script>
 
</body>
</html>
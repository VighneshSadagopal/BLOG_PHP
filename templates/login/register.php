<?php

require_once '../classes/autoload.php';

$u = new Users();

session_start();

if (isset($_SESSION['username'])) {
	header("Location: login.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);
	$dob = $_POST['dob'];
	$imgname = $_FILES['image']['name'];

    $tempname = $_FILES['image']['tmp_name'];
    move_uploaded_file($tempname, "../../images/$imgname");


	if ($password == $cpassword) {
		$sql = $u->getUserByEmail($email);

		


		if ($sql == 0) {



			$data = ['username' => $username, 'email' => $email, 'password' => $password, 'your' => '', 'usertype' => '', 'dob' => $dob,'profilepic' => $imgname];
			$u->addUser($data);
			echo "<small1>Wow Registration successful</small1>";
			//	$username = "";
			//	$email = "";
			//	$_POST['password'] = "";
			//	$_POST['cpassword'] = "";


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
	<link rel="stylesheet" href="../../css/index.css">
	<link rel="stylesheet" href="../../css/nav.css">
	<link rel="stylesheet" href="../../css/old/footer.css">
	<link rel="stylesheet" href="../../css/notify.css">
	<meta charset="UTF-8">
	<script src="https://kit.fontawesome.com/ec41712638.js" crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>

	</style>
	<title>Login page</title>
</head>

<body>
	<?php include('../headers/nav.php'); ?>


	</ul>
	<div class="icon menu-btn">
		<i class="fas fa-bars"></i>

	</div>
	</div>
	</div>


	<div class="contain1">
		<img src="../../css/images/falls.jpg" class="image" id="img">
		<h1>Enter Your Details <br>and Join US</h1>


	</div>
	<div class="contain2">

		<div class="whole">
			<div class="logo">
				<img src="../../css/images/logo3.png">
				<h2>Visual Select</h2>
			</div>
			<form action="" method="POST" enctype="multipart/form-data" class="form" onsubmit="return validated()">
				<h3>Sign Up</h3>
				<input type="text" placeholder="Username" name="username" required>

				<input type="email" placeholder="Email" name="email" required>

				<input type="password" placeholder="Password" name="password" required>

				<input type="password" placeholder="Confirm Password" name="cpassword" required>

				<input type="date" placeholder="Date Of Birth" name="dob">

				<input type="file"  name="image" id = "image" >

				<button name="submit" class="btn">Sign In</button>
			</form>

			<text>Already Registered&nbsp;&nbsp;&nbsp;<span><a href="login.php">Login Now</span></a></text>
		</div>
	</div>
	<script src="../../css/js/nav_responsive.js"></script>

	<?php include('../headers/footer.php'); ?>
</body>

</html>
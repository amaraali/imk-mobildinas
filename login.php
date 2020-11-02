<?php
session_start();
require 'functions.php';

// cek cookie
if(isset($_COOKIE['id']) && isset($_COOKIE['key']) ){
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	// cek username berdasarkan cookie
	$result = mysqli_query($conn, "SELECT username FROM users WHERE id=$id" );
	$row = mysqli_fetch_assoc($result);

	// cek cookie dan username
	if($key === hash('sha256', $row['username'])) {
		$_SESSION['login'] = true;
	}
}

if(isset($_SESSION["login"])){
	header("Location: pages/home.php");
	exit;
}



if(isset($_POST["login"])){
	// print_r($_POST);die;
	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

	// cek username
	if(mysqli_num_rows($result) === 1){

		// cek pass
		$row = mysqli_fetch_assoc($result);
		// dd($_POST);
		if(password_verify($password, $row["password"])){

			// set session 
			$_SESSION["login"] = true;
			$_SESSION["username"] = $username;
			$_SESSION["id_user"] = $row["id"];
			$_SESSION["nama"] = $row["nama"];
			$_SESSION["level"] = $row["level"];

			// cek remember me
			if(isset($_POST['remember'])){
				setcookie('id', $row['id'], time()+60);
				setcookie('key', hash('sha256', $username['username']), time()+60);
			}

			header("Location: pages/home.php");
			exit;
		}
	}

	$error = true;

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>

	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-02.png');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Account Login
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" action="" method="post">

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username" id="username">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password" id="password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<?php if(isset($error)): ?>
							<p class="container-login100-form m-t-32" style="color: red; font-style: italic; text-align: center;">username / password salah!</p>
						<?php endif; ?>


					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn" type="submit" name="login">
							Login
						</button>
					</div>					
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
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

<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="amara, fachrizal, ghamal, bharaka">
    <title>Login Account</title>

<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <link href="login.css" rel="stylesheet">
  </head>
  <body class="text-center">
   <form class="form-signin" action="" method="post">
	  <img class="mb-4" src="pages/img/mcs.png" alt="" width="150" height="150">
	  <h1 class="h3 mb-3 font-weight-normal">Please Login</h1>
	  <label for="username" class="sr-only">Username</label>
	  <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus autocomplete="off">
	  <label for="password" class="sr-only">Password</label>
	  <input type="password" id="password" name="password" class="form-control" placeholder="Password" required autocomplete="off">
	  		<?php if(isset($error)): ?>
				<p class="container-login100-form m-t-32" style="color: red; font-style: italic; text-align: center;">username / password salah!</p>
			<?php endif; ?>
	  <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Login</button>
	  <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
	</form>
</body>
</html>
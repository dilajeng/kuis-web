<?php 
	session_start();
	if (isset($_SESSION["login"])) {
		header("Location: index.php");
		exit;
	}

	require 'functions.php';

	if (isset($_POST["login"])) {
		$email = $_POST["email"];
		$password = $_POST["password"];

		$result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

		// cek email
		if (mysqli_num_rows($result) == 1) {
			// cek password
			$row = mysqli_fetch_Assoc($result);
			if ($password == $row["password"]) {
				// set session
				$_SESSION["login"] = true;

				header("Location: index.php");
				exit;
			} else {
				echo "
					<script>
						alert('email / password tidak sesuai!')
					</script>
				";
			}
		} else {
				echo "
					<script>
						alert('email / password tidak sesuai!')
					</script>
				";
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<style>
		body {
			background-color: #40d6ff;
		}
		#row {
			position: absolute;
			top: 30%;
			bottom: 30%;
			left: 0;
			right: 0;
		}
		#login {
			height: 450px;
			width: 450px;
			margin: auto;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="col-md-4 mx-auto" id="row">
			<div class="card shadow-lg" id="login">
				<div class="card-body">
					<h4 class="text-center mt-3 mb-4">Welcome</h4>
					<form action="" method="post">
					  <div class="form-group">
					    <label for="exampleInputEmail1">Email</label>
					    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
					  </div>
					  <div class="form-group">
					    <label for="exampleInputPassword1">Password</label>
					    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
					  </div>
					  <center><button type="submit" class="btn btn-primary rounded-pill pl-5 pr-5 mt-2" name="login">Login</button></center>
					  <center><small><a href="registrasi.php">Belum punya akun? Daftar sekaranag!</a></small></center>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
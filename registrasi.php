<?php 
	require 'functions.php';
	if (isset($_POST['registrasi'])) {
		if (registrasi($_POST) > 0) {
			echo "<script>
					alert('user baru berhasil ditambahkan!');
				</script>";
		}
	} else {
		echo mysqli_error($conn);
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
					<h4 class="text-center mt-3 mb-4">Registrasi</h4>
					<form action="" method="post">
					  <div class="form-group">
					    <label for="exampleInputEmail1">Email</label>
					    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
					  </div>
					  <div class="form-group">
					    <label for="exampleInputPassword1">Password</label>
					    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
					  </div>
					  <center><button type="submit" class="btn btn-primary rounded-pill pl-5 pr-5 mt-2" name="registrasi">Daftar</button></center>
					  <center><small><a href="login.php">Sudah punya akun? Login sekaranag!</a></small></center>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
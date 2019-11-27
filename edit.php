<?php 
	session_start();
	if (!isset($_SESSION["login"])) {
		header("Location: login.php");
		exit;
	}
	
	require 'functions.php';

	// ambil data di URL
	$id = $_GET["id"];

	// query data mahasiswa berdasarkan id
	$mahasiswa = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

	// cek apakah tombol submit sudah ditekan atau belum
	if (isset($_POST["submit"])) {
		// cek apakah data berhasil di edit atau tidak
		if (edit($_POST) > 0) {
			echo "
				<script>
					alert('data berhasil di edit!');
					document.location.href = 'index.php';
				</script>
			";
		} else {
			echo "
				<script>
					alert('data gagal di edit!');
					document.location.href = 'index.php';
				</script>
			";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Data</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<div class="card shadow">
					<div class="card-header">
						<h4 class="text-primary text-left d-inline">Edit Data</h4>
					</div>
					<div class="card-body">
						<form action="" method="post">
				        	<div class="input-group mb-3">
							  <div class="input-group-prepend">
							    <span class="input-group-text" id="inputGroup-sizing-default">NIM</span>
							  </div>
							  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="nim" value="<?= $mahasiswa["nim"]; ?>">
							  <input type="hidden" name="id" value="<?= $mahasiswa["id"]; ?>">
							</div>

							<div class="input-group mb-3">
							  <div class="input-group-prepend">
							    <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
							  </div>
							  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="email" value="<?= $mahasiswa["email"]; ?>">
							</div>

							<div class="input-group mb-3">
							  <div class="input-group-prepend">
							    <span class="input-group-text" id="inputGroup-sizing-default">Nama</span>
							  </div>
							  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="nama" value="<?= $mahasiswa["nama"]; ?>">
							</div>

							<div class="input-group mb-3">
							  <div class="input-group-prepend">
							    <span class="input-group-text" id="inputGroup-sizing-default">Jurusan</span>
							  </div>
							  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="jurusan" value="<?= $mahasiswa["jurusan"]; ?>">
							</div>

							<button type="reset" class="btn btn-danger">Reset</button>
							<button type="submit" name="submit" class="btn btn-primary">Edit Data</button>
				        </form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
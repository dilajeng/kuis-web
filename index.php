<?php
	session_start();
	if (!isset($_SESSION["login"])) {
		header("Location: login.php");
		exit;
	}

	require 'functions.php';

	$mahasiswa = query("SELECT * FROM mahasiswa");

	if (isset($_POST["tambah-data"])) {
		tambah ($_POST);
		header("Location: index.php");
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CRUD</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<div class="card shadow">
					<div class="card-header">
						<h4 class="text-primary text-left d-inline">Data Super</h4>
						<!-- Button trigger modal tambah data -->
						<a href="logout.php" class="btn btn-sm btn-danger float-right ml-2"><i class="fas fa-sign-out-alt"></i> Logout</a>
						<button type="submit" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#tambahData">
						  <i class="fas fa-plus-circle"></i> Tambah data
						</button>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>
										<td>No</td>
										<td>NIM</td>
										<td>email</td>
										<td>Nama</td>
										<td>Jurusan</td>
										<td>&nbsp;&nbsp;&nbsp;Aksi</td>
									</tr>
								</thead>
								<tbody>
									<?php
									 $i = 1;
									 foreach ($mahasiswa as $row): ?>
										<tr>
											<td><?= $i++; ?></td>
											<td><?= $row["nim"]; ?></td>
											<td><?= $row["email"]; ?></td>
											<td><?= $row["nama"]; ?></td>
											<td><?= $row["jurusan"]; ?></td>
											<td>
												<a href="edit.php?id=<?= $row["id"]; ?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
												<a href="hapus.php?id=<?= $row["id"]; ?>" class="btn btn-sm btn-danger" onclick = "return confirm('yakin?')"><i class="fa fa-trash"></i></a>
											</td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal Tambah Data -->
	<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form action="" method="post">
	        	<div class="input-group mb-3">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="inputGroup-sizing-default">NIM</span>
				  </div>
				  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="nim">
				</div>

				<div class="input-group mb-3">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
				  </div>
				  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="email">
				</div>

				<div class="input-group mb-3">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="inputGroup-sizing-default">Nama</span>
				  </div>
				  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="nama">
				</div>

				<div class="input-group mb-3">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="inputGroup-sizing-default">Jurusan</span>
				  </div>
				  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="jurusan">
				</div>

				<button type="reset" class="btn btn-danger">Reset</button>
				<button type="submit" name="tambah-data" class="btn btn-primary">Tambah Data</button>
	        </form>
	      </div>
	    </div>
	  </div>
	</div>

	

	

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
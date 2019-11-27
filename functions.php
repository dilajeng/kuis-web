<?php 
	// koneksi ke database
	$conn = mysqli_connect("localhost", "root", "", "responsi");

	function query($query) {
		global $conn;
		$result = mysqli_query($conn, $query);
		$rows = [];
		while($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}

		return $rows;
	}

	function tambah($data) {
		global $conn;

		// ambil data dari tiap elemen dalam form
		$nim = htmlspecialchars($data["nim"]);
		$email = htmlspecialchars($data["email"]);
		$nama = htmlspecialchars($data["nama"]);
		$jurusan = htmlspecialchars($data["jurusan"]);

		// query insert data
		$query = "INSERT INTO mahasiswa VALUES
					('', '$nim', '$email', '$nama', '$jurusan')
				";
		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}

	function hapus($id) {
		global $conn;

		mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");

		return mysqli_affected_rows($conn);
	}

	function edit($data) {
		global $conn;

		// ambil data dari tiap elemen dalam form
		$id = htmlspecialchars($data["id"]);
		$nim = htmlspecialchars($data["nim"]);
		$email = htmlspecialchars($data["email"]);
		$nama = htmlspecialchars($data["nama"]);
		$jurusan = htmlspecialchars($data["jurusan"]);

		// query insert data
		$query = "UPDATE mahasiswa SET
					nim = '$nim', email = '$email', nama = '$nama', jurusan = '$jurusan'
					WHERE id = $id
				";
		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}

	function registrasi($data) {
		global $conn;
		$email = strtolower(stripcslashes($data["email"]));
		$password = mysqli_real_escape_string($conn, $data["password"]);

		// cek email sudah ada atau belum
		$result = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
		if (mysqli_fetch_assoc($result)) {
			echo "<script>
					alert('email sudah terdaftar!')
				</script>";
			return false;
		}
		
		// tambahkan user baru ke database
		mysqli_query($conn, "INSERT INTO users VALUES('', '$email', '$password')");

		return mysqli_affected_rows($conn);
	}
?>
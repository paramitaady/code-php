<?php

	include('koneksi.php');

	if (isset($_POST['submit'])) {
		$id_petugas = $_POST['id_petugas'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$nama = $_POST['nama'];
		$posisi = $_POST['posisi'];

		mysqli_query($koneksi, "INSERT INTO petugas (id_petugas, username, password, nama, posisi) VALUES ('$id_petugas', '$username', '$password', '$nama', '$posisi')");
	}

	mysqli_close($koneksi);
	echo "<script>alert('Data Berhasil Ditambah..');
	location.href='../kades/tables/data_petugas.php'
	</script>";

?>
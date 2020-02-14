<?php
include('koneksi.php');

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$nama = $_POST['nama'];


	mysqli_query($koneksi, "UPDATE petugas SET username = '$username', password = '$password', nama = '$nama' WHERE username = '$username'");
}

mysqli_close($koneksi);
	echo "<script>alert('Data Berhasil Diubah..');
	location.href='../pk/forms/profil.php'
	</script>";
?>
<?php
include('koneksi.php');

if (isset($_POST['submit'])) {
	$id_petugas = $_POST['id_petugas'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$nama = $_POST['nama'];
	//$posisi = $_POST['posisi'];


	mysqli_query($koneksi, "UPDATE petugas SET id_petugas = '$id_petugas', username = '$username', password = '$password', nama = '$nama' WHERE id_petugas = '$id_petugas'");
}

mysqli_close($koneksi);
	echo "<script>alert('data Berhasil Diubah..');
	location.href='../kades/tables/data_petugas.php'
	</script>";
?>
<?php
include('koneksi.php');

if (isset($_POST['submit'])) {
	$id_petugas = $_POST['id_petugas'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$nama = $_POST['nama'];

	$query = mysqli_query($koneksi, "SELECT id_petugas FROM petugas ");
	$hasil = mysqli_fetch_array($query);

}

	mysqli_close($koneksi);
	header("Location: ../admin/forms/profil.php");

?>
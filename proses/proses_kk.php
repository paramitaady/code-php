<?php
	include('koneksi.php');
	
	$nik = $_GET['nik'];

	mysqli_query($koneksi, "SELECT no_kk FROM penduduk WHERE nik = '$nik'");

	mysqli_close($koneksi);

	header("Location: ../admin/tables/data_penduduk.php");

?>
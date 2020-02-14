<?php

	include('koneksi.php');

	$id_petugas = $_GET['id_petugas'];

	mysqli_query($koneksi, "DELETE FROM petugas WHERE id_petugas = '$id_petugas'");

	mysqli_close($koneksi);
	echo "<script>alert('Data Berhasil Diubah..');
	location.href='../kades/tables/data_petugas.php'
	</script>";

?>
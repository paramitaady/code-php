<?php
	include('koneksi.php');
	
	$id_kegiatan = $_GET['id_kegiatan'];

	mysqli_query($koneksi, "DELETE FROM kegiatan WHERE id_kegiatan = '$id_kegiatan'");

	mysqli_close($koneksi);

	header("Location: ../admin/tables/data_kegiatan.php");

?>
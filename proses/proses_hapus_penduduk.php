<?php
	include('koneksi.php');

	$nik = $_GET['nik'];

	mysqli_query($koneksi, "DELETE FROM penduduk WHERE nik = '$nik'");

	mysqli_close($koneksi);
	echo "<script>alert('Data Berhasil Dihapus..');
	location.href='../admin/tables/data_penduduk.php'
	</script>";
	
?>
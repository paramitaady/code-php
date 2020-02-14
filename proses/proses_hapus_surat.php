<?php
	include('koneksi.php');

	$no_surat = $_GET['no_surat'];

	mysqli_query($koneksi, "DELETE FROM surat WHERE no_surat = '$no_surat'");

	mysqli_close($koneksi);
	echo "<script>alert('Data Berhasil Dihapus..');
	location.href='../admin/tables/data_surat.php'
	</script>";
?>
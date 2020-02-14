<?php
include('koneksi.php');

if (isset($_POST['submit'])) {
	$no_surat = $_POST['no_surat'];
	$tanggal = $_POST['tanggal'];
	$jenis_surat = $_POST['jenis_surat'];
	$tujuan = $_POST['tujuan'];
	$keterangan = $_POST['keterangan'];
	$perihal = $_POST['perihal'];
	$nik = $_POST['nik'];


	mysqli_query($koneksi, "UPDATE surat SET no_surat = '$no_surat', tanggal = '$tanggal', jenis_surat='$jenis_surat', tujuan = '$tujuan', keterangan = '$keterangan', perihal = '$perihal' WHERE nik = '$nik'");
}

mysqli_close($koneksi);
	echo "<script>alert('Data Berhasil Diubah..');
	location.href='../admin/surat/hasil_edit_surat.php?no_surat=".$_POST['no_surat']."'
	</script>";
?>
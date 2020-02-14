<?php
include ('koneksi.php');

if (isset($_POST['submit'])) {
	$id_kegiatan = $_POST['id_kegiatan'];
	$nama_kegiatan = $_POST['nama_kegiatan'];
	$lembaga = $_POST['lembaga'];
	$tanggal_kegiatan = $_POST['tanggal_kegiatan'];
	$lokasi = $_POST['lokasi'];
	// $dana = $_POST['dana'];

	mysqli_query($koneksi, "INSERT INTO kegiatan (id_kegiatan, nama_kegiatan, lembaga, tanggal_kegiatan, lokasi) VALUES ('$id_kegiatan', '$nama_kegiatan', '$lembaga', '$tanggal_kegiatan', '$lokasi')");
}
	mysqli_close($koneksi);
	header("Location: ../admin/tables/data_kegiatan.php");
?>
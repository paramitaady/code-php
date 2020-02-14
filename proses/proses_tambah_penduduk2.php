<?php
include('koneksi.php');

if (isset($_POST['submit'])) {
	$nik = $_POST['nik'];
	$nama = $_POST['nama'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$tempat_lahir = $_POST['tempat_lahir'];
	$tanggal_lahir = $_POST['tanggal_lahir'];
	$no_kk = $_POST['no_kk'];
	$agama = $_POST['agama'];
	$goldar = $_POST['goldar'];
	$pendidikan = $_POST['pendidikan'];
	$pekerjaan = $_POST['pekerjaan'];
	$status_hub_keluarga = $_POST['status_hub_keluarga'];
	$status_perkawinan = $_POST['status_perkawinan'];
	$status_kependudukan = $_POST['status_kependudukan'];
	$kewarganegaraan = $_POST['kewarganegaraan'];
	$nama_ibu = $_POST['nama_ibu'];
	$nama_ayah = $_POST['nama_ayah'];
	$alamat = $_POST['alamat'];

	// $query1 = mysqli_query($koneksi, "SELECT id_pendidikan FROM pendidikan");
	// $hasil1 = msqli_fetch_array($query1);

	// $query2 = mysqli_query($koneksi, "SELECT * FROM pekerjaan");
	// $hasil2 = mysqli_fetch_array($query2);

	mysqli_query($koneksi, "INSERT INTO penduduk (nik, nama, jenis_kelamin, tempat_lahir, tanggal_lahir, no_kk, agama, goldar, pendidikan, pekerjaan, status_hub_keluarga, status_perkawinan, status_kependudukan, kewarganegaraan, nama_ibu, nama_ayah, alamat) VALUES ('$nik', '$nama', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$no_kk', '$agama', '$goldar', '$pendidikan', '$pekerjaan', '$status_hub_keluarga', '$status_perkawinan', '$status_kependudukan', '$kewarganegaraan', '$nama_ibu', '$nama_ayah', '$alamat')");

}

	mysqli_close($koneksi);
	header("Location: ../admin/tables/data_surat.php");

?>
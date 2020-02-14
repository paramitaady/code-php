<?php
include ('koneksi.php');

if (isset($_POST['submit'])) {
	$nik = $_POST['nik'];
	$nama = $_POST['nama'];
	// $jenis_kelamin = $_POST['jenis_kelamin'];
	$no_kk = $_POST['no_kk'];
	$agama = $_POST['agama'];
	// $goldar = $_POST['goldar'];
	// $pendidikan = $_POST['pendidikan'];
	// $pekerjaan = $_POST['pekerjaan'];
	$status_hub_keluarga = $_POST['status_hub_keluarga'];
	$status_perkawinan = $_POST['status_perkawinan'];
	$status_kependudukan = $_POST['status_kependudukan'];
	$kewarganegaraan = $_POST['kewarganegaraan'];
	$nama_ibu = $_POST['nama_ibu'];
	$nama_ayah = $_POST['nama_ayah'];
	$alamat = $_POST['alamat'];


	// $query = mysqli_query($koneksi,"SELECT id_pendidikan FROM pendidikan WHERE tingkat_pendidikan = '$pendidikan'");
	// $hasil = mysqli_fetch_array($query);

	// $query2 = mysqli_query($koneksi, "SELECT id_pekerjaan FROM pekerjaan WHERE keterangan ='$pekerjaan'");

	mysqli_query($koneksi, "UPDATE penduduk SET nik = '$nik', nama = '$nama', no_kk = '$no_kk', agama = '$agama', status_hub_keluarga = '$status_hub_keluarga', status_perkawinan = '$status_perkawinan', status_kependudukan = '$status_kependudukan', kewarganegaraan = '$kewarganegaraan', nama_ibu = '$nama_ibu', nama_ayah = '$nama_ayah', alamat = '$alamat' WHERE nik = '$nik'");
}

mysqli_close($koneksi);
header("Location: ../admin/tables/data_penduduk.php");
?>
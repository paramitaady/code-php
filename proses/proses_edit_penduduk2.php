<?php 
	include('koneksi.php');
	if(isset($_POST['submit'])){
		$nik = $_POST['nik'];
		$nama = $_POST['nama'];
		$jenis_kelamin = $_POST['jenis_kelamin'];
		$tempat_lahir = $_POST['tempat_lahir'];
		$tanggal_lahir = $_POST['tanggal_lahir'];
		$no_kk = $_POST['no_kk'];
		$agama  = $_POST['agama'];
		$goldar  = $_POST['goldar'];
		$pendidikan  = $_POST['pendidikan'];
		$pekerjaan  = $_POST['pekerjaan'];
		$status_hub_keluarga  = $_POST['status_hub_keluarga'];
		$status_perkawinan  = $_POST['status_perkawinan'];
		$status_kependudukan  = $_POST['status_kependudukan'];
		$kewarganegaraan  = $_POST['kewarganegaraan'];
		$nama_ayah  = $_POST['nama_ayah'];
		$nama_ibu  = $_POST['nama_ibu'];
		$rt  = $_POST['rt'];
		$alamat  = $_POST['alamat'];

		mysqli_query($koneksi, "UPDATE penduduk SET nik = '$nik', nama = '$nama', jenis_kelamin = '$jenis_kelamin', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', no_kk = '$no_kk', agama = '$agama', goldar = '$goldar', pendidikan = '$pendidikan', pekerjaan = '$pekerjaan', status_hub_keluarga = '$status_hub_keluarga', status_perkawinan = '$status_perkawinan', status_kependudukan = '$status_kependudukan', kewarganegaraan = '$kewarganegaraan', nama_ayah = '$nama_ayah', nama_ibu = '$nama_ibu', rt = '$rt', alamat = '$alamat' WHERE nik = '$nik'");
	}
	mysqli_close($koneksi);
	header('Location: ../../admin/tables/data_penduduk.php');
?>
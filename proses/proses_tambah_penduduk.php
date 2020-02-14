<?php
include('koneksi.php');
if(isset($_POST['submit'])){
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


	$query = mysqli_query($koneksi,"SELECT id_pendidikan FROM pendidikan WHERE tingkat_pendidikan = '$pendidikan'");
	$hasil = mysqli_fetch_array($query);

	$query2 = mysqli_query($koneksi, "SELECT id_pekerjaan FROM pekerjaan WHERE keterangan ='$pekerjaan'");
	$hasil2 = mysqli_fetch_array($query2);

	$cek_data = mysqli_query($koneksi, "SELECT * FROM penduduk WHERE nik='$nik'");
	$hasilnya = mysqli_num_rows($cek_data);

	if ($hasilnya > 0) {
		echo "<script>
		alert('NIK sudah ada');
		location='../admin/forms/tambah_penduduk.php';
		</script>";
	}else{
		mysqli_query($koneksi, "INSERT INTO penduduk (nik, nama, jenis_kelamin, tempat_lahir, tanggal_lahir, no_kk, agama, goldar, id_pendidikan, id_pekerjaan, status_hub_keluarga, status_perkawinan, status_kependudukan, kewarganegaraan, nama_ibu, nama_ayah, alamat) VALUES ('$nik', '$nama', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$no_kk', '$agama', '$goldar', '$hasil[id_pendidikan]', '$hasil2[id_pekerjaan]', '$status_hub_keluarga', '$status_perkawinan', '$status_kependudukan', '$kewarganegaraan', '$nama_ibu', 'nama_ayah', '$alamat')");	


		echo "<script>
		alert('Data Berhasil Ditambahkan...');
		location='../admin/forms/tambah_penduduk.php';
		</script>";

	}

}
		mysqli_close($koneksi);

?>


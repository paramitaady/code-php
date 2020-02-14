<?php 
include 'koneksi.php';
include "../admin/import_data/excel_reader2.php";

$target = basename($_FILES['filependuduk']['name']) ;
move_uploaded_file($_FILES['filependuduk']['tmp_name'], $target);

chmod($_FILES['filependuduk']['name'],0777);

$data = new Spreadsheet_Excel_Reader($_FILES['filependuduk']['name'],false);
$jumlah_baris = $data->rowcount($sheet_index=0);

$berhasil = 0;
for ($i=20; $i<=$jumlah_baris; $i++){

	$nik     = $data->val($i, 1);
	$nama = $data->val($i, 2);
	$jenis_kelamin   = $data->val($i, 3);
	$tempat_lahir  = $data->val($i, 4);
	$tanggal_lahir = $data->val($i, 5);
	$no_kk = $data->val($i, 6);
	$agama = $data->val($i, 7);
	$goldar = $data->val($i, 8);
	$id_pendidikan = $data->val($i, 9);
	$id_pekerjaan = $data->val($i, 10);
	$status_hub_keluarga = $data->val($i, 11);
	$status_perkawinan = $data->val($i, 12);
	$status_kependudukan = $data->val($i, 13);
	$kewarganegaraan = $data->val($i, 14);
	$nama_ibu = $data->val($i, 15);
	$nama_ayah = $data->val($i, 16);
	$alamat = $data->val($i, 17);

	if($nik != "" && $nama != "" && $jenis_kelamin != "" && $tempat_lahir != "" && $tanggal_lahir != "" && $no_kk != "" && $agama != "" && $goldar != "" && $id_pendidikan != "" && $id_pekerjaan != "" && $status_hub_keluarga != "" && $status_perkawinan != "" && $status_kependudukan != "" && $kewarganegaraan != "" && $nama_ibu != "" && $nama_ayah != "" && $alamat != ""){
		
		mysqli_query($koneksi,"INSERT into penduduk values('','$nik','$nama','$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$no_kk', '$agama', '$goldar', '$id_pendidikan', '$id_pekerjaan', '$status_hub_keluarga', '$status_perkawinan', '$status_kependudukan', '$kewarganegaraan', '$nama_ibu', '$nama_ayah', '$alamat')");
		$berhasil++;
	}
}

unlink($_FILES['filependuduk']['name']);

header("location:../admin/tables/data_penduduk.php?berhasil=$berhasil");


?>


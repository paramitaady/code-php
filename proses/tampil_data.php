<?php
include("koneksi.php");


$nik = mysqli_escape_string($koneksi, $_POST['nik']);

// $query = mysqli_query($koneksi, "SELECT pdd.nik, pdd.nama, pdd.jenis_kelamin, pdd.tempat_lahir, pdd.tanggal_lahir, pdd.agama, pdd.alamat, pek.keterangan FROM pekerjaan pek JOIN penduduk pdd ON (pdd.id_pekerjaan = pek.id_pekerjaan) WHERE nik='$nik'");

$query = mysqli_query($koneksi, "SELECT nik, nama, jenis_kelamin, tempat_lahir, tanggal_lahir, agama, id_pekerjaan, alamat FROM penduduk WHERE nik='$nik'");
$hasil = mysqli_fetch_array($query);

echo json_encode($hasil);

?>
<?php
include('koneksi.php');
//Ambil data dari address bar
$id_laporan	= @$_GET['id_laporan'];
$lampiran = @$_GET['lampiran'];

// Tentukan lokasi file yang akan dihapus
$hapus= "../laporan/".$lampiran."";

// Jalankan query hapus data di database

$sql = "DELETE FROM laporan WHERE id_laporan='$id_laporan'";
// $sql 	= 'DELETE FROM laporan WHERE id_laporan="'.$id_laporan.'"';
$query	= mysqli_query($koneksi,$sql);

//Hapus file
@unlink($hapus);

// Keterangan berhasil dihapus
echo "<script>alert('File Berhasil Dihapus..');location.href='../admin/tables/laporan.php'</script>";

?>
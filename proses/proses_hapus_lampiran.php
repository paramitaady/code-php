<?php
include('koneksi.php');
//Ambil data dari address bar
$id_lampiran	= @$_GET['id_lampiran'];
$lampiran = @$_GET['lampiran'];


// Tentukan lokasi file yang akan dihapus
$hapus= "../laporan/".$lampiran."";

// chown($hapus, 666);


// Jalankan query hapus data di database

$sql = "DELETE FROM lampiran WHERE id_lampiran='$id_lampiran'";
// $sql 	= 'DELETE FROM laporan WHERE id_laporan="'.$id_laporan.'"';
$query	= mysqli_query($koneksi,$sql);

//Hapus file
@unlink($hapus);

// Keterangan berhasil dihapus
echo "<script>alert('File Berhasil Dihapus..');location.href='../admin/tables/lampiran.php?'</script>";

?>
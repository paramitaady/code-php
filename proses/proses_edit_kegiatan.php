<?php
 include ('koneksi.php');

 if (isset($_POST['submit'])) {
 	$id_kegiatan = $_POST['id_kegiatan'];
 	$nama_kegiatan = $_POST['nama_kegiatan'];
 	$lembaga = $_POST['lembaga'];
 	$tanggal_kegiatan = $_POST['tanggal_kegiatan'];
 	$lokasi = $_POST['lokasi'];

 	mysqli_query($koneksi, "UPDATE kegiatan SET id_kegiatan = '$id_kegiatan', nama_kegiatan = '$nama_kegiatan', lembaga = '$lembaga', tanggal_kegiatan = '$tanggal_kegiatan', lokasi = '$lokasi' WHERE id_kegiatan = '$id_kegiatan'");
 }

 mysqli_close($koneksi);
	echo "<script>alert('Data Berhasil Diubah..');
	location.href='../admin/tables/data_kegiatan.php'
	</script>";
?>
<?php
include('koneksi.php');

if (isset($_POST['submit'])) {
	
	// $id_surat = $_POST['id_surat'];
	// $no = $_POST['no'];
	$no_surat = $_POST['no_surat'];
	$tanggal = $_POST['tanggal'];
	$jenis_surat = $_POST['jenis_surat'];
	$tujuan = $_POST['tujuan'];
	$keterangan = $_POST['keterangan'];
	// $perihal = $_POST['perihal'];
	$nik = $_POST['nik'];

	$query = mysqli_query($koneksi, "INSERT INTO surat (no_surat, tanggal, jenis_surat, tujuan, keterangan, nik) VALUES ('$no_surat', '$tanggal', '$jenis_surat', '$tujuan', '$keterangan', '$nik')");
}

mysqli_close($koneksi);
echo "<script>alert('Data Berhasil Ditambah..');
location.href='../admin/surat/keterangan_berkelakuan_baik.php'
</script>";
?>
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
	$tgl_meninggal = $_POST['tgl_meninggal'];
	$nik = $_POST['nik'];
	$tgl_meninggal = $_POST['tgl_meninggal'];

	$query = mysqli_query($koneksi, "INSERT INTO surat (no_surat, tanggal, jenis_surat, tujuan, keterangan, tgl_meninggal, nik) VALUES ('$no_surat', '$tanggal', '$jenis_surat', '$tujuan', '$keterangan', '$tgl_meninggal', '$nik')");

	$query2 = mysqli_query($koneksi, "UPDATE penduduk SET status_kependudukan = 'Meninggal', tgl_perubahan = '$tgl_meninggal' WHERE nik = '$nik'");
}

mysqli_close($koneksi);
echo "<script>alert('Data Berhasil Ditambah..');
location.href='../admin/surat/keterangan_kematian.php'
</script>";
?>
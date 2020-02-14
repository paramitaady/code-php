<!-- <?php
include ('koneksi.php');

if(isset($_POST['submit'])) {
	
	$tanggal = $_POST['tanggal'];
	$perihal = $_POST['perihal'];
  // Baca lokasi file sementara dan nama file dari form (fupload)
	$lokasi = $_FILES['lampiran']['tmp_name'];
	$lampiran = $_FILES['lampiran']['name'];

  // Tentukan folder untuk menyimpan file
	$folder = "../laporan/$lampiran";

  // Masukkan informasi file ke database
	$query = "INSERT INTO laporan(tanggal, perihal, lampiran) VALUES ('$tanggal', '$perihal', '$lampiran')";

	$hasil= mysqli_query($koneksi,$query);
	if ($hasil) {
		move_uploaded_file ($lokasi,"$folder");
		echo "<script>alert('File Berhasil Ditambah..');location.href='../admin/tables/laporan.php?m=daftar-File'</script>";
	}
	else{
		echo "<script>alert('File Gagal Ditambah..');location.href='../admin/forms/tambah_laporan.php?m=tambah-File'</script>";
	}

}


?> -->


<?php
include ('koneksi.php');

if (isset($_POST['submit'])) {
	$id_laporan = $_POST['id_laporan'];
	$tanggal = $_POST['tanggal'];
	$perihal = $_POST['perihal'];

	mysqli_query($koneksi, "INSERT INTO laporan (id_laporan, tanggal, perihal) VALUES ('$id_laporan', '$tanggal', '$perihal')");
}
	mysqli_close($koneksi);
	header("Location: ../admin/tables/laporan.php");
?>
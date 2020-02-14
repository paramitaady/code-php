<?php

include ('koneksi.php');

if(isset($_POST['submit'])) {
	
	$tanggal = $_POST['tanggal'];
	$perihal = $_POST['perihal'];
	$lokasi = $_FILES['lampiran']['tmp_name'];
	$lampiran = $_FILES['lampiran']['name'];

  // Tentukan folder untuk menyimpan file
	$folder = "../admin/forms/laporan/$lampiran";

  // Masukkan informasi file ke database
	$query = "INSERT INTO laporan(tanggal, perihal, lampiran) VALUES ('$tanggal', '$perihal', '$lampiran')";

	$hasil= mysqli_query($koneksi,$query);
	if ($hasil) {
		move_uploaded_file ($lokasi,"$folder");

		echo "<script>alert('File Berhasil Ditambah..');location.href='../admin/forms/wa_link.php'</script>";
	}
	else{
		echo "<script>alert('File Gagal Ditambah..');location.href='../admin/forms/tambah_laporan.php'</script>";
	}

}

?>
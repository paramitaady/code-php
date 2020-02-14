<?php
include ('koneksi.php');

if(isset($_POST['submit'])) {
	
	$id_laporan = $_POST['id_laporan'];
	// $perihal = $_POST['perihal'];
  // Baca lokasi file sementara dan nama file dari form (fupload)
	$lokasi = $_FILES['lampiran']['tmp_name'];
	$lampiran = $_FILES['lampiran']['name'];
	$link = $_POST['link'];

  // Tentukan folder untuk menyimpan file
	$folder = "../laporan/$lampiran";

  // Masukkan informasi file ke database
	$query = "INSERT INTO lampiran(lampiran, link, id_laporan) VALUES ('$lampiran', '$link', '$id_laporan')";

	$hasil= mysqli_query($koneksi,$query);
	
	if ($hasil) {
		move_uploaded_file ($lokasi,"$folder");
		echo "<script>alert('File Berhasil Ditambah..');location.href='../admin/tables/laporan.php'</script>";
	}
	else{
		echo "<script>alert('File Gagal Ditambah..');location.href='../admin/forms/tambah_lampiran.php'</script>";
	}

}


?>

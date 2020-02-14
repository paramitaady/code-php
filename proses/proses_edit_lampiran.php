<?php
include ('koneksi.php');

// $id_lampiran = $_GET['id_lampiran'];
$query  = "SELECT * FROM laporan";
$data    = mysqli_query($koneksi, $query);
// $lampiran  = mysqli_fetch_array($data);

// Jika tombol simpan yang mempunyane name"ubah" ditekan
if(isset($_POST['submit'])) {

	$id_lampiran = $_POST['id_lampiran'];
	// $tanggal = $_POST['tanggal'];
	// $perihal = $_POST['perihal'];

  // Baca lokasi file sementara dan nama file dari form (fupload)
	$lokasi = $_FILES['lampiran']['tmp_name'];
	$lampiran = $_FILES['lampiran']['name'];

  // Tentukan folder untuk menyimpan file
	$folder = "../laporan/$lampiran";

	$query = "UPDATE  lampiran SET lampiran = '$lampiran' WHERE id_lampiran='$id_lampiran'";

	$hasil= mysqli_query($koneksi,$query);


	$query2 = mysqli_query($koneksi, "SELECT * FROM lampiran WHERE id_lampiran='$id_lampiran'");
	$hasilnya = mysqli_fetch_array($query2);

	$file= "../laporan/".$hasilnya['lampiran']."";
	if ($hasil) {
		@unlink($file);
		move_uploaded_file ($lokasi,"$folder");
		echo "<script>alert('File Berhasil Diubah..');location.href='../admin/tables/laporan.php'</script>";
	}
	else{
		echo "Mohon Coba lagi";
	}
}

?>
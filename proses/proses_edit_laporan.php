<?php
include ('koneksi.php');

// Jika tombol simpan yang mempunyane name"ubah" ditekan
if(isset($_POST['submit'])) {

	// $sql="SELECT * FROM  laporan WHERE id_laporan='$_GET[id_laporan]'";
	// $tampil=mysqli_query($koneksi,$sql);
	// $data = mysqli_fetch_array($tampil);

	$id_laporan = $_POST['id_laporan'];
	$perihal = $_POST['perihal'];
	$tanggal = $_POST['tanggal'];

  // Baca lokasi file sementara dan nama file dari form (fupload)
	$lokasi = $_FILES['lampiran']['tmp_name'];
	$lampiran = $_FILES['lampiran']['name'];

  // Tentukan folder untuk menyimpan file
	$folder = "../admin/forms/laporan/$lampiran";
	

  // Jika tidak ada file yang dipilih, maka hanya merubah informasinya saja
	if(!$lokasi){

  // Masukkan informasi file ke database
		$query = "UPDATE  laporan SET tanggal = '$tanggal', perihal = '$perihal' WHERE id_laporan='$id_laporan'";

// Memasukan data ke database dengan menggunakan koneksi yang ada di file koneksi.php
		$hasil =  mysqli_query($koneksi,$query);
		if ($hasil) {

    //pindah file ke dalam folder yang di web server
			move_uploaded_file ($lokasi,"$folder");
			echo "<script>alert('File Berhasil Dirubah..');location.href='../admin/tables/laporan.php'</script>";
		}
		else{
			echo "<script>alert('File l Dirubah..');location.href='../admin/tables/laporan.php'</script>";
		}
	}
// Jika ada file yang dipilih, maka file yang lama diganti dengan file yang baru
	else{

  // Masukkan informasi file ke database
		$query = "UPDATE  laporan SET tanggal = '$tanggal', perihal = '$perihal', lampiran = '$lampiran' WHERE id_laporan='$id_laporan'";

		$hasil= mysqli_query($koneksi,$query);


		$query2 = mysqli_query($koneksi, "SELECT * FROM laporan WHERE id_laporan='$id_laporan'");
		$hasilnya = mysqli_fetch_array($query2);
		
		$file= "../laporan/".$hasilnya['lampiran']."";
		if ($hasil) {
			@unlink($file);
			move_uploaded_file ($lokasi,"$folder");
			echo "<script>alert('File Berhasil Diubah..');location.href='../admin/tables/laporan.php'</script>";
		}
		else{
			echo "File Gagal Diubah..";
		}
	}
}

?>

<!-- <?php

include('koneksi.php');

if(isset($_POST['submit'])) {
	$id_laporan = $_POST['id_laporan'];
	$tanggal = $_POST['tanggal'];
	$perihal = $_POST['perihal'];

	$query = mysqli_query($koneksi, "UPDATE laporan SET tanggal='$tanggal', perihal='$perihal' WHERE id_laporan='$id_laporan'");

	if ($query) {
		echo "berhasil";
	}else{
		echo "gagal";
	}

}
	mysqli_close($koneksi);
	echo "<script>alert('File Berhasil Diubah..');
	location.href='../admin/forms/wa_link.php';
	</script>";

?> -->
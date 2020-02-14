<?php

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
	location.href='../admin/tables/laporan.php'
	</script>";

?>
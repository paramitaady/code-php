<?php

include('koneksi.php');

if(isset($_POST['submit'])) {
	$id_laporan = $_POST['id_laporan'];
	$status = $_POST['status'];

	$query = mysqli_query($koneksi, "UPDATE laporan SET status = '$status' WHERE id_laporan='$id_laporan'");

	if ($query) {
		echo "berhasil";
	}else{
		echo "gagal";
	}

}

mysqli_close($koneksi);
	echo "<script>alert('Data Berhasil Diubah..');
	location.href='../pk/tables/laporan.php'
	</script>";

?>
<?php
	session_start();
	include "koneksi.php";
	$username = $_SESSION['username'];
	// $perihal = $_POST['perihal'];
	$notifikasi = mysqli_query($koneksi, "SELECT id_laporan FROM laporan WHERE dilihat=0");
	$j = mysqli_num_rows($notifikasi);
	if($j>0){
    	echo $j;
	}
?>

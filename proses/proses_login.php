<?php 
include 'koneksi.php';
$username = $_POST['username'];
$password = md5($_POST['password']);
$cek      = mysqli_query($koneksi, "SELECT * FROM petugas WHERE username='$username' AND password='$password'");
$result   = mysqli_num_rows($cek);
$data = mysqli_fetch_array($cek);

if($result>0){
	if ($data['posisi'] == 'Admin') {
	    session_start();
	    $_SESSION['username'] = $data['username'];
	    // $data['level'] level digunaan untu memanggil value level dari username yang telah login dan disimpan dalam $_SESSION['level']
	    
	    $_SESSION['posisi'] = $data['posisi'];
	    echo "<script>alert('Selamat Datang Admin :)');document.location.href='../index_admin.php'</script>";

	}elseif($data['posisi'] == 'Kepala Desa'){
	    session_start();
	    $_SESSION['username'] = $data['username'];
	    
	    $_SESSION['posisi'] = $data['posisi'];
	    echo "<script>alert('Selamat Datang Kepala Desa :)');document.location.href='../index_kades.php'</script>";
	
	}elseif($data['posisi'] == 'Petugas Kecamatan'){
		session_start();
		$_SESSION['username'] = $data['username'];

		$_SESSION['posisi'] = $data['posisi'];
		echo "<script>alert('Selamat Datang, Petugas:) ');document.location.href='../index_pk.php'</script>"; 
	}
}else{
	echo "<script>alert('Username atau Password Salah!');document.location.href='../login.php';</script>";
    
}
?>
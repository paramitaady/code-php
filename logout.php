<?php
session_start();

if(session_destroy()){
		echo "<script>alert('Berhasil Logout.');document.location.href='login.php'</script>";
	}
?>
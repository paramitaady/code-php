<?php
session_start();
include "koneksi.php";
$username = $_SESSION['username'];
// $perihal = $_POST['perihal'];
$notif = mysqli_query($koneksi, "SELECT * FROM laporan WHERE dilihat=0");
$j = mysqli_num_rows($notif);
if($j>0){
    echo "<table border=0 width=100% style=\"font-size:10pt\">";
}else{
    die("<font color=red size=1>Tidak ada notifikasi baru</font>");
}
while($p = mysqli_fetch_array($notif)){
    echo "<tr><td>
     <a href=notif_laporan.php?id_laporan=".$p['id_laporan'].">
     Perihal : ".$p['perihal']."</a><br>
     Tanggal : ".$p['tanggal']."</td></tr>";
}
echo "</table>";
?>

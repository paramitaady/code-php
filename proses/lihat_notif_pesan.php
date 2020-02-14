<?php
session_start();
include "koneksi.php";


$no_surat = $_SESSION['no_surat'];
$surat = mysqli_query($koneksi, "SELECT * FROM surat WHERE no_surat='$no_surat' and dilihat='N'");
$j = mysqli_num_rows($surat);
if($j>0){
    echo "<table border=0 width=100% style=\"font-size:10pt\">";
}else{
    die("<font color=red size=1>Tidak ada notifikasi baru yang belum dibaca</font>");
}
while($p = mysqli_fetch_array($surat)){
    echo "<tr><td onmouseover=\"this.style.backgroundColor='skyblue'\"
     onmouseout=\"this.style.backgroundColor='#efefef'\">
     <a href=pesan.php?no_surat=".$p['no_surat'].">Jenis : ".$p['jenis_surat']."</a><br>
     Waktu : ".$p['waktu']."</td></tr>";
}
echo "</table>";
?>

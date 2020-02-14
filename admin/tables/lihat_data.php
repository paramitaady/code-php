<?php
include "../../proses/koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
 <title>DATA PDF</title>
 <style type="text/css">
 body {
  font-family: verdana;
  font-size: 12px;
 }
 a {
  text-decoration: none;
  color: #3050F3;
 }
 a:hover {
  color: #000F5E;
 } 
</style>
</head>
<body>
<?php
$id_laporan = mysqli_real_escape_string($_GET['id_laporan']);
$query = mysqli_query("SELECT * FROM laporan WHERE id_laporan='$id_laporan' ");
$data  = mysqli_fetch_array($koneksi, $query);
?>
<h1>DATA LAPORAN BULANAN</h1>
<hr>
<b>Perihal:</b><?php echo $data['perihal'];?> | <a href='laporan.php'> Kembali </a>
<hr>
<embed src="../../laporan/<?php echo $data['lampiran'];?>" type="application/pdf" width="1350" height="1000" ></embed>
</body>
</html>
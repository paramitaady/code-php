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
$id_lampiran = mysqli_real_escape_string($_GET['id_lampiran']);
$query = mysqli_query("SELECT * FROM lampiran WHERE id_lampiran='$id_lampiran' ");
$data  = mysqli_fetch_array($koneksi, $query);
?>
<h1>DATA LAPORAN BULANAN</h1>
<hr>
<b>Perihal:</b><?php echo $data['perihal'];?> | <a href='lampiran.php'> Kembali </a>
<hr>
<embed src="../laporan/<?php echo $data['lampiran'];?>" type="application/pdf" width="1350" height="1000" ></embed>
</body>
</html>
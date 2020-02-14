<?php ob_start();

?>
<html>
<head>
	<title>Cetak Data</title>
	<!-- <style>
	table {
		border-collapse:collapse;
		table-layout:fixed;width: 750px;
		position: center;
	}
	table td {
		word-wrap:break-word;
		width: 20%;
	}
</style> -->
</head>
<body>
	<?php
	// Load file koneksi.php
	include ("koneksi.php");
		
	if(isset($_GET['filter']) && ! empty($_GET['filter'])){ 
		$filter = $_GET['filter']; 

		if($filter == '1'){ 
			$nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

			echo '<h3><b>Data Penjualan Bulan '.$nama_bulan[$_GET['bulan']].' '.$_GET['tahun'].'</b></h3>';

			$query = "SELECT pes.jumlah, pes.tgl_pesan, bar.jenis, bar.bahan FROM pesanan pes JOIN barang bar ON (pes.id_barang = bar.id_barang) WHERE MONTH(tgl_pesan)='".$_GET['bulan']."' AND YEAR(tgl_pesan)='".$_GET['tahun']."' AND id_transaksi='2'"; 

		}else{ 
			echo '<h3>Data Penjualan Tahun '.$_GET['tahun'].'</h3>';

            $query = "SELECT pes.jumlah, pes.tgl_pesan, bar.jenis, bar.bahan FROM pesanan pes JOIN barang bar ON (pes.id_barang = bar.id_barang) WHERE YEAR(tgl_pesan)='".$_GET['tahun']."' AND id_transaksi='2'"; 

        }
    }else{ 
        	echo '<h3>Data Penjualan</h3>';
        	$query = "SELECT pes.jumlah, pes.tgl_pesan, bar.jenis, bar.bahan FROM pesanan pes JOIN barang bar ON (pes.id_barang = bar.id_barang) WHERE id_transaksi='2' ORDER BY tgl_pesan ASC "; 
    }
    ?>

    <table border="1">
    	<tr>
    		<th>No</th>
    		<th>Jenis Jilbab</th>
    		<th>Bahan</th>
    		<th>Tanggal</th>
    		<th>Jumlah</th>
    	</tr>
    	<?php
			$sql = mysqli_query($koneksi,$query); 
			$row = mysqli_num_rows($sql); 

			if($row > 0){ 
			$i = 1;
			$total = 0;
			while($pesanan = mysqli_fetch_array($sql)){ 
				$tgl_pesan = date('d-m-Y', strtotime($pesanan['tgl_pesan'])); 

				echo "<tr>";
				echo "<td>".$i++."</td>";
				echo "<td>".$pesanan['jenis']."</td>";
				echo "<td>".$pesanan['bahan']."</td>";
				echo "<td>".$tgl_pesan."</td>";
				echo "<td>".$pesanan['jumlah']."</td>";
				echo "</tr>";
				$total += $pesanan['jumlah'];
			}
				echo "<tr>";
				echo "<td><b>Total Penjualan </b></td>";
				echo "<td><b></b></td>";
				echo "<td><b></b></td>";
				echo "<td><b></b></td>";
				echo "<b><td>".number_format($total)."</td></b>";
				echo "</tr>";
			}else{ 
				echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
			}
			?>
		</table>
	</body>

</html>
<?php
$html = ob_get_contents();
ob_end_clean();

require_once('plugin/html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output('Data penjualan.pdf', 'I');
?>

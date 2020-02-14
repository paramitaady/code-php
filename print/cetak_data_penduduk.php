<?php
session_start();
error_reporting(0);
include('../proses/koneksi.php');
require('../fpdf/fpdf.php');

date_default_timezone_set('Asia/Jakarta');// change according timezone

$currentTime = date( 'd-m-Y h:i:s A', time () );


$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(0.5,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
// $pdf->Image('images/php.png',1,1,2,2);
$pdf->SetX(8);            
$pdf->MultiCell(19.5,0.5,'',0,'L');
$pdf->SetX(9);
$pdf->MultiCell(19.5,0.5,'LAPORAN PENYELENGGARAAN PEMERINTAH KAMPUNG REJO BASUKI',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(8);
$pdf->MultiCell(19.5,0.5,'',0,'L');
$pdf->SetX(8);
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);

$pdf->ln(1.5);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(1, 0.8, 'No', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Tanggal', 1, 0, 'C');
$pdf->Cell(6	, 0.8, 'No Surat', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Jenis Surat', 1, 0, 'C');
$pdf->Cell(6, 0.8, 'Ditujukan Kepada', 1, 0, 'C');
$pdf->Cell(6.5, 0.8, 'Keterangan', 1, 1, 'C');
$pdf->SetFont('Arial','',9);

if (isset($_GET['bulan'])) {
	$bulan = $_GET['bulan'];
	if ($bulan == '1') {
		$query = mysqli_query($koneksi, "SELECT * FROM surat WHERE MONTH(tanggal)='01' AND YEAR(tanggal)='".$_GET['tahun']."'");
	}elseif ($bulan == '2') {
		$query = mysqli_query($koneksi, "SELECT * FROM surat WHERE MONTH(tanggal)='02' AND YEAR(tanggal)='".$_GET['tahun']."'");
	}elseif ($bulan == '3') {
		$query = mysqli_query($koneksi, "SELECT * FROM surat WHERE MONTH(tanggal)='03' AND YEAR(tanggal)='".$_GET['tahun']."'");
	}elseif ($bulan == '4') {
		$query = mysqli_query($koneksi, "SELECT * FROM surat WHERE MONTH(tanggal)='04' AND YEAR(tanggal)='".$_GET['tahun']."'");
	}elseif ($bulan == '5') {
		$query = mysqli_query($koneksi, "SELECT * FROM surat WHERE MONTH(tanggal)='05' AND YEAR(tanggal)='".$_GET['tahun']."'");
	}elseif ($bulan == '6') {
		$query = mysqli_query($koneksi, "SELECT * FROM surat WHERE MONTH(tanggal)='06' AND YEAR(tanggal)='".$_GET['tahun']."'");
	}elseif ($bulan == '7') {
		$query = mysqli_query($koneksi, "SELECT * FROM surat WHERE MONTH(tanggal)='07' AND YEAR(tanggal)='".$_GET['tahun']."'");
	}elseif ($bulan == '8') {
		$query = mysqli_query($koneksi, "SELECT * FROM surat WHERE MONTH(tanggal)='08' AND YEAR(tanggal)='".$_GET['tahun']."'");
	}elseif ($bulan == '9') {
		$query = mysqli_query($koneksi, "SELECT * FROM surat WHERE MONTH(tanggal)='09' AND YEAR(tanggal)='".$_GET['tahun']."'");
	}elseif ($bulan == '10') {
		$query = mysqli_query($koneksi, "SELECT * FROM surat WHERE MONTH(tanggal)='10' AND YEAR(tanggal)='".$_GET['tahun']."'");
	}elseif ($bulan == '11') {
		$query = mysqli_query($koneksi, "SELECT * FROM surat WHERE MONTH(tanggal)='11' AND YEAR(tanggal)='".$_GET['tahun']."'");
	}elseif ($bulan == '12') {
		$query = mysqli_query($koneksi, "SELECT * FROM surat WHERE MONTH(tanggal)='12' AND YEAR(tanggal)='".$_GET['tahun']."'");
	}
}else{
	$query = mysqli_query($koneksi, "SELECT * FROM surat ORDER BY id_surat DESC");
}
$no=1;

// $query=mysqli_query($koneksi,"SELECT * FROM surat");
while($lihat=mysqli_fetch_array($query)){

	$pdf->Cell(1, 0.8, $no, 1, 0, 'C');
	$pdf->Cell(4, 0.8, $lihat['tanggal'], 1, 0,'C');
	$pdf->Cell(6, 0.8, $lihat['no_surat'], 1, 0,'C');
	$pdf->Cell(5, 0.8, $lihat['jenis_surat'],1, 0, 'C');
	$pdf->Cell(6, 0.8, $lihat['tujuan'],1, 0, 'C');
	$pdf->Cell(6.5, 0.8, $lihat['keterangan'], 1, 1,'C');

	$no++;
}
$pdf->ln(9);
$pdf->SetFont('Arial','B',11);
// $pdf->Cell(40.5,0.7,"Rejo Basuki, ".date("d-m-Y"),0,10,'C');

$pdf->ln(1);
$pdf->SetFont('Arial','B',11);
// $pdf->Cell(40.5,0.7,"Supriadi",0,10,'C');

$pdf->Output("laporan surat.pdf","I");

?>
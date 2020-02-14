<?php
session_start();
error_reporting(0);
include('../proses/koneksi.php');
require('../fpdf/fpdf.php');

date_default_timezone_set('Asia/Jakarta');// change according timezone

$currentTime = date( 'd-m-Y h:i:s A', time ());


$pdf = new FPDF("P","cm","A4");

$pdf->SetMargins(0.5,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
// $pdf->Image('images/php.png',1,1,2,2);
$pdf->SetX(8);            
$pdf->MultiCell(15.5,0.5,'',0,'P');
$pdf->SetX(4.5);
$pdf->MultiCell(15.5,0.5,'LAPORAN KEGIATAN PEMERINTAH KAMPUNG REJO BASUKI',0,'P');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(8);
$pdf->MultiCell(19.5,0.5,'',0,'P');
$pdf->SetX(8);
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);

$pdf->ln(1.5);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(1, 0.8, 'No', 1, 0, 'C');
$pdf->Cell(4.5, 0.8, 'Nama Kegiatan', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Lembaga', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Tanggal Kegiatan', 1, 0, 'C');
$pdf->Cell(6, 0.8, 'Lokasi', 1, 0, 'C');
$pdf->Cell(6.5, 0.8, '', 1, 1, 'C');
$pdf->SetFont('Arial','',9);

if (isset($_GET['bulan'])) {
	$pilihan = $_GET['bulan'];

	if ($pilihan == '1') {
		$query = mysqli_query($koneksi, "SELECT * FROM kegiatan WHERE MONTH(tanggal_kegiatan)='01' AND YEAR(tanggal_kegiatan)='".$_GET['tahun']."'");
	}elseif ($pilihan == '2') {
		$query = mysqli_query($koneksi, "SELECT * FROM kegiatan WHERE MONTH(tanggal_kegiatan)='02' AND YEAR(tanggal_kegiatan)='".$_GET['tahun']."'");
	}elseif ($pilihan == '3') {
		$query = mysqli_query($koneksi, "SELECT * FROM kegiatan WHERE MONTH(tanggal_kegiatan)='03' AND YEAR(tanggal_kegiatan)='".$_GET['tahun']."'");
	}elseif ($pilihan == '4') {
		$query = mysqli_query($koneksi, "SELECT * FROM kegiatan WHERE MONTH(tanggal_kegiatan)='04' AND YEAR(tanggal_kegiatan)='".$_GET['tahun']."'");
	}elseif ($pilihan == '5') {
		$query = mysqli_query($koneksi, "SELECT * FROM kegiatan WHERE MONTH(tanggal_kegiatan)='05' AND YEAR(tanggal_kegiatan)='".$_GET['tahun']."'");
	}elseif ($pilihan == '6') {
		$query = mysqli_query($koneksi, "SELECT * FROM kegiatan WHERE MONTH(tanggal_kegiatan)='06' AND YEAR(tanggal_kegiatan)='".$_GET['tahun']."'");
	}elseif ($pilihan == '7') {
		$query = mysqli_query($koneksi, "SELECT * FROM kegiatan WHERE MONTH(tanggal_kegiatan)='07' AND YEAR(tanggal_kegiatan)='".$_GET['tahun']."'");
	}elseif ($pilihan == '8') {
		$query = mysqli_query($koneksi, "SELECT * FROM kegiatan WHERE MONTH(tanggal_kegiatan)='08' AND YEAR(tanggal_kegiatan)='".$_GET['tahun']."'");
	}elseif ($pilihan == '9') {
		$query = mysqli_query($koneksi, "SELECT * FROM kegiatan WHERE MONTH(tanggal_kegiatan)='09' AND YEAR(tanggal_kegiatan)='".$_GET['tahun']."'");
	}elseif ($pilihan == '10') {
		$query = mysqli_query($koneksi, "SELECT * FROM kegiatan WHERE MONTH(tanggal_kegiatan)='10' AND YEAR(tanggal_kegiatan)='".$_GET['tahun']."'");
	}elseif ($pilihan == '11') {
		$query = mysqli_query($koneksi, "SELECT * FROM kegiatan WHERE MONTH(tanggal_kegiatan)='11' AND YEAR(tanggal_kegiatan)='".$_GET['tahun']."'");
	}elseif ($pilihan == '12') {
		$query = mysqli_query($koneksi, "SELECT * FROM kegiatan WHERE MONTH(tanggal_kegiatan)='12' AND YEAR(tanggal_kegiatan)='".$_GET['tahun']."'");
	}
}else{
	$query = mysqli_query($koneksi, "SELECT * FROM kegiatan");
}

$no=1;

// $query=mysqli_query($koneksi,"SELECT * FROM kegiatan");
while($kegiatan = mysqli_fetch_array($query)){

	$pdf->Cell(1, 0.8, $no, 1, 0, 'C');
	$pdf->Cell(4.5, 0.8, $kegiatan['nama_kegiatan'], 1, 0,'C');
	$pdf->Cell(4, 0.8, $kegiatan['lembaga'], 1, 0,'C');
	$pdf->Cell(5, 0.8, $kegiatan['tanggal_kegiatan'],1, 0, 'C');
	$pdf->Cell(6, 0.8, $kegiatan['lokasi'],1, 0, 'C');
	$pdf->Cell(6.5, 0.8, 1, 1,'C');

	$no++;
}

$pdf->ln(9);
$pdf->SetFont('Arial','B',11);
// $pdf->Cell(37,0.7,"Rejo Basuki, ".date("d-m-Y"),0,10,'C');

$pdf->ln(1);
$pdf->SetFont('Arial','B',11);
// $pdf->Cell(37,0.7,"Supriadi",0,10,'C');

$pdf->Output("laporan kegiatan.pdf","I");

?>
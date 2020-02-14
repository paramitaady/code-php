<?php
session_start();
error_reporting(0);
include('../proses/koneksi.php');
require('../fpdf/fpdf.php');

date_default_timezone_set('Asia/Jakarta');// change according timezone

$currentTime = date( 'd-m-Y h:i:s A', time () );


$pdf = new FPDF("P","cm","A4");

$pdf->SetMargins(0.5,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',14);


$pdf->SetX(6);            
$pdf->MultiCell(17.5,2,'',0,'P');

$pdf->SetX(5.5);            
$pdf->MultiCell(17.5,0.8,'PEMERINTAH KABUPATEN KUTAI BARAT',0,'P');
$pdf->SetX(6.5);            
$pdf->MultiCell(17.5,0.8,'KECAMATAN BARONG TONGKOK',0,'P');
$pdf->SetX(7.5);            
$pdf->MultiCell(17.5,0.8,'KAMPUNG REJO BASUKI',0,'P');    
$pdf->SetFont('Arial','B',13);

$pdf->MultiCell(17.5,2,'',0,'P');    
$pdf->SetFont('Arial','B',12);

$pdf->SetX(5.3);            
$pdf->MultiCell(17.5,1,'LAPORAN KEGIATAN PEMERINTAH KAMPUNG (LPPK)',0,'P');


$pdf->SetX(7.5);            
$pdf->MultiCell(17.5,1,"PERIODE : ".date("d F Y"),0,'P');
$pdf->SetX(4);            
$pdf->MultiCell(15.5,7,'',0,'P');    
$pdf->SetFont('Arial','B',12);

$pdf->Image('../images/logo.jpg',4.8,11,12,8);

$pdf->SetX(9);
$pdf->MultiCell(17.5,6,'',0,'P');
$pdf->SetX(9);
$pdf->MultiCell(17.5,0.2,'DISUSUN OLEH',0,'P');
$pdf->SetX(7);
$pdf->MultiCell(17.5,1,'PEMERINTAH KAMPUNG REJO BASUKI',0,'P');
$pdf->SetX(7.5);
$pdf->MultiCell(17.5,0.4,'KECAMATAN BARONG TONGKOK',0,'P');
$pdf->SetX(7.7);
$pdf->MultiCell(17.5,1,'PROVINSI KALIMANTAN TIMUR',0,'P');
$pdf->SetX(9.3);
$pdf->MultiCell(17.5,0.5,'TAHUN 2019',0,'P');

$pdf->SetX(9.3);
$pdf->MultiCell(17.5,2.3,'',0,'P');

$pdf->Image('../images/logo.jpg',3,3.2,4,3);

$pdf->SetX(6.7);            
$pdf->MultiCell(17.5,0.8,'PEMERINTAH KABUPATEN KUTAI BARAT',0,'P');
$pdf->SetX(6.5);            
$pdf->MultiCell(17.5,0.8,'KANTOR KEPALA KAMPUNG REJO BASUKI',0,'P');
$pdf->SetX(7.5);            
$pdf->MultiCell(17.5,0.8,'KECAMATAN BARONG TONGKOK',0,'P');
$pdf->SetX(5.5);            
$pdf->MultiCell(17.5,0.8,'Alamat: Jl. Poros Kalimantan Rt 02 Kode Pos 75576',0,'P'); 

   
$pdf->SetX(8);
$pdf->Line(1,7,20,7);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,7.1,20,7.1);   
$pdf->SetLineWidth(0);

$pdf->SetX(9.3);
$pdf->MultiCell(17.5,1.5,'',0,'P');

//isi laporan perihal

$pdf->SetFont('Arial','',11);
$pdf->SetX(2);            
$pdf->MultiCell(17.5,2,'Perihal: Laporan Bulanan Kegiatan Penyelenggaraan Pemerintahan Kampung',0,'P');
$pdf->SetX(2);            
$pdf->MultiCell(17.5,0.5,'Kepada,',0,'P');
$pdf->SetX(2);            
$pdf->MultiCell(17.5,0.5,'Yth.Camat Barong Tongkok',0,'P');
$pdf->SetX(2);            
$pdf->MultiCell(17.5,0.5,'Cq. Kasi Pemerintahan Kampung Kecamatan Barong Tongkok',0,'P');
$pdf->SetX(2);            
$pdf->MultiCell(17.5,0.5,'di-',0,'P');
$pdf->SetX(2);            
$pdf->MultiCell(17.5,0.5,'Barong Tongkok',0,'P');


$pdf->SetX(2);            
$pdf->MultiCell(17.5,1,'',0,'P');
$pdf->SetX(2);            
$pdf->MultiCell(17.5,0.5,'Dengan ini kami Pemerintah Kampung Rejo Basuki, Menyampaikan Laporan Kegiatan Penyelenggaraan Pemerintah Kampung Kepada Bapak Camat Barong Tongkok Cq. Kasi Pemerintahan Kecamtan Barong Tongkok, laporan kegiatan, dan dokumen terlampir.',0,'P');

$pdf->SetX(2.5);            
$pdf->MultiCell(17.5,1,'',0,'P');
$pdf->SetX(2.5);            
$pdf->MultiCell(17.5,0.5,'1. Laporan Surat Menyurat',0,'P');
$pdf->SetX(2.5);            
$pdf->MultiCell(17.5,0.5,'2. Kegiatan Desa',0,'P');
$pdf->SetX(2.5);            
$pdf->MultiCell(17.5,0.5,'3. Jumlah Penduduk',0,'P');

$pdf->SetX(2);            
$pdf->MultiCell(17.5,1,'',0,'P');
$pdf->SetX(2);  
$pdf->MultiCell(17.5,0.5,'Demikian Laporan Penyelenggaraan Kegiatan Pemerintah Kampung (LPPK) Kampung Rejo Basuki yang kami sampaikan kepada Bapak Camat Barong Tongkok Cq. Kasi Pemerintahan Kecamatan Barong Tongkok.',0,'P');


$pdf->SetX(2);            
$pdf->MultiCell(17.5,1,'',0,'P');
$pdf->ln(1);
$pdf->SetFont('Arial','',11);
$pdf->Cell(30.5,2,"Kepala Kampung Rejo Basuki",0,10,'C');

$pdf->ln(1);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(30.5,0.5,"Supriadi",0,5,'C');




$pdf->SetX(6.5);            
$pdf->MultiCell(17.5,3,'DATA SURAT KAMPUNG REJO BASUKI',0,'P');


$pdf->ln(0.1);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(1, 0.8, 'No', 1, 0, 'C');
$pdf->Cell(2.5, 0.8, 'Tanggal', 1, 0, 'C');
$pdf->Cell(4.5, 0.8, 'No Surat', 1, 0, 'C');
$pdf->Cell(2.5, 0.8, 'Jenis Surat', 1, 0, 'C');
$pdf->Cell(4.5, 0.8, 'Ditujukan Kepada', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Keterangan', 1, 1, 'C');
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
	$pdf->Cell(2.5, 0.8, $lihat['tanggal'], 1, 0,'C');
	$pdf->Cell(4.5, 0.8, $lihat['no_surat'], 1, 0,'C');
	$pdf->Cell(2.5, 0.8, $lihat['jenis_surat'],1, 0, 'C');
	$pdf->Cell(4.5, 0.8, $lihat['tujuan'],1, 0, 'C');
	$pdf->Cell(5, 0.8, $lihat['keterangan'], 1, 1,'C');

	$no++;
}

$pdf->SetX(2);            
$pdf->MultiCell(17.5,1,'',0,'P');
$pdf->SetFont('Arial','B',11);
$pdf->SetX(2);            
$pdf->MultiCell(17.5,15,'',0,'P');

$pdf->SetX(6.5);            
$pdf->MultiCell(17.5,2,'DATA KEGIATAN KAMPUNG REJO BASUKI',0,'P');

// $pdf->SetX(9.3);
// $pdf->MultiCell(17.5,0,'',0,'P');

// $pdf->SetX(8);
// $pdf->Line(1,3,20,3);
// $pdf->SetLineWidth(0.1);      
// $pdf->Line(1,3.1,20,3.1);   
// $pdf->SetLineWidth(0);
$pdf->SetX(2);            
$pdf->MultiCell(5.5,0,'',0,'P');

$pdf->ln(0.1);
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


$pdf->SetFont('Arial','B',11);
$pdf->SetX(2);            
$pdf->MultiCell(17.5,23,'',0,'P');

$pdf->SetX(8.5);            
$pdf->MultiCell(17.5,2,'JUMLAH PENDUDUK',0,'P');

$pdf->SetX(9.3);
$pdf->MultiCell(17.5,0,'',0,'P');

// $pdf->SetX(8);
// $pdf->Line(1,3,20,3);
// $pdf->SetLineWidth(0.1);      
// $pdf->Line(1,3.1,20,3.1);   
// $pdf->SetLineWidth(0);
// $pdf->SetX(2);            
// $pdf->MultiCell(17.5,0,'',0,'P');

$pdf->ln(0.1);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(5.5, 0.8, 'No', 1, 0, 'C');
$pdf->Cell(8, 0.8, 'Status Kependudukan', 1, 0, 'C');
$pdf->Cell(7, 0.8, 'Jumlah', 1, 0, 'C');
// $pdf->Cell(5, 0.8, 'Tanggal Kegiatan', 1, 0, 'C');
// $pdf->Cell(6, 0.8, 'Lokasi', 1, 0, 'C');
// $pdf->Cell(6.5, 0.8, '', 1, 1, 'C');
$pdf->SetFont('Arial','',9);

if (isset($_GET['bulan'])) {
	$pilihan = $_GET['bulan'];

	if ($pilihan == '1') {
		$query = mysqli_query($koneksi, "SELECT * FROM penduduk WHERE MONTH(tgl_perubahan)='01' AND YEAR(tgl_perubahan)='".$_GET['tahun']."'");
	}elseif ($pilihan == '2') {
		$query = mysqli_query($koneksi, "SELECT * FROM penduduk WHERE MONTH(tgl_perubahan)='02' AND YEAR(tgl_perubahan)='".$_GET['tahun']."'");
	}elseif ($pilihan == '3') {
		$query = mysqli_query($koneksi, "SELECT * FROM penduduk WHERE MONTH(tgl_perubahan)='03' AND YEAR(tgl_perubahan)='".$_GET['tahun']."'");
	}elseif ($pilihan == '4') {
		$query = mysqli_query($koneksi, "SELECT * FROM penduduk WHERE MONTH(tgl_perubahan)='04' AND YEAR(tgl_perubahan)='".$_GET['tahun']."'");
	}elseif ($pilihan == '5') {
		$query = mysqli_query($koneksi, "SELECT * FROM penduduk WHERE MONTH(tgl_perubahan)='05' AND YEAR(tgl_perubahan)='".$_GET['tahun']."'");
	}elseif ($pilihan == '6') {
		$query = mysqli_query($koneksi, "SELECT * FROM penduduk WHERE MONTH(tgl_perubahan)='06' AND YEAR(tgl_perubahan)='".$_GET['tahun']."'");
	}elseif ($pilihan == '7') {
		$query = mysqli_query($koneksi, "SELECT * FROM penduduk WHERE MONTH(tgl_perubahan)='07' AND YEAR(tgl_perubahan)='".$_GET['tahun']."'");
	}elseif ($pilihan == '8') {
		$query = mysqli_query($koneksi, "SELECT * FROM penduduk WHERE MONTH(tgl_perubahan)='08' AND YEAR(tgl_perubahan)='".$_GET['tahun']."'");
	}elseif ($pilihan == '9') {
		$query = mysqli_query($koneksi, "SELECT * FROM penduduk WHERE MONTH(tgl_perubahan)='09' AND YEAR(tgl_perubahan)='".$_GET['tahun']."'");
	}elseif ($pilihan == '10') {
		$query = mysqli_query($koneksi, "SELECT * FROM penduduk WHERE MONTH(tgl_perubahan)='10' AND YEAR(tgl_perubahan)='".$_GET['tahun']."'");
	}elseif ($pilihan == '11') {
		$query = mysqli_query($koneksi, "SELECT * FROM penduduk WHERE MONTH(tgl_perubahan)='11' AND YEAR(tgl_perubahan)='".$_GET['tahun']."'");
	}elseif ($pilihan == '12') {
		$query = mysqli_query($koneksi, "SELECT * FROM penduduk WHERE MONTH(tgl_perubahan)='12' AND YEAR(tgl_perubahan)='".$_GET['tahun']."'");
	}
}else{
	$query = mysqli_query($koneksi, "SELECT * FROM penduduk");
}

$no=1;

// $query=mysqli_query($koneksi,"SELECT * FROM kegiatan");
while($kegiatan = mysqli_fetch_array($query)){

	$pdf->Cell(5.5, 0.8, $no, 1, 0, 'C');
	$pdf->Cell(8, 0.8, $kegiatan['Status Kependudukan'], 1, 0,'C');
	$pdf->Cell(7, 0.8, $kegiatan['Jumlah'], 1, 0,'C');
	// $pdf->Cell(5, 0.8, $kegiatan['tanggal_kegiatan'],1, 0, 'C');
	// $pdf->Cell(6, 0.8, $kegiatan['lokasi'],1, 0, 'C');
	// $pdf->Cell(6.5, 0.8, 1, 1,'C');

	$no++;
}

$pdf->ln(9);
$pdf->SetFont('Arial','B',11);
// $pdf->Cell(40.5,0.7,"Rejo Basuki, ".date("d-m-Y"),0,10,'C');

$pdf->ln(1);
$pdf->SetFont('Arial','B',11);
// $pdf->Cell(40.5,0.7,"Supriadi",0,10,'C');

$pdf->Output("laporan_surat.pdf","I");

?>
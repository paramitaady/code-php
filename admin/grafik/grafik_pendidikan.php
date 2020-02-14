<?php
require_once('../../proses/koneksi.php');
session_start();
if(!isset($_SESSION['username'])) {
  session_destroy();
  header("Location: ../../login.php");
}

  // $query = "SELECT pdd.nik, pdd.nama, pdd.jenis_kelamin, pdd.tempat_lahir, pdd.tanggal_lahir, pdd.no_kk, pdd.agama, pdd.status_kependudukan, pdd.status_perkawinan, pdd.kewarganegaraan, pen.tingkat_pendidikan, pek.keterangan FROM pendidikan pen JOIN penduduk pdd ON (pdd.id_pendidikan = pen.id_pendidikan) JOIN pekerjaan pek ON (pdd.id_pekerjaan = pek.id_pekerjaan)";

  // $hasil = mysqli_query($koneksi, $query);

$query2 = "SELECT * FROM petugas WHERE username='".$_SESSION['username']."' LIMIT 1";
$hasil2 = mysqli_query($koneksi, $query2);
$admin = mysqli_fetch_array($hasil2);

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/ico" href="../../gambar/kubarr.ico">
  <title>Rjb - Admin</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script type="text/javascript" src="../../chartjs/Chart.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

   <header class="main-header">
     <!--  <a class="logo">
     </a> -->
     <!-- Header Navbar: style can be found in header.less -->
     <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
         <h3 style="color: white">SISTEM INFORMASI KANTOR DESA REJO BASUKI</h3>   
       </div>

       <div class="navbar-header navbar-right">
        <br>
        <a href="../../logout.php" class="dropdown-toggle icon-menu" >
          <button type="submit" name="submit" value="submit" class="btn btn-warning">Logout</button>
        </a>
      </div>

     <!-- NOTIFIKASI -->

      <div class="navbar-custom-menu" id="kepala">
        <ul class="nav navbar-nav">
          <li class="dropdown notifications-menu" id="notif">

            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="btn btn-info" id="pesan">
                Notifikasi 
              </span>
              <span class="label label-danger" id="notifikasi"></span>
            </a>

            <ul class="dropdown-menu" id="info"> <!-- untuk munculin popup pesan -->
              <li id="konten-info">
                <a href="#" >
                  
                </a>
              </li>

            </ul>

          </li>
        </ul>
      </div>
      
    </div>
  </nav>
  
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="../../dist/img/kubar.png" class="img-circle" alt="User Image">
      </div>
      
      <div class="pull-left info">
        <p>Selamat Datang</p>
        <br>
        <?php echo $admin['nama'];?> :)
        <!-- <a href="#"><i class="fa fa-circle text-success"></i></a> -->
      </div>
    </div>
    <br>

    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="active">
        <a href="../../index_admin.php">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>

      <!-- TABEL LAPORAN -->
      <li>
        <a href="../tables/laporan.php">
          <i class="fa fa-book"></i><span>Laporan</span>
        </a>
      </li>
      <!-- END TABEL LAPORAN -->

      <!-- TABEL DATA PENDUDUK -->
      <li>
        <a href="../tables/data_penduduk.php">
          <i class="fa fa-table"></i><span>Data Penduduk</span>
        </a>
      </li>
      <!-- END TABEL DATA PENDUDUK -->

       <!-- DATA SURAT -->
      <li class="treeview">
        <a href="">
          <i class="glyphicon glyphicon-envelope"></i> <span>Data Surat</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="../forms/buat_surat.php"><i class="fa fa-circle-o"></i>Buat Surat</a></li>
          <li><a href="../tables/data_surat.php"><i class="fa fa-circle-o"></i>Data Surat</a></li>
          <li><a href="../tables/rekap_surat.php"><i class="fa fa-circle-o"></i>Rekapitulasi Surat</a></li>
        </ul>
      </li>
      <!-- END DATA SURAT -->

      <!-- DATA KEGIATAN DESA -->
      <li>
        <a href="../tables/data_kegiatan.php">
          <i class="glyphicon glyphicon-th-list"></i><span>Data Kegiatan Desa</span>
        </a>
      </li>
      <!-- END DATA KEGIATAN DESA -->

      <!-- KELOLA DATA DIRI -->
      <li>
        <a href="../forms/profil.php">
          <i class="glyphicon glyphicon-edit"></i><span>Kelola Data Diri</span>
        </a>
      </li>
      <!-- END KELOLA DATA DIRI -->

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <br>
    </h1>
    <ol class="breadcrumb">
      <li><a href="../../index_admin.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      
      <div class="col-xs-12">
        <div class="box">

          <div class="box-body">
            <a href="../../index_admin.php" class="btn btn-success"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
            <center><h3><b>GRAFIK DATA PENDIDIKAN</b></h3></center>
            <br>
          </div>
          <div>            
          </div>           

          <div style="width: 800px;margin: 0px auto;">
            <canvas id="myChart"></canvas>
          </div><br>
          
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Pendidikan</th>
                  <th>Jumlah</th>
                </tr>
              </thead>
              <tbody>
               <?php
               $query = mysqli_query($koneksi, "SELECT pdd.id_pendidikan, pen.tingkat_pendidikan, COUNT(*) AS jumlah FROM penduduk pdd JOIN pendidikan pen ON (pdd.id_pendidikan = pen.id_pendidikan) GROUP BY id_pendidikan");
               $jumlah = mysqli_num_rows($query);

               while ($penduduk = mysqli_fetch_array($query)) { ?>
                <tr>
                  <td><?php echo $penduduk['tingkat_pendidikan'];?></td>
                  <td><?php echo $penduduk['jumlah'];?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>

          <script>
            var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
              type: 'line',
              data: {
                labels: ["Tidak Sekolah", "Belum Sekolah", "SD", "SMP", "SMA", "Diploma I", "Diploma II", "Diploma III", "Diploma IV", "Strata I", "Strata II", "Strata III"],
                datasets: [{
                  label: '',
                  data: [
                  <?php 
                  $pendidikan1 = mysqli_query($koneksi,"SELECT pdd.nik, pdd.nama, pdd.jenis_kelamin, pdd.tempat_lahir, pdd.tanggal_lahir, pdd.no_kk, pdd.agama, pdd.status_kependudukan, pdd.status_perkawinan, pdd.kewarganegaraan, pen.tingkat_pendidikan, pek.keterangan FROM pendidikan pen JOIN penduduk pdd ON (pdd.id_pendidikan = pen.id_pendidikan) JOIN pekerjaan pek ON (pdd.id_pekerjaan = pek.id_pekerjaan) WHERE tingkat_pendidikan='tidak sekolah'");
                  echo mysqli_num_rows($pendidikan1);
                  ?>, 
                  <?php 
                  $pendidikan2 = mysqli_query($koneksi,"SELECT pdd.nik, pdd.nama, pdd.jenis_kelamin, pdd.tempat_lahir, pdd.tanggal_lahir, pdd.no_kk, pdd.agama, pdd.status_kependudukan, pdd.status_perkawinan, pdd.kewarganegaraan, pen.tingkat_pendidikan, pek.keterangan FROM pendidikan pen JOIN penduduk pdd ON (pdd.id_pendidikan = pen.id_pendidikan) JOIN pekerjaan pek ON (pdd.id_pekerjaan = pek.id_pekerjaan) WHERE tingkat_pendidikan='belum sekolah'");
                  echo mysqli_num_rows($pendidikan2);
                  ?>,
                  <?php
                  $pendidikan3 = mysqli_query($koneksi, "SELECT pdd.nik, pdd.nama, pdd.jenis_kelamin, pdd.tempat_lahir, pdd.tanggal_lahir, pdd.no_kk, pdd.agama, pdd.status_kependudukan, pdd.status_perkawinan, pdd.kewarganegaraan, pen.tingkat_pendidikan, pek.keterangan FROM pendidikan pen JOIN penduduk pdd ON (pdd.id_pendidikan = pen.id_pendidikan) JOIN pekerjaan pek ON (pdd.id_pekerjaan = pek.id_pekerjaan) WHERE tingkat_pendidikan='sd'");
                  echo mysqli_num_rows($pendidikan3);
                  ?>,
                  <?php
                  $pendidikan4 = mysqli_query($koneksi, "SELECT pdd.nik, pdd.nama, pdd.jenis_kelamin, pdd.tempat_lahir, pdd.tanggal_lahir, pdd.no_kk, pdd.agama, pdd.status_kependudukan, pdd.status_perkawinan, pdd.kewarganegaraan, pen.tingkat_pendidikan, pek.keterangan FROM pendidikan pen JOIN penduduk pdd ON (pdd.id_pendidikan = pen.id_pendidikan) JOIN pekerjaan pek ON (pdd.id_pekerjaan = pek.id_pekerjaan) WHERE tingkat_pendidikan='smp'");
                  echo mysqli_num_rows($pendidikan4);
                  ?>,
                  <?php
                  $pendidikan5 = mysqli_query($koneksi, "SELECT pdd.nik, pdd.nama, pdd.jenis_kelamin, pdd.tempat_lahir, pdd.tanggal_lahir, pdd.no_kk, pdd.agama, pdd.status_kependudukan, pdd.status_perkawinan, pdd.kewarganegaraan, pen.tingkat_pendidikan, pek.keterangan FROM pendidikan pen JOIN penduduk pdd ON (pdd.id_pendidikan = pen.id_pendidikan) JOIN pekerjaan pek ON (pdd.id_pekerjaan = pek.id_pekerjaan) WHERE tingkat_pendidikan='sma'");
                  echo mysqli_num_rows($pendidikan5);
                  ?>,
                  <?php
                  $pendidikan6 = mysqli_query($koneksi, "SELECT pdd.nik, pdd.nama, pdd.jenis_kelamin, pdd.tempat_lahir, pdd.tanggal_lahir, pdd.no_kk, pdd.agama, pdd.status_kependudukan, pdd.status_perkawinan, pdd.kewarganegaraan, pen.tingkat_pendidikan, pek.keterangan FROM pendidikan pen JOIN penduduk pdd ON (pdd.id_pendidikan = pen.id_pendidikan) JOIN pekerjaan pek ON (pdd.id_pekerjaan = pek.id_pekerjaan) WHERE tingkat_pendidikan='diploma I'");
                  echo mysqli_num_rows($pendidikan6);
                  ?>,
                  <?php
                  $pendidikan7 = mysqli_query($koneksi, "SELECT pdd.nik, pdd.nama, pdd.jenis_kelamin, pdd.tempat_lahir, pdd.tanggal_lahir, pdd.no_kk, pdd.agama, pdd.status_kependudukan, pdd.status_perkawinan, pdd.kewarganegaraan, pen.tingkat_pendidikan, pek.keterangan FROM pendidikan pen JOIN penduduk pdd ON (pdd.id_pendidikan = pen.id_pendidikan) JOIN pekerjaan pek ON (pdd.id_pekerjaan = pek.id_pekerjaan) WHERE tingkat_pendidikan='diploma II'");
                  echo mysqli_num_rows($pendidikan7);
                  ?>,
                  <?php
                  $pendidikan8 = mysqli_query($koneksi, "SELECT pdd.nik, pdd.nama, pdd.jenis_kelamin, pdd.tempat_lahir, pdd.tanggal_lahir, pdd.no_kk, pdd.agama, pdd.status_kependudukan, pdd.status_perkawinan, pdd.kewarganegaraan, pen.tingkat_pendidikan, pek.keterangan FROM pendidikan pen JOIN penduduk pdd ON (pdd.id_pendidikan = pen.id_pendidikan) JOIN pekerjaan pek ON (pdd.id_pekerjaan = pek.id_pekerjaan) WHERE tingkat_pendidikan='diploma III'");
                  echo mysqli_num_rows($pendidikan8);
                  ?>,
                  <?php
                  $pendidikan9 = mysqli_query($koneksi, "SELECT pdd.nik, pdd.nama, pdd.jenis_kelamin, pdd.tempat_lahir, pdd.tanggal_lahir, pdd.no_kk, pdd.agama, pdd.status_kependudukan, pdd.status_perkawinan, pdd.kewarganegaraan, pen.tingkat_pendidikan, pek.keterangan FROM pendidikan pen JOIN penduduk pdd ON (pdd.id_pendidikan = pen.id_pendidikan) JOIN pekerjaan pek ON (pdd.id_pekerjaan = pek.id_pekerjaan) WHERE tingkat_pendidikan='diploma IV'");
                  echo mysqli_num_rows($pendidikan9);
                  ?>,
                  <?php
                  $pendidikan10 = mysqli_query($koneksi, "SELECT pdd.nik, pdd.nama, pdd.jenis_kelamin, pdd.tempat_lahir, pdd.tanggal_lahir, pdd.no_kk, pdd.agama, pdd.status_kependudukan, pdd.status_perkawinan, pdd.kewarganegaraan, pen.tingkat_pendidikan, pek.keterangan FROM pendidikan pen JOIN penduduk pdd ON (pdd.id_pendidikan = pen.id_pendidikan) JOIN pekerjaan pek ON (pdd.id_pekerjaan = pek.id_pekerjaan) WHERE tingkat_pendidikan='strata I'");
                  echo mysqli_num_rows($pendidikan10);
                  ?>,
                  <?php
                  $pendidikan11 = mysqli_query($koneksi, "SELECT pdd.nik, pdd.nama, pdd.jenis_kelamin, pdd.tempat_lahir, pdd.tanggal_lahir, pdd.no_kk, pdd.agama, pdd.status_kependudukan, pdd.status_perkawinan, pdd.kewarganegaraan, pen.tingkat_pendidikan, pek.keterangan FROM pendidikan pen JOIN penduduk pdd ON (pdd.id_pendidikan = pen.id_pendidikan) JOIN pekerjaan pek ON (pdd.id_pekerjaan = pek.id_pekerjaan) WHERE tingkat_pendidikan='strata II'");
                  echo mysqli_num_rows($pendidikan11);
                  ?>,
                  <?php
                  $pendidikan12 = mysqli_query($koneksi, "SELECT pdd.nik, pdd.nama, pdd.jenis_kelamin, pdd.tempat_lahir, pdd.tanggal_lahir, pdd.no_kk, pdd.agama, pdd.status_kependudukan, pdd.status_perkawinan, pdd.kewarganegaraan, pen.tingkat_pendidikan, pek.keterangan FROM pendidikan pen JOIN penduduk pdd ON (pdd.id_pendidikan = pen.id_pendidikan) JOIN pekerjaan pek ON (pdd.id_pekerjaan = pek.id_pekerjaan) WHERE tingkat_pendidikan='strata III'");
                  echo mysqli_num_rows($pendidikan12);
                  ?>
                  ],
                  backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)'
                  ],
                  borderColor: [
                  'rgba(255,99,132,1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)'
                  ],
                  borderWidth: 1
                }]
              },
              options: {
                scales: {
                  yAxes: [{
                    ticks: {
                      beginAtZero:true
                    }
                  }]
                }
              }
            });
          </script>
        </div>
        <!-- TABEL KEDUA -->

        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 2.4.0
  </div>
  <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
  reserved.
</footer>

 <!-- jQuery 3 -->
 <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
 <!-- Bootstrap 3.3.7 -->
 <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
 <!-- DataTables -->
 <script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
 <script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
 <!-- SlimScroll -->
 <script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
 <!-- FastClick -->
 <script src="../../bower_components/fastclick/lib/fastclick.js"></script>
 <!-- AdminLTE App -->
 <script src="../../dist/js/adminlte.min.js"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="../../dist/js/demo.js"></script>
 <!-- page script -->
 <script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>

<script>
var x = 1;

function cek(){ //function untuk mengecek pesan
    $.ajax({
        url: "../notifikasi/cek_notif.php", //script untuk mengecek pesan, di dalamnya berupa query select
        cache: false,
        success: function(msg){
            $("#notifikasi").html(msg);
        }
    });
    var waktu = setTimeout("cek()",3000);
}

$(document).ready(function(){ //event saat document telah selesai loadingnya
    cek();
    $("#pesan").click(function(){ //pada saat di klik, link message akan muncul daftar pesannya.
        $("#konten-info").show();
        if(x==1){
            $("#pesan").css("background-color","#efefef");
            x = 0;
        }else{
            $("#pesan").css("background-color","#4B59a9");
            x = 1;
        }
        $("#info").toggle();
        
        //ajax untuk menampilkan pesan yang belum terbaca
        $.ajax({
            url: "../notifikasi/notif_admin2.php",
            cache: false,
            success: function(msg){
                $("#loading").hide();
                $("#konten-info").html(msg);
            }
        });

    });
    $("#content").click(function(){
        $("#info").hide();
        $("#pesan").css("background-color","#4B59a9");
        x = 1;
    });
});
</script>

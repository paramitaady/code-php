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
      <li>
        <a href="../tables/data_surat.php">
          <i class="glyphicon glyphicon-envelope"></i><span>Data Surat</span>
        </a>
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
            <center><h3><b>GRAFIK DATA PEKERJAAN</b></h3></center>
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
                  <th>Pekerjaan</th>
                  <th>Jumlah</th>
                </tr>
              </thead>
              <tbody>
               <?php
               $query = mysqli_query($koneksi, "SELECT pdd.id_pekerjaan, pek.keterangan, COUNT(*) AS jumlah FROM penduduk pdd JOIN pekerjaan pek ON (pdd.id_pekerjaan = pek.id_pekerjaan) GROUP BY id_pekerjaan");
               $jumlah = mysqli_num_rows($query);

               while ($pekerjaan = mysqli_fetch_array($query)) { ?>
                <tr>
                  <td><?php echo $pekerjaan['keterangan'];?></td>
                  <td><?php echo $pekerjaan['jumlah'];?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>

          <script>
            var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
              type: 'pie',
              data: {
                labels: ["Belum/Tidak Bekerja", "mengurus rumah tangga", "pelajar/mahasiswa", "pensiunan", "pns", "tni", "petani/pekebun", "peternak", "karyawan swasta", "buruh harian lepas", "buruh tani/perkebunan ", "pembantu rumah tangga", "tukang cukur", "tukang listrik", "tukang baru", "tukang kayu", "mekanik", "paraji", "imam masjid", "wartawan", "ustadz/ustadzah", "guru", "sopir", "pedagang", "perangkat desa"],
                datasets: [{
                  label: '',
                  data: [
                  <?php 
                  $pekerjaan1 = mysqli_query($koneksi,"SELECT pdd.nik, pdd.nama, pdd.jenis_kelamin, pdd.tempat_lahir, pdd.tanggal_lahir, pdd.no_kk, pdd.agama, pdd.status_kependudukan, pdd.status_perkawinan, pdd.kewarganegaraan, pen.tingkat_pendidikan, pek.keterangan FROM pendidikan pen JOIN penduduk pdd ON (pdd.id_pendidikan = pen.id_pendidikan) JOIN pekerjaan pek ON (pdd.id_pekerjaan = pek.id_pekerjaan) WHERE keterangan='belum/tidak bekerja'");
                  echo mysqli_num_rows($pekerjaan1);
                  ?>, 
                  <?php 
                  $pekerjaan2 = mysqli_query($koneksi,"SELECT pdd.nik, pdd.nama, pdd.jenis_kelamin, pdd.tempat_lahir, pdd.tanggal_lahir, pdd.no_kk, pdd.agama, pdd.status_kependudukan, pdd.status_perkawinan, pdd.kewarganegaraan, pen.tingkat_pendidikan, pek.keterangan FROM pendidikan pen JOIN penduduk pdd ON (pdd.id_pendidikan = pen.id_pendidikan) JOIN pekerjaan pek ON (pdd.id_pekerjaan = pek.id_pekerjaan) WHERE keterangan='mengurus rumah tangga'");
                  echo mysqli_num_rows($pekerjaan2);
                  ?>,
                  <?php
                  $pekerjaan3 = mysqli_query($koneksi, "SELECT pdd.nik, pdd.nama, pdd.jenis_kelamin, pdd.tempat_lahir, pdd.tanggal_lahir, pdd.no_kk, pdd.agama, pdd.status_kependudukan, pdd.status_perkawinan, pdd.kewarganegaraan, pen.tingkat_pendidikan, pek.keterangan FROM pendidikan pen JOIN penduduk pdd ON (pdd.id_pendidikan = pen.id_pendidikan) JOIN pekerjaan pek ON (pdd.id_pekerjaan = pek.id_pekerjaan) WHERE keterangan='pelajar/mahasiswa'");
                  echo mysqli_num_rows($pekerjaan3);
                  ?>,
                  <?php
                  $pekerjaan4 = mysqli_query($koneksi, "SELECT pdd.nik, pdd.nama, pdd.jenis_kelamin, pdd.tempat_lahir, pdd.tanggal_lahir, pdd.no_kk, pdd.agama, pdd.status_kependudukan, pdd.status_perkawinan, pdd.kewarganegaraan, pen.tingkat_pendidikan, pek.keterangan FROM pendidikan pen JOIN penduduk pdd ON (pdd.id_pendidikan = pen.id_pendidikan) JOIN pekerjaan pek ON (pdd.id_pekerjaan = pek.id_pekerjaan) WHERE keterangan='pensiunan'");
                  echo mysqli_num_rows($pekerjaan4);
                  ?>,
                  <?php
                  $pekerjaan5 = mysqli_query($koneksi, "SELECT pdd.nik, pdd.nama, pdd.jenis_kelamin, pdd.tempat_lahir, pdd.tanggal_lahir, pdd.no_kk, pdd.agama, pdd.status_kependudukan, pdd.status_perkawinan, pdd.kewarganegaraan, pen.tingkat_pendidikan, pek.keterangan FROM pendidikan pen JOIN penduduk pdd ON (pdd.id_pendidikan = pen.id_pendidikan) JOIN pekerjaan pek ON (pdd.id_pekerjaan = pek.id_pekerjaan) WHERE keterangan='pns'");
                  echo mysqli_num_rows($pekerjaan5);
                  ?>,
                  <?php
                  $pekerjaan6 = mysqli_query($koneksi, "SELECT pdd.nik, pdd.nama, pdd.jenis_kelamin, pdd.tempat_lahir, pdd.tanggal_lahir, pdd.no_kk, pdd.agama, pdd.status_kependudukan, pdd.status_perkawinan, pdd.kewarganegaraan, pen.tingkat_pendidikan, pek.keterangan FROM pendidikan pen JOIN penduduk pdd ON (pdd.id_pendidikan = pen.id_pendidikan) JOIN pekerjaan pek ON (pdd.id_pekerjaan = pek.id_pekerjaan) WHERE keterangan='tni'");
                  echo mysqli_num_rows($pekerjaan6);
                  ?>,
                  <?php
                  $pekerjaan7 = mysqli_query($koneksi, "SELECT pdd.nik, pdd.nama, pdd.jenis_kelamin, pdd.tempat_lahir, pdd.tanggal_lahir, pdd.no_kk, pdd.agama, pdd.status_kependudukan, pdd.status_perkawinan, pdd.kewarganegaraan, pen.tingkat_pendidikan, pek.keterangan FROM pendidikan pen JOIN penduduk pdd ON (pdd.id_pendidikan = pen.id_pendidikan) JOIN pekerjaan pek ON (pdd.id_pekerjaan = pek.id_pekerjaan) WHERE keterangan='petani/pekebun'");
                  echo mysqli_num_rows($pekerjaan7);
                  ?>,
                  <?php
                  $pekerjaan8 = mysqli_query($koneksi, "SELECT pdd.nik, pdd.nama, pdd.jenis_kelamin, pdd.tempat_lahir, pdd.tanggal_lahir, pdd.no_kk, pdd.agama, pdd.status_kependudukan, pdd.status_perkawinan, pdd.kewarganegaraan, pen.tingkat_pendidikan, pek.keterangan FROM pendidikan pen JOIN penduduk pdd ON (pdd.id_pendidikan = pen.id_pendidikan) JOIN pekerjaan pek ON (pdd.id_pekerjaan = pek.id_pekerjaan) WHERE keterangan='peternak'");
                  echo mysqli_num_rows($pekerjaan8);
                  ?>,
                  <?php
                  $pekerjaan9 = mysqli_query($koneksi, "SELECT pdd.nik, pdd.nama, pdd.jenis_kelamin, pdd.tempat_lahir, pdd.tanggal_lahir, pdd.no_kk, pdd.agama, pdd.status_kependudukan, pdd.status_perkawinan, pdd.kewarganegaraan, pen.tingkat_pendidikan, pek.keterangan FROM pendidikan pen JOIN penduduk pdd ON (pdd.id_pendidikan = pen.id_pendidikan) JOIN pekerjaan pek ON (pdd.id_pekerjaan = pek.id_pekerjaan) WHERE keterangan='karyawan swasta'");
                  echo mysqli_num_rows($pekerjaan9);
                  ?>,
                  <?php
                  $pekerjaan10 = mysqli_query($koneksi, "SELECT pdd.nik, pdd.nama, pdd.jenis_kelamin, pdd.tempat_lahir, pdd.tanggal_lahir, pdd.no_kk, pdd.agama, pdd.status_kependudukan, pdd.status_perkawinan, pdd.kewarganegaraan, pen.tingkat_pendidikan, pek.keterangan FROM pendidikan pen JOIN penduduk pdd ON (pdd.id_pendidikan = pen.id_pendidikan) JOIN pekerjaan pek ON (pdd.id_pekerjaan = pek.id_pekerjaan) WHERE keterangan='buruh harian lepas'");
                  echo mysqli_num_rows($pekerjaan10);
                  ?>,
                  <?php
                  $pekerjaan11 = mysqli_query($koneksi, "SELECT pdd.nik, pdd.nama, pdd.jenis_kelamin, pdd.tempat_lahir, pdd.tanggal_lahir, pdd.no_kk, pdd.agama, pdd.status_kependudukan, pdd.status_perkawinan, pdd.kewarganegaraan, pen.tingkat_pendidikan, pek.keterangan FROM pendidikan pen JOIN penduduk pdd ON (pdd.id_pendidikan = pen.id_pendidikan) JOIN pekerjaan pek ON (pdd.id_pekerjaan = pek.id_pekerjaan) WHERE keterangan='buruh tani/perkebunan'");
                  echo mysqli_num_rows($pekerjaan11);
                  ?>,
                  <?php
                  $pekerjaan12 = mysqli_query($koneksi, "SELECT pdd.nik, pdd.nama, pdd.jenis_kelamin, pdd.tempat_lahir, pdd.tanggal_lahir, pdd.no_kk, pdd.agama, pdd.status_kependudukan, pdd.status_perkawinan, pdd.kewarganegaraan, pen.tingkat_pendidikan, pek.keterangan FROM pendidikan pen JOIN penduduk pdd ON (pdd.id_pendidikan = pen.id_pendidikan) JOIN pekerjaan pek ON (pdd.id_pekerjaan = pek.id_pekerjaan) WHERE keterangan='pembantu rumah tangga'");
                  echo mysqli_num_rows($pekerjaan12);
                  ?>
                  ],
                  backgroundColor: [
                    'blue', //Warna Background
                    'green',
                    'red', //Warna Background
                    'purple',
                    'grey', //Warna Background
                    'orange',
                    'black', //Warna Background
                    'navy',
                    'green', //Warna Background
                    'brown',
                    'black', //Warna Background
                    'pink',
                    'blue', //Warna Background
                    'purple',
                    'yellow', //Warna Background
                    'yellow',
                    'grey', //Warna Background
                    'black',
                    'purple', //Warna Background
                    'red',
                    'grey', //Warna Background
                    'green',
                    'navy', //Warna Background
                    'brown',
                    'orange', //Warna Background
                    'pink',
                    'blue', //Warna Background
                    'red',
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

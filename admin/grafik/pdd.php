<?php
require_once('../../proses/koneksi.php');
session_start();
if(!isset($_SESSION['username'])) {
  session_destroy();
  header("Location: ../../login.php");
}

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
            <center><h3><b>GRAFIK DATA PENDUDUK</b></h3></center>
            <br>
          </div>
          <div>            
          </div>           

          <div style="width: 500px;margin: 0px auto;">
            <canvas id="myChart"></canvas>
          </div><br><br>
          <hr size="2">
          
<!-- action="../../print/cetak_data_penduduk.php" -->
           <form method="GET" class="form-inline">
            <select name="bulan" class="form-control">
              <option value="">---Pilih Bulan---</option>
              <option value="1">Januari</option>
              <option value="2">Februari</option>
              <option value="3">Maret</option>
              <option value="4">April</option>
              <option value="5">Mei</option>
              <option value="6">Juni</option>
              <option value="7">Juli</option>
              <option value="8">Agustus</option>
              <option value="9">September</option>
              <option value="10">Oktober</option>
              <option value="11">November</option>
              <option value="12">Desember</option>
            </select>

            <select name="tahun" class="form-control">
              <option value="">---Pilih Tahun---</option>
              <?php
              $tahun = "SELECT YEAR(tgl_perubahan) AS tahun FROM Penduduk GROUP BY YEAR(tgl_perubahan) ASC"; 
              $sql = mysqli_query($koneksi, $tahun); 

              while($tgl_perubahan = mysqli_fetch_array($sql)){
                echo '<option>'.$tgl_perubahan['tahun'].'</option>';
              }
              ?>
            </select>
            <a href="../grafik/pdd.php" class="btn btn-primary" type="submit" name="submit" value="submit">Batal</a>
           <!--  <button class="btn btn-primary" name="filter"><span class="glyphicon glyphicon-search"></span>Cari</button> -->
            <!-- <button class="btn btn-primary" type="submit" name="submit" value="proses"  target="_blank" onclick="return valid();"><span class="fa fa-print"> Print</button> -->
            </form>
          
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Status Kependudukan</th>
                  <th>Jumlah</th>
                </tr>
              </thead>
              <tbody>
              <?php

               if (isset($_GET['bulan'])) {
                    $bulan = $_GET['bulan'];
                    if ($bulan == '11') {
                      $query = mysqli_query($koneksi, "SELECT status_kependudukan, COUNT(*) AS jumlah FROM penduduk WHERE MONTH(tgl_perubahan)='11' AND YEAR(tgl_perubahan)='".$_GET['tahun']."'");
                      
                    }else if ($bulan == '12') {
                      $query = mysqli_query($koneksi, "SELECT status_kependudukan, COUNT(*) AS jumlah FROM penduduk WHERE MONTH(tgl_perubahan)='12' AND YEAR(tgl_perubahan)='".$_GET['tahun']."'");
                      
                }else{
                  $query = mysqli_query($koneksi, "SELECT status_kependudukan, COUNT(*) AS jumlah FROM penduduk WHERE MONTH(tgl_perubahan)='".date('m')."' AND YEAR(tgl_perubahan)='".$_GET['tahun']."'");
                  
                }}
                
                while ($penduduk = mysqli_fetch_array($query)) { ?>
                  <tr>
                    <td><?php echo $penduduk['status_kependudukan'];?></td>
                    <!-- <td><?php echo $penduduk['jenis_kelamin'];?></td> -->
                    <td>2</td>
                  </tr>
              <?php } ?>
              </tbody>
            </table>

            <script>
              var ctx = document.getElementById("myChart").getContext('2d');
              var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                  labels: [ "Penduduk Pindah", "Penduduk Datang", "Meninggal"],
                  datasets: [{
                    label: '',
                    data: [
                    // <?php 
                    // $pdd_tetap = mysqli_query($koneksi,"SELECT * FROM penduduk WHERE status_kependudukan='Penduduk Tetap'");
                    // echo mysqli_num_rows($pdd_tetap);
                    // ?>, 
                    <?php 
                    $pdd_pindah = mysqli_query($koneksi,"SELECT * FROM penduduk WHERE status_kependudukan='Penduduk Pindah' AND MONTH(tgl_perubahan)='".date('m')."'");
                    echo mysqli_num_rows($pdd_pindah);
                    ?>,
                    <?php 
                    $pdd_datang = mysqli_query($koneksi,"SELECT * FROM penduduk WHERE status_kependudukan='Penduduk Datang' AND MONTH(tgl_perubahan)='".date('m')."'");
                    echo mysqli_num_rows($pdd_datang);
                    ?>,
                    <?php 
                    $pdd_meninggal = mysqli_query($koneksi,"SELECT tgl_perubahan FROM penduduk WHERE status_kependudukan='Meninggal' AND MONTH(tgl_perubahan)='11' AND YEAR(tgl_perubahan)='".$_GET['tahun']."'");
                    echo mysqli_num_rows($pdd_meninggal);
                    ?>
                    ],
                    backgroundColor: [
                    'blue', //Warna Background
                    'green',
                    'yellow',
                    'grey',
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

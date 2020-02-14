<?php
require_once('../../proses/koneksi.php');
session_start();
if(!isset($_SESSION['username'])) {
  session_destroy();
  header("Location: ../../login.php");
}

$query2 = "SELECT * FROM petugas WHERE username='".$_SESSION['username']."' LIMIT 1";
$hasil = mysqli_query($koneksi, $query2);
$admin = mysqli_fetch_array($hasil);

$id_surat = $_GET['id_surat'];
$sql = mysqli_query($koneksi, "SELECT s.id_surat, s.no_surat, s.tanggal, s.jenis_surat, s.keterangan, pdd.nik, pdd.nama, pdd.agama, pdd.alamat, pdd.jenis_kelamin, pdd.tempat_lahir, pdd.tanggal_lahir FROM surat s JOIN penduduk p ON (s.nik = pdd.nik) WHERE id_surat='$id_surat'");
$hasil2 = mysqli_fetch_array($sql);

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Rejo Basuki</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <script type="text/javascript" src="../../js/surat.js"></script>
  <link rel="stylesheet" href="plugin/jquery-ui/jquery-ui.min.css" /> <!-- load file jqueryui css -->
  <script src="js/jquery.min.js"></script>  <!-- load file jquery -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
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
      <li>
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
      <li class="active">
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
      <li><a href="data_surat.php">Tabel</a></li>
      <li class="active">Data Surat</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
           <!-- <a href="../forms/tambah_surat.php" class="btn btn-success">
            <span class="glyphicon glyphicon-plus"></span> Tambah Data Surat
          </a> -->
          <!-- <a href="../print/cetak_keterangan.php" class="btn btn-primary" target="_blank" >Cetak Data</a> -->

          <a class="btn btn-primary" onclick="window.print();"><i class="fa fa-print"></i> Print Halaman Ini</a>
          <div class="box-body navbar-right">
            <!-- <a href="../print/cetak_data_surat.php" class="btn btn-primary" target="_blank" >Cetak Data</a> -->
            <!-- <a class="btn btn-primary" onclick="window.print();">Cetak Data</a> -->
          </div>
          <br>
          <br>

          <!-- /.box-header -->
          <div class="box-body">
            <font face="Arial" color="black" size="4">
              <p align="center">
                <b>PEMERINTAH KABUPATEN KUTAI BARAT<br>
                  KANTOR KEPALA KAMPUNG REJO BASUKI<br>
                  KECAMATAN BARONG TONGKOK<br>
                  <i>Alamat: Jl. Trans Kalimantan Rt 002 Kode Pos 75576</i> 
                </p>
              </font>
              <hr>

              <font face="Arial" size="3"> 
                <p align="center"> 
                  
                    <u><?php echo $hasil2['keterangan']; ?></u><br>
                    Nomor: <?php echo $hasil2['no_surat'];?>
                  </p>
                </font>

                <br>

                <font face="Arial" size="3">
                  <p align="pull-right">
                    Yang bertandatangan di bawah ini Kepala Kampung Rejo Basuki Kecamatan Barong<br>
                    Tongkok Kabupaten Kutai Barat dengan ini menerangkan bahwa:
                  </p>
                </font><br>

                <font face="Arial" size="3">
                  <p align="pull-right">

                    Nama                  : <?php echo $hasil2['nama'];?> <br>

                    Tempat Tanggal Lahir  : <?php echo $hasil2['tempat_lahir'];?>, <?php echo $hasil2['tanggal_lahir'];?> <br>

                    NIK                   : <?php echo $hasil2['nik'];?> <br>

                    Jenis Kelamin         : <?php echo $hasil2['jenis_kelamin'];?> <br>

                    Agama                 : <?php echo $hasil2['agama'];?> <br>

                  <!-- Pekerjaan             : <?php echo $_POST['pekerjaan']?> <br>
                  -->
                  Alamat                : <?php echo $hasil2['alamat'];?> <br>

                  Kecamatan             :Barong Tongkok <br>
                </p>
              </font><br>

              <font face="Arial" size="3">
                <p align="left">
                  Yang bersangkutan adalah benar-benar berasal dari keluarga tidak mampu, karena dari
                  penghasilan yang di dapat tidak cukup untuk memenuhi biaya pendidikan, maka untuk
                  maksud tersebut mohon kiranya dapat dibantu dan diberikan BEASISWA.
                  <br><br>  
                  Demikian <?php echo $hasil2['keterangan'];?> ini kami buat dengan sebenarnya dan agar
                  dapat dipergunakan sebagaimana mestinya.
                </p>
              </font> <br><br><br>
           

            <font face="Arial" size="3">
              <p align="right">
                Rejo Basuki, 03 April 2019<br>
                Kepala Kampung Rejo Basuki

                <br><br><br><br><br>
                <u>SUPRIADI</u>
              </p>
            </font> 
          </div>
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
  </div>
  <center><strong>Copyright &copy; Skripsi 2109 <a href="https://adminlte.io">Templete From: Almsaeed Studio</a></strong></center>
</footer>


<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
<script src="../../dist/js/demo.js"></script>

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


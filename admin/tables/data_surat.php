<?php
require_once('../../proses/koneksi.php');
session_start();
if(!isset($_SESSION['username'])) {
  session_destroy();
  header("Location: ../../login.php");
}

  // $query = mysqli_query($koneksi, "SELECT * FROM surat");

$query2 = "SELECT * FROM petugas WHERE username='".$_SESSION['username']."' LIMIT 1";
$hasil = mysqli_query($koneksi, $query2);
$admin = mysqli_fetch_array($hasil);

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
  <script type="text/javascript" src="../../js/surat.js"></script>
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
        <a href="laporan.php">
          <i class="fa fa-book"></i><span>Laporan</span>
        </a>
      </li>
      <!-- END TABEL LAPORAN -->

      <!-- TABEL DATA PENDUDUK -->
      <li>
        <a href="data_penduduk.php">
          <i class="fa fa-table"></i><span>Data Penduduk</span>
        </a>
      </li>
      <!-- END TABEL DATA PENDUDUK -->
      
      <!-- DATA SURAT -->
      <!-- <li class="active">
        <a href="data_surat.php">
          <i class="glyphicon glyphicon-envelope"></i><span>Data Surat</span>
        </a>
      </li> -->
      <!-- END DATA SURAT -->


      <!-- DATA SURAT -->
      <li class="active treeview">
        <a href="">
          <i class="glyphicon glyphicon-envelope"></i> <span>Data Surat</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="../forms/buat_surat.php"><i class="fa fa-circle-o"></i>Buat Surat</a></li>
          <li class="active"><a href="data_surat.php"><i class="fa fa-circle-o"></i>Data Surat</a></li>
          <li><a href="rekap_surat.php"><i class="fa fa-circle-o"></i>Rekapitulasi Surat</a></li>
        </ul>
      </li>
      <!-- END DATA SURAT -->

      <!-- DATA KEGIATAN DESA -->
      <li>
        <a href="data_kegiatan.php">
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
          <!-- <br> -->
          <div class="box-body">
          <!--  <a href="../forms/buat_surat.php" class="btn btn-success">
            <span class="glyphicon glyphicon-plus"></span> Tambah Data Surat
          </a> -->
          <div class="pull-right">
            <!-- <a href="../../print/cetak_data_surat.php" class="btn btn-primary" target="_blank" ><i class="fa fa-print"></i> Cetak Data</a> -->
            <!-- <a href="../print/cetak_data_surat.php" class="btn btn-primary" onclick="window.print();">Cetak Data</a> -->
            
          </div>
          <br>
          
          <form method="GET" class="form-inline" target="_blank" action="../../print/cetak_data_surat.php">
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
              $query = "SELECT YEAR(tanggal) AS tahun FROM surat GROUP BY YEAR(tanggal) ASC"; 
              $sql = mysqli_query($koneksi, $query); 

              while($surat = mysqli_fetch_array($sql)){
                echo '<option>'.$surat['tahun'].'</option>';
              }
              ?>
            </select>

            <!-- <button class="btn btn-primary" name="filter"><span class="glyphicon glyphicon-search"></span>Cari</button> -->
            <button class="btn btn-primary" type="submit" name="submit" value="proses"  target="_blank" onclick="return valid();"><span class="fa fa-print"> Print</button>
            </form>
            <hr size="2">
            <div>
              <center><h3><b>DATA SURAT</b></h3></center>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>No Surat</th>
                    <th>Jenis Surat</th>
                    <th>Ditujukan Kepada</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if (isset($_GET['bulan'])) {
                    $bulan = $_GET['bulan'];

                    if ($bulan == '1') {
                      $query = mysqli_query($koneksi, "SELECT s.nik, s.id_surat, s.no_surat, s.jenis_surat, s.keterangan, s.tujuan, s.tanggal, s.perihal, s.usaha, s.organisasi, p.nik, p.nama, p.tanggal_lahir, p.tempat_lahir, p.jenis_kelamin, p.agama, p.alamat  FROM surat s JOIN penduduk p ON (s.nik = p.nik) WHERE MONTH(tanggal)='01' AND YEAR(tanggal)='".$_GET['tahun']."'");
                    }elseif ($bulan == '2') {
                      $query = mysqli_query($koneksi, "SELECT s.nik, s.id_surat, s.no_surat, s.jenis_surat, s.keterangan, s.tujuan, s.tanggal, s.perihal, s.usaha, s.organisasi, p.nik, p.nama, p.tanggal_lahir, p.tempat_lahir, p.jenis_kelamin, p.agama, p.alamat  FROM surat s JOIN penduduk p ON (s.nik = p.nik) WHERE MONTH(tanggal)='02' AND YEAR(tanggal)='".$_GET['tahun']."'");
                    }elseif ($bulan == '3') {
                      $query = mysqli_query($koneksi, "SELECT s.nik, s.id_surat, s.no_surat, s.jenis_surat, s.keterangan, s.tujuan, s.tanggal, s.perihal, s.usaha, s.organisasi, p.nik, p.nama, p.tanggal_lahir, p.tempat_lahir, p.jenis_kelamin, p.agama, p.alamat  FROM surat s JOIN penduduk p ON (s.nik = p.nik) WHERE MONTH(tanggal)='03' AND YEAR(tanggal)='".$_GET['tahun']."'");
                    }elseif ($bulan == '4') {
                      $query = mysqli_query($koneksi, "SELECT s.nik, s.id_surat, s.no_surat, s.jenis_surat, s.keterangan, s.tujuan, s.tanggal, s.perihal, s.usaha, s.organisasi, p.nik, p.nama, p.tanggal_lahir, p.tempat_lahir, p.jenis_kelamin, p.agama, p.alamat  FROM surat s JOIN penduduk p ON (s.nik = p.nik) WHERE MONTH(tanggal)='04' AND YEAR(tanggal)='".$_GET['tahun']."'");
                    }elseif ($bulan == '5') {
                      $query = mysqli_query($koneksi, "SELECT s.nik, s.id_surat, s.no_surat, s.jenis_surat, s.keterangan, s.tujuan, s.tanggal, s.perihal, s.usaha, s.organisasi, p.nik, p.nama, p.tanggal_lahir, p.tempat_lahir, p.jenis_kelamin, p.agama, p.alamat  FROM surat s JOIN penduduk p ON (s.nik = p.nik) WHERE MONTH(tanggal)='05' AND YEAR(tanggal)='".$_GET['tahun']."'");
                    }elseif ($bulan == '6') {
                      $query = mysqli_query($koneksi, "SELECT s.nik, s.id_surat, s.no_surat, s.jenis_surat, s.keterangan, s.tujuan, s.tanggal, s.perihal, s.usaha, s.organisasi, p.nik, p.nama, p.tanggal_lahir, p.tempat_lahir, p.jenis_kelamin, p.agama, p.alamat  FROM surat s JOIN penduduk p ON (s.nik = p.nik) WHERE MONTH(tanggal)='06' AND YEAR(tanggal)='".$_GET['tahun']."'");
                    }elseif ($bulan == '7') {
                      $query = mysqli_query($koneksi, "SELECT s.nik, s.id_surat, s.no_surat, s.jenis_surat, s.keterangan, s.tujuan, s.tanggal, s.perihal, s.usaha, s.organisasi, p.nik, p.nama, p.tanggal_lahir, p.tempat_lahir, p.jenis_kelamin, p.agama, p.alamat  FROM surat s JOIN penduduk p ON (s.nik = p.nik) WHERE MONTH(tanggal)='07' AND YEAR(tanggal)='".$_GET['tahun']."'");
                    }elseif ($bulan == '8') {
                      $query = mysqli_query($koneksi, "SELECT s.nik, s.id_surat, s.no_surat, s.jenis_surat, s.keterangan, s.tujuan, s.tanggal, s.perihal, s.usaha, s.organisasi, p.nik, p.nama, p.tanggal_lahir, p.tempat_lahir, p.jenis_kelamin, p.agama, p.alamat  FROM surat s JOIN penduduk p ON (s.nik = p.nik) WHERE MONTH(tanggal)='08' AND YEAR(tanggal)='".$_GET['tahun']."'");
                    }elseif ($bulan == '9') {
                      $query = mysqli_query($koneksi, "SELECT s.nik, s.id_surat, s.no_surat, s.jenis_surat, s.keterangan, s.tujuan, s.tanggal, s.perihal, s.usaha, s.organisasi, p.nik, p.nama, p.tanggal_lahir, p.tempat_lahir, p.jenis_kelamin, p.agama, p.alamat  FROM surat s JOIN penduduk p ON (s.nik = p.nik)  WHERE MONTH(tanggal)='09' AND YEAR(tanggal)='".$_GET['tahun']."'");
                    }elseif ($bulan == '10') {
                      $query = mysqli_query($koneksi, "SELECT s.nik, s.id_surat, s.no_surat, s.jenis_surat, s.keterangan, s.tujuan, s.tanggal, s.perihal, s.usaha, s.organisasi, p.nik, p.nama, p.tanggal_lahir, p.tempat_lahir, p.jenis_kelamin, p.agama, p.alamat  FROM surat s JOIN penduduk p ON (s.nik = p.nik) WHERE MONTH(tanggal)='10' AND YEAR(tanggal)='".$_GET['tahun']."'");
                    }elseif ($bulan == '11') {
                      $query = mysqli_query($koneksi, "SELECT s.nik, s.id_surat, s.no_surat, s.jenis_surat, s.keterangan, s.tujuan, s.tanggal, s.perihal, s.usaha, s.organisasi, p.nik, p.nama, p.tanggal_lahir, p.tempat_lahir, p.jenis_kelamin, p.agama, p.alamat  FROM surat s JOIN penduduk p ON (s.nik = p.nik) WHERE MONTH(tanggal)='11' AND YEAR(tanggal)='".$_GET['tahun']."'");
                    }elseif ($bulan == '12') {
                      $query = mysqli_query($koneksi, "SELECT s.nik, s.id_surat, s.no_surat, s.jenis_surat, s.keterangan, s.tujuan, s.tanggal, s.perihal, s.usaha, s.organisasi, p.nik, p.nama, p.tanggal_lahir, p.tempat_lahir, p.jenis_kelamin, p.agama, p.alamat  FROM surat s JOIN penduduk p ON (s.nik = p.nik) WHERE MONTH(tanggal)='12' AND YEAR(tanggal)='".$_GET['tahun']."'");
                    }
                  }else{
                    $query = mysqli_query($koneksi, "SELECT s.nik, s.id_surat, s.no_surat, s.jenis_surat, s.keterangan, s.tujuan, s.tanggal, s.perihal, s.usaha, s.organisasi, p.nik, p.nama, p.tanggal_lahir, p.tempat_lahir, p.jenis_kelamin, p.agama, p.alamat  FROM surat s JOIN penduduk p ON (s.nik = p.nik) ORDER BY id_surat ASC ");
                  }
                //$i = 1;
                  while ( $surat = mysqli_fetch_array($query)) { ?>
                    <tr>
                      <!-- <td><?php echo $i++;?></td> -->
                      <td><?php echo $surat['nik'];?></td>
                      <td><?php echo $surat['nama'];?></td>
                      <td><?php echo $surat['tanggal'];?></td>
                      <td><?php echo $surat['id_surat'];?></td>
                      <td><?php echo $surat['jenis_surat'];?></td>
                      <td><?php echo $surat['tujuan'];?></td>
                      <td><?php echo $surat['keterangan'];?></td>
                      <td>
                        <a href="../forms/ubah_surat.php?no_surat=<?php echo $surat['no_surat']; ?>" class="btn btn-info btn-xs">Edit</a>
                        <a href="../../proses/proses_hapus_surat.php?no_surat=<?php echo $surat['no_surat']; ?>" onClick="return hapusSurat();" class="btn btn-danger btn-xs">Hapus</a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
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


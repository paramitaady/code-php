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


// $id_surat = $_GET['id_surat'];

$query3 = "SELECT id_surat FROM surat ORDER BY id_surat DESC";
$sql2= mysqli_query($koneksi, $query3);
$id = mysqli_fetch_array($sql2);


$query = "SELECT pdd.nik, pdd.nama, pdd.jenis_kelamin, pdd.tempat_lahir, pdd.tanggal_lahir, pdd.agama, pdd.alamat, s.no_surat, s.jenis_surat, s.keterangan, s.tanggal, s.perihal, s.tgl_meninggal FROM penduduk pdd JOIN surat s ON (s.nik = pdd.nik) WHERE s.id_surat='".$id['id_surat']."'";
$sql = mysqli_query($koneksi, $query);
$hasil2 = mysqli_fetch_array($sql);

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
      <li class="active treeview">
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
          <!-- <a href="../print/cetak_pengantar.php" class="btn btn-primary" target="_blank" >Cetak Data</a>
            <div class="box-body navbar-right"> -->
              <!-- <a href="../print/cetak_data_surat.php" class="btn btn-primary" target="_blank" >Cetak Data</a> -->
              <!-- <a class="btn btn-primary" onclick="window.print();">Cetak Data</a> -->
            </div>

            <div class="box-body">
              <table align="center">
                <tr>
                  <td><center><img src="../../dist/img/kubar.png" width="80" height="90"></center></td>
                  <td width="30"></td>
                  <td><center>
                    <font size="4">PEMERINTAHAN KABUPATEN KUTAI BARAT</font><br>
                    <font size="5"><b>KANTOR KEPALA KAMPUNG REJO BASUKI</b></font><br>
                    <font size="5"><b>KECAMATAN BARONG TONGKOK</b></font><br>
                    <font size="3"><i><b>Alamat: Jl. Poros Trans Kalimantan RT 002 Kode Pos 75576</b></i></font></center>
                  </td>
                </tr>
            <!-- <tr>
              <td colspan="2"><hr></td>
            </tr> -->
          </table>
          <hr>
          <br>
    

            <table align="center">
              <tr>
                <td><font size="4"><center><u>Surat <?= $hasil2['keterangan'];?></u></center></font></td>
              </tr>
              <tr>
                <td><font size="3"><center>Nomor : <?= $hasil2['no_surat'];?></center></font></td>
              </tr>
            </table>
            <br><br>

            <table align="center">
              <tr>
                <td colspan="2"><font size="3">
                  Yang Bertanda Tangan Dibawah ini Kepala Kampung Rejo Basuki Kecamatan Barong <br> Tongkok  Kabupaten Kutai Barat Dengan ini menerangkan bahwa :
                </font>
              </td>
            </tr>
            <tr>
              <td height="40" colspan="2"></td>
            </tr>
            <tr>
              <td><font size="3">Nama</font></td>
              <td width="450"><font size="3"> : <?= $hasil2['nama'];?></font></td>
            </tr>
            <tr>
              <td height="10" colspan="2"></td>
            </tr>
            <tr>
              <td><font size="3"> Tempat Tanggal Lahir </font></td>
              <td width="450"><font size="3"> : <?= $hasil2['tempat_lahir'];?>, <?= $hasil2['tanggal_lahir'];?></font></td>
            </tr>
            <tr>
              <td height="10" colspan="2"></td>
            </tr>
            <tr>
              <td><font size="3"> Jenis Kelamin </font></td>
              <td width="450"><font size="3"> : <?= $hasil2['jenis_kelamin'];?></font></td>
            </tr>
            <tr>
              <td height="10" colspan="2"></td>
            </tr>
            <tr>
              <td><font size="3"> Agama </font></td>
              <td width="450"><font size="3"> : <?= $hasil2['agama'];?></font></td>
            </tr>
            <tr>
              <td height="10" colspan="2"></td>
            </tr>
            <tr>
              <td><font size="3"> Alamat </font></td>
              <td width="450"><font size="3"> : <?= $hasil2['alamat'];?></font></td>
            </tr>
            <tr>
              <td height="10" colspan="2"></td>
            </tr>
            <tr>
              <td><font size="3"> Kecamatan </font></td>
              <td width="450"><font size="3"> : Barong Tongkok </font></td>
            </tr>
            <tr>
              <td height="40" colspan="2"></td>
            </tr>
            <tr>
              <td colspan="2" ><font size="3"> Yang Bersangkutan Benar – benar telah meninggal dunia pada Tanggal <?= $hasil2['tgl_meninggal'];?> <br> Di <?= $hasil2['alamat'];?>, Kecamatan Barong Tongkok Kabupaten Kutai Barat.</font>
              </td>
              </td>
              <tr>
                <td colspan="2" height="30"></td>
              </tr>
              <tr>
                <td colspan="2"><font size="3"> Demikian Surat <?= $hasil2['jenis_surat'];?> Kematian ini kami buat dengan sebenarnya dan agar dapat dipergunakan <br> sebagaimana mestinya</font></td>
              </tr>
            </tr>
          </table>
          <br><br>

          <table align="right">
            <tr>
              <td><font size="3"> Rejo Basuki, <?php echo $hasil2['tanggal'];?> </font></td>
            </tr>
            <tr>
              <td><font size="3"> Kepala Kampung Rejo Basuki</font></td>
            </tr>
            <tr>
              <td height="60" colspan="2"></td>
            </tr>
            <tr>
              <td colspan="2"><b><center> SUPRIADI </center></b></td>
            </tr>
          </table>

        <script>window.print();</script> 
      </div>
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
  <!-- <center><strong>Copyright &copy; Skripsi 2109 <a href="https://adminlte.io">Templete From: Almsaeed Studio</a></strong></center> -->
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


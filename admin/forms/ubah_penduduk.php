<?php
require_once('../../proses/koneksi.php');
session_start();
if(!isset($_SESSION['username'])) {
  session_destroy();
  header("Location: ../../login.php");
}

$nik = $_GET['nik'];
$query = mysqli_query($koneksi, "SELECT * FROM penduduk WHERE nik = '$nik'");
$penduduk = mysqli_fetch_array($query);

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
  <link rel="stylesheet" href="../../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="../../bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="../../bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <script type="text/javascript" src="../../js/penduduk.js"></script>
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


    <!-- NAVIGASI -->
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
      <li class="active">
        <a href="../tables/data_penduduk.php">
          <i class="fa fa-table"></i><span>Data Penduduk</span>
        </a>
      </li>
      <!-- END TABEL DATA PENDUDUK -->

      <!-- DATA SURAT -->
      <!-- <li class="active">
        <a href="../tables/data_surat.php">
          <i class="glyphicon glyphicon-envelope"></i><span>Data Surat</span>
        </a>
      </li> -->
      <!-- END DATA SURAT -->

      <!-- DATA SURAT -->
      <li class="treeview">
        <a href="">
          <i class="glyphicon glyphicon-envelope"></i> <span>Data Surat</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="buat_surat.php"><i class="fa fa-circle-o"></i>Buat Surat</a></li>
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
        <a href="profil.php">
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
   <br>
   <ol class="breadcrumb">
    <li><a href="../../index_admin.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="ubah_surat.php">Form</a></li>
    <li class="active">Edit Surat</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <!-- SELECT2 EXAMPLE -->
  <div class="box box-default">
    <div class="box-header with-border">
      <h3><center>Form Ubah Data Penduduk</center></h3><hr><br>
      <div class="x_content">
        <form action="../../proses/proses_edit_penduduk.php" class="form-horizontal form-label-left" novalidate method="POST">
          <div class="item form-group">
            <label for="nik" class="control-label col-md-3 col-sm-3 col-xs-12">NIK
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="nik" class="form-control col-md-7 col-xs-12" name="nik" type="text" value="<?php echo $penduduk['nik'];?>" readonly>
            </div>
          </div>

          <div class="form-group row">
            <label for="nama" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Lengkap
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="nama" type="text" name="nama" class="form-control col-md-7 col-xs-12" value="<?php echo $penduduk['nama'];?>" required="required">
            </div>
          </div>

          <div class="form-group row">
            <label for="no_kk" class="control-label col-md-3 col-sm-3 col-xs-12">No KK
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input class="form-control col-md-7 col-xs-12" name="no_kk" type="text" value="<?php echo $penduduk['no_kk']?>" readonly>
            </div>
          </div>

          <div class="form-group row">
            <label for="agama" class="control-label col-md-3 col-sm-3 col-xs-12">Agama
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select name="agama" class="form-control select2" style="width: 100%;">
                <option selected="selected">---Pilih Agama---</option>
                <option value="Islam" <?php $penduduk['agama'] == 'Islam' ? print "selected" : "";?>>Islam</option>
                <option value="Kristen" <?php $penduduk['agama'] == 'Kristen' ? print "selected" : "";?>>Kristen</option>
                <option value="Katolik" <?php $penduduk['agama'] == 'Katolik' ? print "selected" : "";?> >Katolik</option>
                <option value="Hindu" <?php $penduduk['agama'] == 'Hindu' ? print "selected" : "";?> >Hindu</option>
                <option value="" required>Budha</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="id_pendidikan" class="control-label col-md-3 col-sm-3 col-xs-12">Pendidikan
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select id="pendidikan" name="pendidikan" class="form-control select2" style="width: 100%;">
                <?php
                $query_pendidikan = "SELECT * FROM pendidikan";
                $sql_pendidikan = mysqli_query($koneksi, $query_pendidikan);

                while ($data_penduduk = mysqli_fetch_array($sql_pendidikan)) {
                  if ($penduduk['id_pendidikan']==$data_penduduk['tingkat_pendidikan']) {
                   $select="selected";
                 }else{
                   $select="";
                 }
                 echo "<option $select>".$data_penduduk['tingkat_pendidikan']."</option>";
               }
               ?>
             </select>
           </div>
         </div>

         <div class="form-group row">
          <label for="id_pekerjaan" class="control-label col-md-3 col-sm-3 col-xs-12">Pekerjaan
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <select id="pekerjaan" name="pekerjaan" class="form-control select2" style="width: 100%;">
              <?php
              $query_pekerjaan = "SELECT * FROM pekerjaan";
              $sql_pekerjaan = mysqli_query($koneksi, $query_pekerjaan);

              while ($data_penduduk = mysqli_fetch_array($sql_pekerjaan)) {
                if ($penduduk['id_pekerjaan']==$data_penduduk['keterangan']) {
                 $select="selected";
               }else{
                 $select="";
               }
               echo "<option $select>".$data_penduduk['keterangan']."</option>";
             }
             ?>
           </select>
         </div>
       </div>

       <div class="form-group row">
        <label for="status_hub_keluarga" class="control-label col-md-3 col-sm-3 col-xs-12">Status Hubungan Keluarga
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <select name="status_hub_keluarga" class="form-control select2" style="width: 100%;">
            <option selected="selected">---Pilih Status Hubungan Keluarga---</option>
            <option value="Kepala Keluarga" <?php $penduduk['status_hub_keluarga'] == 'Kepala Keluarga' ? print "selected" : "";?>>Kepala Keluarga</option>
            <option value="Istri" <?php $penduduk['status_hub_keluarga'] == 'Istri' ? print "selected" : "";?>>Istri</option>
            <option value="Anak" <?php $penduduk['status_hub_keluarga'] == 'Anak' ? print "selected" : "";?>>Anak</option>
          </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="status_perkawinan" class="control-label col-md-3 col-sm-3 col-xs-12">Status Perkawinan
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <select name="status_perkawinan" class="form-control select2" style="width: 100%;">
            <option selected="selected">---Pilih Status Perkawinan---</option>
            <option value="Kawin" <?php $penduduk['status_perkawinan'] == 'Kawin' ? print "selected" : "";?>>Kawin</option>
            <option value="Belum Kawin" <?php $penduduk['status_perkawinan'] == 'Belum Kawin' ? print "selected" : "";?>>Belum Kawin</option>
          </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="status_kependudukan" class="control-label col-md-3 col-sm-3 col-xs-12">Status Kependudukan
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <select name="status_kependudukan" class="form-control select2" style="width: 100%;">
            <option selected="selected">---Pilih Status Kependudukan---</option>
            <option value="Penduduk Tetap" <?php $penduduk['status_kependudukan'] == 'Penduduk Tetap' ? print "selected" : "";?>>Penduduk Tetap</option>
            <option value="Penduduk Pindah" <?php $penduduk['status_kependudukan'] == 'Penduduk Pindah' ? print "selected" : "";?>>Penduduk Pindah</option>
            <option value="Penduduk Datang" <?php $penduduk['status_kependudukan'] == 'Penduduk Datang' ? print "selected" : "";?>>Penduduk Datang</option>
            <option value="Meninggal" <?php $penduduk['status_kependudukan'] == 'Meninggal' ? print "selected" : "";?>>Meninggal</option>
          </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="kewarganegaraan" class="control-label col-md-3 col-sm-3 col-xs-12">Kewarganegaraan
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <select name="kewarganegaraan" class="form-control select2" style="width: 100%;">
            <option selected="selected">---Pilih Kewarganegaraan---</option>
            <option value="WNI"<?php $penduduk['kewarganegaraan'] == 'WNI' ? print "selected" : "";?>>WNI</option>
            <option value="WNA"<?php $penduduk['kewarganegaraan'] == 'WNA' ? print "selected" : "";?>>WNA</option>
          </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="nama_ibu" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Ibu
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text" name="nama_ibu" class="form-control col-md-7 col-xs-12" value="<?php echo $penduduk['nama_ibu'];?>" required>
        </div>
      </div>

      <div class="form-group row">
        <label for="nama_ayah" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Ayah
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text" name="nama_ayah" class="form-control col-md-7 col-xs-12" value="<?php echo $penduduk ['nama_ayah'];?>" required>
        </div>
      </div>

      <div class="form-group row">
        <label for="alamat" class="control-label col-md-3 col-sm-3 col-xs-12">Alamat
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text" name="alamat" class="form-control col-md-7 col-xs-12" value="<?php echo $penduduk['alamat'];?>" required>
        </div>
      </div>

      <center>

        <a href="../tables/data_penduduk.php" class="btn btn-warning" type="submit" name="submit" value="submit">Batal</a>
        <input class="btn btn-primary" type="submit" id="btn-submit" name="submit" value="Submit" onclick="return editPenduduk();">
      </center> <br>
    </form>
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

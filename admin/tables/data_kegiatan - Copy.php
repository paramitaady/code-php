<?php
require_once('../../proses/koneksi.php');
session_start();
if(!isset($_SESSION['username'])) {
  session_destroy();
  header("Location: ../../login.php");
}

  // $query = mysqli_query($koneksi, "SELECT * FROM kegiatan");

$query2 = "SELECT * FROM petugas WHERE username='".$_SESSION['username']."' LIMIT 1";
$hasil = mysqli_query($koneksi, $query2);
$admin = mysqli_fetch_array($hasil);

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
  <script type="text/javascript" src="../../js/kegiatan.js"></script>
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
          <h2 style="color: white">SISTEM INFORMASI KANTOR KEPALA KAMPUNG REJO BASUKI</h2>   
        </div>
        
        <div class="navbar-header navbar-right">
          <br>
          <a href="../../logout.php" class="dropdown-toggle icon-menu" >
            <button type="submit" name="submit" value="submit" class="btn btn-warning">LOGOUT</button>
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
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
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
        <li>
          <a href="data_surat.php">
            <i class="glyphicon glyphicon-envelope"></i><span>Data Surat</span>
          </a>
        </li>
        <!-- END DATA SURAT -->

        <!-- DATA KEGIATAN DESA -->
        <li class="active">
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
        <li><a href="data_kegiatan.php">Tabel</a></li>
        <li class="active">Data Kegiatan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <br>
            <div class="box-body">
             <a href="../forms/tambah_kegiatan.php" class="btn btn-success">
              <span class="glyphicon glyphicon-plus"></span> Tambah Data Kegiatan
            </a>
            <div class="box-body navbar-right">
              <a href="../../proses/cetak_data_kegiatan.php" class="btn btn-primary" target="_blank" onclick="myPrint()">Cetak Data</a>
            </div><br><br>
            
            <form method="GET" class="form-inline" action="">
              <select name="bulan" class="form-control" required="required">
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
              <button class="btn btn-primary" name="filter"><span class="glyphicon glyphicon-search"></span> Cari</button>
            </form>
            <hr size="2">

            <div>
              <center><h3><b>TABEL DATA KEGIATAN DESA</b></h3></center>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>N0</th>
                    <th>NAMA KEGIATAN</th>
                    <th>LEMBAGA</th>
                    <th>TANGGAL KEGIATAN</th>
                    <th>LOKASI</th>
                    <th>DANA</th>
                    <th>AKSI</th>
                  </tr>
                </thead>
                <tbody>
                 <?php
                 if (isset($_GET['bulan'])) {
                  $pilihan = $_GET['bulan'];

                  if ($pilihan == '1') {
                    $query = mysqli_query($koneksi, "SELECT * FROM kegiatan WHERE MONTH(tanggal_kegiatan)='01'");
                  }elseif ($pilihan == '2') {
                    $query = mysqli_query($koneksi, "SELECT * FROM kegiatan WHERE MONTH(tanggal_kegiatan)='02'");
                  }elseif ($pilihan == '3') {
                    $query = mysqli_query($koneksi, "SELECT * FROM kegiatan WHERE MONTH(tanggal_kegiatan)='03'");
                  }elseif ($pilihan == '4') {
                    $query = mysqli_query($koneksi, "SELECT * FROM kegiatan WHERE MONTH(tanggal_kegiatan)='04'");
                  }elseif ($pilihan == '5') {
                    $query = mysqli_query($koneksi, "SELECT * FROM kegiatan WHERE MONTH(tanggal_kegiatan)='05'");
                  }elseif ($pilihan == '6') {
                    $query = mysqli_query($koneksi, "SELECT * FROM kegiatan WHERE MONTH(tanggal_kegiatan)='06'");
                  }elseif ($pilihan == '7') {
                    $query = mysqli_query($koneksi, "SELECT * FROM kegiatan WHERE MONTH(tanggal_kegiatan)='07'");
                  }elseif ($pilihan == '8') {
                    $query = mysqli_query($koneksi, "SELECT * FROM kegiatan WHERE MONTH(tanggal_kegiatan)='08'");
                  }elseif ($pilihan == '9') {
                    $query = mysqli_query($koneksi, "SELECT * FROM kegiatan WHERE MONTH(tanggal_kegiatan)='09'");
                  }elseif ($pilihan == '10') {
                    $query = mysqli_query($koneksi, "SELECT * FROM kegiatan WHERE MONTH(tanggal_kegiatan)='10'");
                  }elseif ($pilihan == '11') {
                    $query = mysqli_query($koneksi, "SELECT * FROM kegiatan WHERE MONTH(tanggal_kegiatan)='11'");
                  }elseif ($pilihan == '12') {
                    $query = mysqli_query($koneksi, "SELECT * FROM kegiatan WHERE MONTH(tanggal_kegiatan)='12'");
                  }
                }else{
                  $query = mysqli_query($koneksi, "SELECT * FROM kegiatan");
                }
                $no = 1;
                while ($kegiatan = mysqli_fetch_array($query)) { ?>
                  <tr>
                    <td><?php echo $no++;?></td>
                    <td><?php echo $kegiatan['nama_kegiatan'];?></td>
                    <td><?php echo $kegiatan['lembaga'];?></td>
                    <td><?php echo $kegiatan['tanggal_kegiatan'];?></td>
                    <td><?php echo $kegiatan['lokasi'];?></td>
                    <td><?php echo $kegiatan['dana'];?></td>
                    <td>
                      <a href="../forms/ubah_kegiatan.php?id_kegiatan=<?php echo $kegiatan['id_kegiatan']; ?>" class="btn btn-info btn-xs">Edit</a>
                      <a href="../../proses/proses_hapus_kegiatan.php?id_kegiatan=<?php echo $kegiatan['id_kegiatan'];?>" onClick="return hapusKegiatan();" class="btn btn-danger btn-xs">Hapus</a>
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
    <b>Version</b> 2.4.0
  </div>
  <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
  reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Create the tabs -->
  <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
    <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
    <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <!-- Home tab content -->
    <div class="tab-pane" id="control-sidebar-home-tab">
      <h3 class="control-sidebar-heading">Recent Activity</h3>
      <ul class="control-sidebar-menu">
        <li>
          <a href="javascript:void(0)">
            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

            <div class="menu-info">
              <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

              <p>Will be 23 on April 24th</p>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)">
            <i class="menu-icon fa fa-user bg-yellow"></i>

            <div class="menu-info">
              <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

              <p>New phone +1(800)555-1234</p>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)">
            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

            <div class="menu-info">
              <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

              <p>nora@example.com</p>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)">
            <i class="menu-icon fa fa-file-code-o bg-green"></i>

            <div class="menu-info">
              <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

              <p>Execution time 5 seconds</p>
            </div>
          </a>
        </li>
      </ul>
      <!-- /.control-sidebar-menu -->

      <h3 class="control-sidebar-heading">Tasks Progress</h3>
      <ul class="control-sidebar-menu">
        <li>
          <a href="javascript:void(0)">
            <h4 class="control-sidebar-subheading">
              Custom Template Design
              <span class="label label-danger pull-right">70%</span>
            </h4>

            <div class="progress progress-xxs">
              <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)">
            <h4 class="control-sidebar-subheading">
              Update Resume
              <span class="label label-success pull-right">95%</span>
            </h4>

            <div class="progress progress-xxs">
              <div class="progress-bar progress-bar-success" style="width: 95%"></div>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)">
            <h4 class="control-sidebar-subheading">
              Laravel Integration
              <span class="label label-warning pull-right">50%</span>
            </h4>

            <div class="progress progress-xxs">
              <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)">
            <h4 class="control-sidebar-subheading">
              Back End Framework
              <span class="label label-primary pull-right">68%</span>
            </h4>

            <div class="progress progress-xxs">
              <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
            </div>
          </a>
        </li>
      </ul>
      <!-- /.control-sidebar-menu -->

    </div>
    <!-- /.tab-pane -->
    <!-- Stats tab content -->
    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
    <!-- /.tab-pane -->
    <!-- Settings tab content -->
    <div class="tab-pane" id="control-sidebar-settings-tab">
      <form method="post">
        <h3 class="control-sidebar-heading">General Settings</h3>

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Report panel usage
            <input type="checkbox" class="pull-right" checked>
          </label>

          <p>
            Some information about this general settings option
          </p>
        </div>
        <!-- /.form-group -->

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Allow mail redirect
            <input type="checkbox" class="pull-right" checked>
          </label>

          <p>
            Other sets of options are available
          </p>
        </div>
        <!-- /.form-group -->

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Expose author name in posts
            <input type="checkbox" class="pull-right" checked>
          </label>

          <p>
            Allow the user to show his name in blog posts
          </p>
        </div>
        <!-- /.form-group -->

        <h3 class="control-sidebar-heading">Chat Settings</h3>

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Show me as online
            <input type="checkbox" class="pull-right" checked>
          </label>
        </div>
        <!-- /.form-group -->

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Turn off notifications
            <input type="checkbox" class="pull-right">
          </label>
        </div>
        <!-- /.form-group -->

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Delete chat history
            <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
          </label>
        </div>
        <!-- /.form-group -->
      </form>
    </div>
    <!-- /.tab-pane -->
  </div>
</aside>
<!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
   immediately after the control sidebar -->
   <div class="control-sidebar-bg"></div>
 </div>
 <!-- ./wrapper -->

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


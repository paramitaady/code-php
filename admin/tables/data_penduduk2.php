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
  <title>Rejo Basuki</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
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


      <!-- TABEL DATA PENDUDUK -->
      <li  class="active">
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
      <li><a href="data_penduduk.php">Tabel</a></li>
      <li class="active">Data Penduduk</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            <?php 
            if(isset($_GET['berhasil'])){
              echo "<p>".$_GET['berhasil']." Data berhasil di import.</p>";
            }
            ?>
            <br>
            <a href="../forms/tambah_penduduk.php" class="btn btn-success">
              <span class="glyphicon glyphicon-plus"></span> Tambah Data Penduduk
            </a>
            <div class="box-body navbar-right">
              <a class="btn btn-primary" href="../../proses/upload_file_excel.php">Import File Excel</a>
            </div>
            <br>
            <br>
            <!-- <form method="GET" class="form-inline" action="">
              <select name="filter" class="form-control" required="required">
                <option value="">---Pilih Status Penduduk---</option>
                <?php
                $query = "SELECT status_kependudukan AS status FROM penduduk GROUP BY status_kependudukan ASC"; 
                $sql = mysqli_query($koneksi, $query); 

                while($penduduk = mysqli_fetch_array($sql)){
                  echo '<option>'.$penduduk['status'].'</option>';
                }
                ?>
              </select>
              <button class="btn btn-primary" name="filter" type="submit"><span class="glyphicon glyphicon-search"></span>Cari</button>
            </form> -->

            <form method="GET" class="form-inline" action="">
              <select name="filter" class="form-control" required="required">
                <option value="">---Pilih Status Penduduk---</option>
                <option value="1">Penduduk Tetap</option>
                <option value="2">Penduduk Tidak Tetap</option>
              </select>
              <button class="btn btn-primary" name="filter"><span class="glyphicon glyphicon-search"></span> Cari</button>
            </form>

          </div>
          <hr size="2">

          <?php

          if(isset($_GET['filter']) && ! empty($_GET['filter'])){ 

          $filter = $_GET['filter'];

          if ($filter == '1') {
            $query = "SELECT pdd.nik, pdd.nama, pdd.jenis_kelamin, pdd.tempat_lahir, pdd.tanggal_lahir, pdd.no_kk, pdd.agama, pdd.status_kependudukan, pdd.status_perkawinan, pdd.kewarganegaraan, pen.tingkat_pendidikan, pek.keterangan FROM pendidikan pen JOIN penduduk pdd ON (pdd.id_pendidikan = pen.id_pendidikan) JOIN pekerjaan pek ON (pdd.id_pekerjaan = pek.id_pekerjaan) WHERE status_kependudukan='$Penduduk Tetap'";

          }else{
            $query = "SELECT pdd.nik, pdd.nama, pdd.jenis_kelamin, pdd.tempat_lahir, pdd.tanggal_lahir, pdd.no_kk, pdd.agama, pdd.status_kependudukan, pdd.status_perkawinan, pdd.kewarganegaraan, pen.tingkat_pendidikan, pek.keterangan FROM pendidikan pen JOIN penduduk pdd ON (pdd.id_pendidikan = pen.id_pendidikan) JOIN pekerjaan pek ON (pdd.id_pekerjaan = pek.id_pekerjaan) WHERE status_kependudukan='Penduduk Tidak Tetap'";

  // $hasil = mysqli_query($koneksi, $query);
          }
        }else{

          $query = "SELECT pdd.nik, pdd.nama, pdd.jenis_kelamin, pdd.tempat_lahir, pdd.tanggal_lahir, pdd.no_kk, pdd.agama, pdd.status_kependudukan, pdd.status_perkawinan, pdd.kewarganegaraan, pen.tingkat_pendidikan, pek.keterangan FROM pendidikan pen JOIN penduduk pdd ON (pdd.id_pendidikan = pen.id_pendidikan) JOIN pekerjaan pek ON (pdd.id_pekerjaan = pek.id_pekerjaan)";
        }
          ?>

          <div>
            <center><h3><b>TABEL DATA PENDUDUK</b></h3></center>
          </div>           

          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>NIK</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>Tempat Lahir</th>
                  <th>Tanggal Lahir</th>
                  <th>No KK</th>
                  <th>Agama</th>
                  <th>Pendidikan</th>
                  <th>Pekerjaan</th>
                  <th>Status Hubungan Keluarga</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
               <?php
               $data = mysqli_query($koneksi, $query);
               while ($penduduk = mysqli_fetch_array($data)) { ?>
                <tr>
                  <td><?php echo $penduduk['nik'];?></td>
                  <td><?php echo $penduduk['nama'];?></td>
                  <td><?php echo $penduduk['jenis_kelamin'];?></td>
                  <td><?php echo $penduduk['tempat_lahir'];?></td>
                  <td><?php echo $penduduk['tanggal_lahir'];?></td>
                  <td><a href="kepala_keluarga.php"><?php echo $penduduk['no_kk'];?></a></td>
                  <td><?php echo $penduduk['agama'];?></td>
                  <td><?php echo $penduduk['tingkat_pendidikan'];?></td>
                  <td><?php echo $penduduk['keterangan'];?></td>
                  <td><?php echo $penduduk['status_kependudukan'];?></td>
                  <td>
                    <a href="../forms/ubah_penduduk.php?nik=<?php echo $penduduk['nik']; ?>" class="btn btn-info">Edit</a>
                    <a href="../../proses/proses_hapus_penduduk.php?nik=<?php echo $penduduk['nik'];?>" onClick="return hapusPenduduk();" class="btn btn-danger">Hapus</a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
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

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
$kades = mysqli_fetch_array($hasil);

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/ico" href="../../gambar/kubarr.ico">
  <title>Rjb - Kepala Desa</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <script type="text/javascript" src="../jquery-1.4.3.min.js"></script>
  <script type="text/javascript" src="../notifikasi.js"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

   <header class="main-header">
     <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
         <h2 style="color: white">SISTEM INFORMASI KANTOR DESA REJO BASUKI</h2>   
       </div>

       <div class="navbar-header navbar-right">
        <div class="navbar-custom-menu">
          <br>   
          <a href="../../logout.php" class="dropdown-toggle icon-menu" >
            <button type="submit" name="submit" value="submit" class="btn btn-warning">LOGOUT</button>
          </a>
        </div>
      </div>

      <br>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span id="notifikasi" class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../dist/img/kubar.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Selamat Datang</p>
          <br>
          <?php echo $kades['nama'];?> :)
          <!-- <a href="#"><i class="fa fa-circle text-success"></i>Kepala Desa</a> -->
        </div>
      </div>
      <br>

      <!-- NAVIGASI -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
       <!--  <li>
          <a href="../../index_kades.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li> -->

        <!-- <li class="active">
          <a href="data_surat.php">
            <i class="glyphicon glyphicon-envelope"></i><span>Data Surat</span>
          </a>
        </li> -->
        
        
         <!-- DATA SURAT -->
        <li class="treeview">
          <a href="">
            <i class="glyphicon glyphicon-envelope"></i> <span>Data Surat</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="data_surat.php"><i class="fa fa-circle-o"></i>Data Surat</a></li>
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

        <!-- DATA PETUGAS -->
        <li>
          <a href="data_petugas.php">
            <i class="glyphicon glyphicon-list-alt"></i><span>Data Petugas</span>
          </a>
        </li>
        <!-- END DATA PETUGAS -->


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
      <br>
      <ol class="breadcrumb">
        <li><a href="../../index_kades.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
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
              <br>
              <a class="btn btn-success" href="data_kegiatan.php">Tampilkan Semua Data</a>
              <div class="box-body navbar-right">
               <a href="../../proses/cetak_data_surat.php" class="btn btn-primary" >Cetak Data</a>
             </div> 
             <br>
             <br>
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
              <button class="btn btn-primary" name="filter"><span class="glyphicon glyphicon-search"></span>Cari</button>
            </form>
            <hr size="2">

            <div>
              <center><h3><b>DATA KEGIATAN KAMPUNG REJO BASUKI</b></h3></center>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>NO</th>
                    <th>TANGGAL</th>
                    <th>NO SURAT</th>
                    <th>JENIS SURAT</th>
                    <th>DITUJUKAN KEPADA</th>
                    <th>KETERANGAN</th>
                  </tr>
                </thead>
                <tbody>

                  <?php

                  if (isset($_GET['bulan'])) {
                    $bulan = $_GET['bulan'];

                    if ($bulan == '1') {
                      $query = mysqli_query($koneksi, "SELECT * FROM surat WHERE MONTH(tanggal)='01'");
                    }elseif ($bulan == '2') {
                      $query = mysqli_query($koneksi, "SELECT * FROM surat WHERE MONTH(tanggal)='02'");
                    }elseif ($bulan == '3') {
                      $query = mysqli_query($koneksi, "SELECT * FROM surat WHERE MONTH(tanggal)='03'");
                    }elseif ($bulan == '4') {
                      $query = mysqli_query($koneksi, "SELECT * FROM surat WHERE MONTH(tanggal)='04'");
                    }elseif ($bulan == '5') {
                      $query = mysqli_query($koneksi, "SELECT * FROM surat WHERE MONTH(tanggal)='05'");
                    }elseif ($bulan == '6') {
                      $query = mysqli_query($koneksi, "SELECT * FROM surat WHERE MONTH(tanggal)='06'");
                    }elseif ($bulan == '7') {
                      $query = mysqli_query($koneksi, "SELECT * FROM surat WHERE MONTH(tanggal)='07'");
                    }elseif ($bulan == '8') {
                      $query = mysqli_query($koneksi, "SELECT * FROM surat WHERE MONTH(tanggal)='08'");
                    }elseif ($bulan == '9') {
                      $query = mysqli_query($koneksi, "SELECT * FROM surat WHERE MONTH(tanggal)='09'");
                    }elseif ($bulan == '10') {
                      $query = mysqli_query($koneksi, "SELECT * FROM surat WHERE MONTH(tanggal)='10'");
                    }elseif ($bulan == '11') {
                      $query = mysqli_query($koneksi, "SELECT * FROM surat WHERE MONTH(tanggal)='11'");
                    }elseif ($bulan == '12') {
                      $query = mysqli_query($koneksi, "SELECT * FROM surat WHERE MONTH(tanggal)='12'");
                    }
                  }else{
                    $query = mysqli_query($koneksi, "SELECT * FROM surat");
                  }

                  $no_surat = $_GET['$no_surat'];
                  $notif = mysqli_query($koneki, "SELECT * FROM surat WHERE no_surat='$no_surat'");
                  $i = 1;
                  while ($surat = mysqli_fetch_array($query)) { ?>                    
                    <tr>
                      <td><?php echo $i++;?></td>
                      <td><?php echo $surat['tanggal'];?></td>
                      <td><?php echo $surat['no_surat'];?></td>
                      <td><?php echo $surat['jenis_surat'];?></td>
                      <td><?php echo $surat['tujuan'];?></td>
                      <td><?php echo $surat['keterangan'];?></td>
                    </tr>

                  <?php } 

                  //set sudah dibaca = Y kalau sudah dibaca
                  $update = mysqli_query($koneksi, "UPDATE surat SET dilihat='Y'
                    WHERE no_surat=$no_surat ");

                    ?>

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

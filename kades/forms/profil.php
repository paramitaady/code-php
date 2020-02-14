<?php
  require_once('../../proses/koneksi.php');
  session_start();
  if(!isset($_SESSION['username'])) {
    session_destroy();
    header("Location: ../../login.php");
  }

  $query = "SELECT * FROM petugas WHERE username='".$_SESSION['username']."' LIMIT 1";
  $hasil = mysqli_query($koneksi, $query);
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
        <?php echo $kades['nama'];?> :)
        <!-- <a href="#"><i class="fa fa-circle text-success"></i>Kepala Desa</a> -->
      </div>
    </div>
    <br>
    
       <!-- NAVIGASI -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <!-- <li>
          <a href="../../index_kades.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li> -->

        <!-- <li>
          <a href="../tables/data_surat.php">
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

        <!-- DATA PETUGAS -->
        <li>
          <a href="../tables/data_petugas.php">
            <i class="glyphicon glyphicon-list-alt"></i><span>Data Petugas</span>
          </a>
        </li>
        <!-- END DATA PETUGAS -->

       
        <!-- KELOLA DATA DIRI -->
        <li class="active">
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
        <li><a href="../../index_kades.php"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="profil.php">Form</a></li>
        <li class="active">Profil Diri</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

     <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
          <div class="box-header with-border">
            <h3><center>Informasi Data Profil</center></h3><br>
            <div class="x_content">
              <form class="form-horizontal form-label-left" novalidate>

                <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama" readonly>Nama</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="nama" class="form-control col-md-7 col-xs-12" name="nama" type="text" readonly value="<?php echo $kades['nama'];?>">
                </div>
              </div>

              <div class="form-group row">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username" readonly>Username</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="username" class="form-control col-md-7 col-xs-12" name="username" type="text" readonly value="<?php echo $kades['username'];?>">
                </div>
              </div>

              <div class="form-group row">
                <label for="password" class="control-label col-md-3 col-sm-3 col-xs-12" readonly>Password</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="password" type="text" name="password" class="form-control col-md-7 col-xs-12" value="<?php echo $kades['password'];?>" readonly>
                </div>
              </div>

                <div class="form-group row">
                  <div class="col-md-6 col-md-offset-3">
                    <center>
                      <a href="ubah_profil.php" class="btn btn-primary" type="submit" name="submit" value="submit" >Ubah Data</a></center>
                  </div>
                </div>
              </form>
            </div>
          </div>
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
word

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

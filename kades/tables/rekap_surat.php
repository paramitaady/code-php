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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

   <header class="main-header">
     <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
         <h3 style="color: white">SISTEM INFORMASI KANTOR DESA REJO BASUKI</h3>   
       </div>

       <div class="navbar-header navbar-right">
        <div class="navbar-custom-menu">
          <br>   
          <a href="../../logout.php" class="dropdown-toggle icon-menu" >
            <button type="submit" name="submit" value="submit" class="btn btn-warning">Logout</button>
          </a>
        </div>
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

       <!--  <li class="active">
          <a href="data_surat.php">
            <i class="glyphicon glyphicon-envelope"></i><span>Data Surat</span>
          </a>
        </li> -->

        <!-- DATA SURAT -->
        <li class="active treeview">
          <a href="">
            <i class="glyphicon glyphicon-envelope"></i> <span>Data Surat</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="data_surat.php"><i class="fa fa-circle-o"></i>Data Surat</a></li>
            <li class="active"><a href="rekap_surat.php"><i class="fa fa-circle-o"></i>Rekapitulasi Surat</a></li>
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
        <li><a href="../../index_kades.php"><i class="fa fa-dashboard"></i>Home</a></li>
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
              
             <!--  <a class="btn btn-success" href="data_surat.php">Tampilkan Semua Data</a> -->
              <div class="pull-right">
               <!-- <a href="../../print/cetak_rekap.php" class="btn btn-primary" target="_blank" ><i class="fa fa-print"></i> Cetak Data</a> -->
               <!-- <a class="btn btn-primary" onclick="window.print();">Cetak Data</a> -->
             </div> 
             
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
            <center><h3><b>REKAPITULASI SURAT</b></h3></center>

            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Jenis Surat Keluar</th>
                    <th>Jumlah</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  if (isset($_GET['bulan'])) {
                    $bulan = $_GET['bulan'];

                    if ($bulan == '1') {
                      $query = mysqli_query($koneksi, "SELECT keterangan FROM surat WHERE MONTH(tanggal)='01' GROUP BY keterangan");
                    }elseif ($bulan == '2') {
                      $query = mysqli_query($koneksi, "SELECT keterangan, COUNT(*) AS jumlah FROM surat WHERE MONTH(tanggal)='02' GROUP BY keterangan");
                    }elseif ($bulan == '3') {
                      $query = mysqli_query($koneksi, "SELECT keterangan, COUNT(*) AS jumlah FROM surat WHERE MONTH(tanggal)='03' GROUP BY keterangan");
                    }elseif ($bulan == '4') {
                      $query = mysqli_query($koneksi, "SELECT keterangan, COUNT(*) AS jumlah FROM surat WHERE MONTH(tanggal)='04' GROUP BY keterangan");
                    }elseif ($bulan == '5') {
                      $query = mysqli_query($koneksi, "SELECT keterangan, COUNT(*) AS jumlah FROM surat WHERE MONTH(tanggal)='05' GROUP BY keterangan");
                    }elseif ($bulan == '6') {
                      $query = mysqli_query($koneksi, "SELECT keterangan, COUNT(*) AS jumlah FROM surat WHERE MONTH(tanggal)='06' GROUP BY keterangan");
                    }elseif ($bulan == '7') {
                      $query = mysqli_query($koneksi, "SELECT keterangan, COUNT(*) AS jumlah FROM surat WHERE MONTH(tanggal)='07' GROUP BY keterangan");
                    }elseif ($bulan == '8') {
                      $query = mysqli_query($koneksi, "SELECT keterangan, COUNT(*) AS jumlah FROM surat WHERE MONTH(tanggal)='08' GROUP BY keterangan");
                    }elseif ($bulan == '9') {
                      $query = mysqli_query($koneksi, "SELECT keterangan, COUNT(*) AS jumlah FROM surat WHERE MONTH(tanggal)='09' GROUP BY keterangan");
                    }elseif ($bulan == '10') {
                      $query = mysqli_query($koneksi, "SELECT keterangan, COUNT(*) AS jumlah FROM surat WHERE MONTH(tanggal)='10' GROUP BY keterangan");
                    }elseif ($bulan == '11') {
                      $query = mysqli_query($koneksi, "SELECT keterangan, COUNT(*) AS jumlah FROM surat WHERE MONTH(tanggal)='11' GROUP BY keterangan");
                    }elseif ($bulan == '12') {
                      $query = mysqli_query($koneksi, "SELECT keterangan, COUNT(*) AS jumlah FROM surat WHERE MONTH(tanggal)='12' GROUP BY keterangan");
                    }
                  }else{
                    $query = mysqli_query($koneksi, "SELECT keterangan, COUNT(*) AS jumlah FROM surat GROUP BY keterangan");
                  }

                  $row = mysqli_num_rows($query); 

                  if($row > 0){ 
                    $i = 1;
                    $jumlah = 0;
                    while($surat = mysqli_fetch_array($query)){ 
                      echo "<tr>";
                      echo "<td>".$i++."</td>";
                      echo "<td>".$surat['keterangan']."</td>";
                      echo "<td>".$surat['jumlah']."</td>";
                      echo "</tr>";
                      $jumlah += $surat['jumlah'];
                    }
                      echo "<tr>";
                      echo "<td><b>Jumlah</b></td>";
                      echo "<td><b></b></td>";
                      echo "<td><b>".number_format($jumlah)."</b></td>";
                      echo "</tr>";
                  }
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

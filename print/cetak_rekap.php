<?php
include("../proses/koneksi.php");

?>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/ico" href="../gambar/kubarr.ico">
  <title>Rjb - Kepala Desa</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
</head>

<body>

 <div class="content-wrapper">

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <br>
          <div class="box-body">

            
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
                      $query = mysqli_query($koneksi, "SELECT keterangan FROM surat WHERE MONTH(tanggal)='01' GROUP BY jenis_surat");
                    }elseif ($bulan == '2') {
                      $query = mysqli_query($koneksi, "SELECT keterangan, COUNT(*) AS jumlah FROM surat WHERE MONTH(tanggal)='02' GROUP BY jenis_surat");
                    }elseif ($bulan == '3') {
                      $query = mysqli_query($koneksi, "SELECT keterangan, COUNT(*) AS jumlah FROM surat WHERE MONTH(tanggal)='03' GROUP BY jenis_surat");
                    }elseif ($bulan == '4') {
                      $query = mysqli_query($koneksi, "SELECT keterangan, COUNT(*) AS jumlah FROM surat WHERE MONTH(tanggal)='04' GROUP BY jenis_surat");
                    }elseif ($bulan == '5') {
                      $query = mysqli_query($koneksi, "SELECT keterangan, COUNT(*) AS jumlah FROM surat WHERE MONTH(tanggal)='05' GROUP BY jenis_surat");
                    }elseif ($bulan == '6') {
                      $query = mysqli_query($koneksi, "SELECT keterangan, COUNT(*) AS jumlah FROM surat WHERE MONTH(tanggal)='06' GROUP BY jenis_surat");
                    }elseif ($bulan == '7') {
                      $query = mysqli_query($koneksi, "SELECT keterangan, COUNT(*) AS jumlah FROM surat WHERE MONTH(tanggal)='07' GROUP BY jenis_surat");
                    }elseif ($bulan == '8') {
                      $query = mysqli_query($koneksi, "SELECT keterangan, COUNT(*) AS jumlah FROM surat WHERE MONTH(tanggal)='08' GROUP BY jenis_surat");
                    }elseif ($bulan == '9') {
                      $query = mysqli_query($koneksi, "SELECT keterangan, COUNT(*) AS jumlah FROM surat WHERE MONTH(tanggal)='09' GROUP BY jenis_surat");
                    }elseif ($bulan == '10') {
                      $query = mysqli_query($koneksi, "SELECT keterangan, COUNT(*) AS jumlah FROM surat WHERE MONTH(tanggal)='10' GROUP BY jenis_surat");
                    }elseif ($bulan == '11') {
                      $query = mysqli_query($koneksi, "SELECT keterangan, COUNT(*) AS jumlah FROM surat WHERE MONTH(tanggal)='11' GROUP BY jenis_surat");
                    }elseif ($bulan == '12') {
                      $query = mysqli_query($koneksi, "SELECT keterangan, COUNT(*) AS jumlah FROM surat WHERE MONTH(tanggal)='12' GROUP BY jenis_surat");
                    }
                  }else{
                    $query = mysqli_query($koneksi, "SELECT keterangan, COUNT(*) AS jumlah FROM surat GROUP BY jenis_surat");
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
  <script>
    window.print();
  </script>
</body>

</html>
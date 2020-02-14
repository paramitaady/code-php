<?php
include("../proses/koneksi.php");

?>
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

            <div>
              <center><h3><b>TABEL DATA KEGIATAN DESA</b></h3></center>
            </div><br>
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
                  </tr>
                </thead>
                <tbody>
                 <?php
                 
                 $query = mysqli_query($koneksi, "SELECT * FROM kegiatan");

                 $no = 1;
                 while ($kegiatan = mysqli_fetch_array($query)) { ?>
                  <tr>
                    <td><?php echo $no++;?></td>
                    <td><?php echo $kegiatan['nama_kegiatan'];?></td>
                    <td><?php echo $kegiatan['lembaga'];?></td>
                    <td><?php echo $kegiatan['tanggal_kegiatan'];?></td>
                    <td><?php echo $kegiatan['lokasi'];?></td>
                    <td><?php echo $kegiatan['dana'];?></td>
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
<script>
  window.print();
</script>
</body>

</html>
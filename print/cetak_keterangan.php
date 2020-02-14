<?php
include("../../proses/koneksi.php");

?>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- <title>Rejo Basuki</title> -->
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

            
          <!-- /.box-header -->
          <div class="box-body">
            <font face="Arial" color="black" size="4"> 
              <p align="center">
                <b>PEMERINTAH KABUPATEN KUTAI BARAT<br>
                  KANTOR KEPALA KAMPUNG REJO BASUKI<br>
                  KECAMATAN BARONG TONGKOK<br>
                  <i>Alamat: Jl. Trans Kalimantan Rt 002 Kode Pos 75576</i> 
                </p>
              </font>
              <hr>

              <font face="Arial" size="3"> 
                <p align="center"> 
                  <?php

                  if (isset($_POST['submit'])) { ?>
                      
                  <u><?php echo $_POST['keterangan']; ?></u><br>
                  Nomor: <?= $_POST['no_surat']?>
                </p>
              </font>

              <br>

              <font face="Arial" size="3">
                <p align="pull-right">
                  Yang bertandatangan di bawah ini Kepala Kampung Rejo Basuki Kecamatan Barong<br>
                  Tongkok Kabupaten Kutai Barat dengan ini menerangkan bahwa:
                </p>
              </font><br>

              <font face="Arial" size="3">
                <p align="pull-right">

                  Nama                  : <?php echo $_POST['nama'];?> <br>

                  Tempat Tanggal Lahir  : <?php echo $_POST['tempat_lahir'];?>, <?php echo $_POST['tanggal_lahir'];?> <br>

                  NIK                   : <?php echo $_POST['nik']?> <br>

                  Jenis Kelamin         : <?php echo $_POST['jenis_kelamin']?> <br>

                  Agama                 : <?php echo $_POST['agama']?> <br>

                  <!-- Pekerjaan             : <?php echo $_POST['pekerjaan']?> <br>
 -->
                  Alamat                : <?php echo $_POST['alamat']?> <br>

                  Kecamatan             :Barong Tongkok <br>
                </p>
              </font><br>

              <font face="Arial" size="3">
                <p align="left">
                  Yang bersangkutan adalah benar-benar berasal dari keluarga tidak mampu, karena dari
                  penghasilan yang di dapat tidak cukup untuk memenuhi biaya pendidikan, maka untuk
                  maksud tersebut mohon kiranya dapat dibantu dan diberikan BEASISWA.
                  <br><br>  
                  Demikian <?php echo $_POST['keterangan']?> ini kami buat dengan sebenarnya dan agar
                  dapat dipergunakan sebagaimana mestinya.
                </p>
              </font> <br><br><br>
             <?php } ?>

              <font face="Arial" size="3">
                <p align="right">
                  Rejo Basuki, 03 April 2019<br>
                  Kepala Kampung Rejo Basuki

                  <br><br><br><br><br>
                  <u>SUPRIADI</u>
                </p>
              </font> 
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
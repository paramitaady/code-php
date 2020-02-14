<?php
require_once('../../proses/koneksi.php');
include('../../laporan/url.php');
session_start();
if(!isset($_SESSION['username'])) {
  session_destroy();
  header("Location: ../../login.php");
  
}



// $id_laporan = $_GET['id_laporan'];

$query3 = "SELECT id_laporan FROM laporan ORDER BY id_laporan DESC";
$sql2= mysqli_query($koneksi, $query3);
$id = mysqli_fetch_array($sql2);

$query = "SELECT * FROM laporan WHERE id_laporan='".$id['id_laporan']."'";
$sql = mysqli_query($koneksi, $query);
$hasil2 = mysqli_fetch_array($sql);

$query2 = "SELECT * FROM petugas WHERE username='".$_SESSION['username']."' LIMIT 1";
$hasil = mysqli_query($koneksi, $query2);
$admin = mysqli_fetch_array($hasil);

// if (!function_exists('base_url')) {
//     function base_url($atRoot=FALSE, $atCore=FALSE, $parse=FALSE){
//         if (isset($_SERVER['HTTP_HOST'])) {
//             $http = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
//             $hostname = $_SERVER['HTTP_HOST'];
//             $dir =  str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
//             $core = preg_split('@/@', str_replace($_SERVER['DOCUMENT_ROOT'], '', realpath(dirname(__FILE__))), NULL, PREG_SPLIT_NO_EMPTY);
//             $core = $core[0];
//             $tmplt = $atRoot ? ($atCore ? "%s://%s/%s/" : "%s://%s/") : ($atCore ? "%s://%s/%s/" : "%s://%s%s");
//             $end = $atRoot ? ($atCore ? $core : $hostname) : ($atCore ? $core : $dir);
//             $base_url = sprintf( $tmplt, $http, $hostname, $end );
//         }
//         else $base_url = 'http://localhost/rjb/laporan/';
//         if ($parse) {
//             $base_url = parse_url($base_url);
//             if (isset($base_url['path'])) if ($base_url['path'] == '/') $base_url['path'] = '';
//         }
//         return $base_url;
//     }
// }
// $base_url = base_url();

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
  <link rel="stylesheet" href="../../plugins/iCheck/all.css">
  <link rel="stylesheet" href="../../bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="../../plugins/timepicker/bootstrap-timepicker.min.css">
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

<style>
-webkit-box-sizing:border-box;
-moz-box-sizing:border-box;
-ms-box-sizing:border-box;
-o-box-sizing:border-box;
box-sizing:border-box;
outline:none;
margin:0;
padding:0;
}
.whatsapp-btn {
  cursor:pointer;
  position:fixed;
  bottom:90px;
  right:90px;
  display:block;
  width:90px;
  height:90px;
  border-radius:90px;
  text-indent:-9999px;
  background:#fff url(https://lh3.googleusercontent.com/-evFtor-f_w8/W4pfajfP17I/AAAAAAAAE9E/f7H52hrT5UoY4ZqdkxSGh2ZftYrH8fiDwCLcBGAs/s300/Whatsapp.png) no-repeat center center;
  background-size:50% auto;
  box-shadow:0 20px 25px rgba(0,0,0,.05);
  transition:.2s;
}
.whatsapp-btn:active {
  bottom:35px;
}
#whatsapp {
  position:fixed;
  z-index:+100;
  bottom:0px;
  right:0px;
  display:block;
  background:#ffff;
  box-shadow:0 20px 25px rgba(0, 0, 0, 0);
  max-width:-webkit-fill-available;
  font-family:Helvetica, sans-serif;
  font-size:90%;
  border-radius:4px;
  visibility:hidden;
  opacity:0;
  transition:.3s;
}
#whatsapp.toggle {
  font-size: 100%;
  padding: 1px;
  position: relative;
  visibility: initial;
  opacity: unset;
}
@media(max-width:320px) {
  .whatsapp-btn {
    bottom:10px;
    right:10px;
  }
  #whatsapp.toggle {
    bottom:80px;
    right:10px;
    visibility:visible;
    opacity:1;
  }
}
#whatsapp label,
#whatsapp a {
  display:block;
  margin:10px;
  text-decoration:none;
}
#whatsapp input,
#whatsapp textarea {
  display:block;
  border:1px solid #c4c9c3;
  box-shadow:inset 0 2px 5px #ffffff00;
  width:-webkit-fill-available;
  padding:10px;
  border-radius:5px;
  margin-left: 10px;
  margin-right: 25px;
}
#whatsapp input.tanggal {
  text-transform:capitalize;
}
#whatsapp input:focus,
#whatsapp textarea:focus {
  border:1px solid #ddd;
}
#whatsapp textarea {
  min-height:80px;
  resize: none;
}
#whatsapp a {
  cursor:pointer;
  display:block;
  padding:10px;
  font-weight:bold;
  text-align:center;
  background:#337ab7;
  color:white;
  border-radius:5px;
  margin-right: 500px;
  margin-left: 500px;
}
#whatsapp a:hover {
  background:#337ab7;
}
</style>

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
      <li class="active">
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
      <!-- <li>
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
    <li><a href="../../index_admin.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
    <li><a href="tambah_laporan.php">Form</a></li>
    <li class="active">Laporan</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <!-- FORM -->

  <?php
   $sql_petugas = mysqli_query($koneksi, "SELECT no_hp FROM petugas WHERE id_petugas = '3'");
   $hasil_petugas = mysqli_fetch_array($sql_petugas);
  ?>

  <div id="whatsapp" class="toggle">
    <h3><center>Kirim Whatsapp</center></h3><hr><br>
    <input class="tujuan" type="hidden" value="<?php echo $hasil_petugas['no_hp'];?>" /> <!-- No. WhatsApp -->

    <label>perihal : </label>
    <input class="perihal" type="perihal" value="<?php echo $hasil2['perihal']; ?>">
    
    <label>tanggal : </label>
    <input class="tanggal" type="date" value="<?php echo $hasil2['tanggal']; ?>">
    
    <label>Link : </label>
    <input class="link" type="link" value="<?php echo $base_url?>laporan/<?php echo $hasil2['lampiran'];?>">

    
    <!-- <label> Perihal
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input class="perihal" type="perihal" value="<?php echo $hasil2['perihal']; ?>" required>
    </div>
    

    <div class="form-group row">
      <label for="tanggal" class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input class="tanggal" type="date" value="<?php echo $hasil2['tanggal']; ?>" required>
      </div>
    </div>

    <div class="form-group row">
      <label for="tanggal" class="control-label col-md-3 col-sm-3 col-xs-12">Masukkan Link
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input class="link" type="link" required>
      </div>
    </div>

 -->

  <!--   <label>perihal :
      <input class="perihal" type="perihal" value="<?php echo $hasil2['perihal']; ?>" />
    </label>
    <label>tanggal :
      <input class="tanggal" type="date" value="<?php echo $hasil2['tanggal']; ?>" />
    </label> -->
    <!-- <label>Masukkan Link :
      <input class="link" type="text" />
    </label> -->
    <a class="submit" target="_blank">KIRIM</a>

  </div>

  <script>
   $('.whatsapp-btn').click(function(){
    $('#whatsapp').toggleClass('toggle');
  });
// Onclick Whatsapp Sent!
$('#whatsapp .submit').click(WhatsApp);

$("#whatsapp input, #whatsapp textarea").keypress(function() {
  if (event.which == 13) WhatsApp();
});
var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
function WhatsApp() {
  // var ph = '';
  if ($('#whatsapp .perihal').val() == '') { // Cek tanggal
    ph = $('#whatsapp .perihal').attr('placeholder');
    alert('Perihal mohon Di Isi ');
    $('#whatsapp .perihal').focus();
    return false;
  } else if ($('#whatsapp .tanggal').val() == '') { // Cek perihal
    ph = $('#whatsapp .tanggal').attr('placeholder');
    alert('Tanggal mohon Di Isi ');
    $('#whatsapp .tanggal').focus();
    return false;
  } else if ($('#whatsapp .link').val() == '') { // Cek link
    ph = $('#whatsapp .link').attr('placeholder');
    alert('Link mohon Di Isi ');
    $('#whatsapp .link').focus();
    return false;
  }else {
    if (!confirm("Klik oke untuk kirim via WhatsApp")) {
      window.open("https://web.whatsapp.com/");
    } else {
      // Check Device (Mobile/Desktop)
      var url_wa = 'https://web.whatsapp.com/send';
      if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        url_wa = 'whatsapp://send/';
      }
      // Get Value
      var tujuan = $('#whatsapp .tujuan').val(),
      via_url = location.href,
      perihal = $('#whatsapp .perihal').val(),
      tanggal = $('#whatsapp .tanggal').val();
      link = $('#whatsapp .link').val();
      $(this).attr('href', url_wa + '?phone=62 ' + tujuan + '&text=Assalamualaikum wr.wb. ini adalah *' + perihal + ' %0A%0Atanggal:%20' + tanggal + ' %0A%0Alink:%20' + link);
      var w = 960,
      h = 540,
      left = Number((screen.width / 2) - (w / 2)),
      tops = Number((screen.height / 2) - (h / 2)),
      popupWindow = window.open(this.href, '', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=1, copyhistory=no, width=' + w + ', height=' + h + ', top=' + tops + ', left=' + left);
      popupWindow.focus();
      return false;
    }
  }
}
</script>

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

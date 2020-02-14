function gagalTambah() {
        swal({
            title: "OOPS",
            text: "Data gagal Ditambahkan",
            icon: "warning",
            dangerMode: true,
            buttons: [false, "OK"],
          }).then(function() {
            window.location.href="../admin/forms/tambah_penduduk.php";
          });
    }
    function tambah() {
        swal({
            title: "BERHASIL",
            text: "Data Telah Ditambahkan",
            icon: "success",
            buttons: [false, "OK"],
          }).then(function() {
            window.location.href="../admin/tables/data_penduduk.php";
          });
    }
    function edit(){
        swal({
            title: "BERHASIL",
            text: "Data Berhasil Diedit",
            icon: "warning",
            dangerMode: true,
            buttons: [false, "OK"],
        }).then(function() {
            window.location.href="../admin/tables/data_penduduk.php";
        })
    }
    function hapus(){
        swal({
            title: "BERHASIL",
            text: "Data Berhasil Dihapus",
            dangerMode: true,
            buttons: [false, "OK"],
        }).then(function(){
            window.location.href= "../admin/tables/data_penduduk.php";
        })
    }
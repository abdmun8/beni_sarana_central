<?php
// buka koneksi dengan MySQL
  require_once '../fungsi.php';

  //mengecek apakah di url ada GET id
  if (isset($_GET["idcoat"])) {

    // menyimpan variabel id dari url ke dalam variabel $id
    $idcoat = $_GET["idcoat"];

    //jalankan query DELETE untuk menghapus data
    $query = "DELETE FROM coat WHERE idcoat='$idcoat' ";
    $hasil_query = mysqli_query($con, $query);

    //periksa query, apakah ada kesalahan
    if(!$hasil_query) {
      die ("Gagal menghapus data: ".mysqli_errno($con).
           " - ".mysqli_error($con));
    }
  }
  // melakukan redirect ke halaman coat.php
  echo "<script>swal('coat telah dihapus','_self')</script>";
  echo "<script>window.open('coat.php','_self')</script>";
?>
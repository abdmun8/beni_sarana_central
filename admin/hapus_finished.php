<?php
// buka koneksi dengan MySQL
  require_once '../fungsi.php';

  //mengecek apakah di url ada GET id
  if (isset($_GET["idfinished"])) {

    // menyimpan variabel id dari url ke dalam variabel $id
    $idfinished = $_GET["idfinished"];

    //jalankan query DELETE untuk menghapus data
    $query = "DELETE FROM finished WHERE idfinished='$idfinished' ";
    $hasil_query = mysqli_query($con, $query);

    //periksa query, apakah ada kesalahan
    if(!$hasil_query) {
      die ("Gagal menghapus data: ".mysqli_errno($con).
           " - ".mysqli_error($con));
    }
  }
  // melakukan redirect ke halaman finished.php
  echo "<script>alert('finished telah dihapus','_self')</script>";
  echo "<script>window.open('finished.php','_self')</script>";
?>
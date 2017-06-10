<?php
// buka koneksi dengan MySQL
  require_once '../fungsi.php';

  //mengecek apakah di url ada GET id
  if (isset($_GET["idcolor"])) {

    // menyimpan variabel id dari url ke dalam variabel $id
    $idcolor = $_GET["idcolor"];

    //jalankan query DELETE untuk menghapus data
    $query = "DELETE FROM color WHERE idcolor='$idcolor' ";
    $hasil_query = mysqli_query($con, $query);

    //periksa query, apakah ada kesalahan
    if(!$hasil_query) {
      die ("Gagal menghapus data: ".mysqli_errno($con).
           " - ".mysqli_error($con));
    }
  }
  // melakukan redirect ke halaman color.php
  echo "<script>alert('color telah dihapus','_self')</script>";
  echo "<script>window.open('color.php','_self')</script>";
?>
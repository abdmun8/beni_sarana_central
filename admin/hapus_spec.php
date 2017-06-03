<?php
// buka koneksi dengan MySQL
  require_once '../fungsi.php';

  //mengecek apakah di url ada GET id
  if (isset($_GET["idspec"])) {

    // menyimpan variabel id dari url ke dalam variabel $id
    $idspec = $_GET["idspec"];

    //jalankan query DELETE untuk menghapus data
    $query = "DELETE FROM spec WHERE idspec='$idspec' ";
    $hasil_query = mysqli_query($con, $query);

    //periksa query, apakah ada kesalahan
    if(!$hasil_query) {
      die ("Gagal menghapus data: ".mysqli_errno($con).
           " - ".mysqli_error($con));
    }
  }
  // melakukan redirect ke halaman spec.php
  echo "<script>alert('spec telah dihapus','_self')</script>";
  echo "<script>window.open('spec.php','_self')</script>";
?>
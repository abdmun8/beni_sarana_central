<?php
// buka koneksi dengan MySQL
  require_once '../fungsi.php';

  //mengecek apakah di url ada GET id
  if (isset($_GET["idbahan"])) {

    // menyimpan variabel id dari url ke dalam variabel $id
    $idbahan = $_GET["idbahan"];

    //jalankan query DELETE untuk menghapus data
    $query = "DELETE FROM bahan WHERE idbahan='$idbahan' ";
    $hasil_query = mysqli_query($con, $query);

    //periksa query, apakah ada kesalahan
    if(!$hasil_query) {
      die ("Gagal menghapus data: ".mysqli_errno($con).
           " - ".mysqli_error($con));
    }
  }
  // melakukan redirect ke halaman bahan.php
  echo "<script>alert('bahan telah dihapus','_self')</script>";
  echo "<script>window.open('stock_coil.php','_self')</script>";
?>
<?php
// buka koneksi dengan MySQL
  require_once '../fungsi.php';

  //mengecek apakah di url ada GET id
  if (isset($_GET["idbahanbaku"])) {

    // menyimpan variabel id dari url ke dalam variabel $id
    $idbahanbaku = $_GET["idbahanbaku"];

    //jalankan query DELETE untuk menghapus data
    $query = "DELETE FROM bahanbaku WHERE idbahanbaku='$idbahanbaku' ";
    $hasil_query = mysqli_query($con, $query);

    //periksa query, apakah ada kesalahan
    if(!$hasil_query) {
      die ("Gagal menghapus data: ".mysqli_errno($con).
           " - ".mysqli_error($con));
    }
  }
  // melakukan redirect ke halaman bahanbaku.php
  echo "<script>alert('bahanbaku telah dihapus','_self')</script>";
  echo "<script>window.open('stock_bahan_baku.php','_self')</script>";
?>
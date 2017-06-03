<?php
// buka koneksi dengan MySQL
  require_once '../fungsi.php';

  //mengecek apakah di url ada GET id
  if (isset($_GET["idsumber"])) {

    // menyimpan variabel id dari url ke dalam variabel $id
    $idsumber = $_GET["idsumber"];

    //jalankan query DELETE untuk menghapus data
    $query = "DELETE FROM sumber WHERE idsumber='$idsumber' ";
    $hasil_query = mysqli_query($con, $query);

    //periksa query, apakah ada kesalahan
    if(!$hasil_query) {
      die ("Gagal menghapus data: ".mysqli_errno($con).
           " - ".mysqli_error($con));
    }
  }
  // melakukan redirect ke halaman sumber.php
  echo "<script>alert('sumber telah dihapus','_self')</script>";
  echo "<script>window.open('sumber.php','_self')</script>";
?>
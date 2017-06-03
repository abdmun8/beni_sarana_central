<?php
// buka koneksi dengan MySQL
  require_once '../fungsi.php';

  //mengecek apakah di url ada GET id
  if (isset($_GET["idorder"])) {

    // menyimpan variabel id dari url ke dalam variabel $id
    $idorder = $_GET["idorder"];

    //jalankan query DELETE untuk menghapus data
    $query = "DELETE FROM orders WHERE idorder='$idorder' ";
    $hasil_query = mysqli_query($con, $query);

    //periksa query, apakah ada kesalahan
    if(!$hasil_query) {
      die ("Gagal menghapus data: ".mysqli_errno($con).
           " - ".mysqli_error($con));
    }
  }
  // melakukan redirect ke halaman order.php
  echo "<script>alert('order telah dihapus','_self')</script>";
  echo "<script>window.open('order.php','_self')</script>";
?>
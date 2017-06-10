<?php
// buka koneksi dengan MySQL
  require_once '../fungsi.php';

  //mengecek apakah di url ada GET id
  if (isset($_GET["idcustomer"])) {

    // menyimpan variabel id dari url ke dalam variabel $id
    $idcustomer = $_GET["idcustomer"];

    //jalankan query DELETE untuk menghapus data
    $query = "DELETE FROM customer WHERE idcustomer='$idcustomer' ";
    $hasil_query = mysqli_query($con, $query);

    //periksa query, apakah ada kesalahan
    if(!$hasil_query) {
      die ("Gagal menghapus data: ".mysqli_errno($con).
           " - ".mysqli_error($con));
    }
  }
  // melakukan redirect ke halaman customer.php
  echo "<script>alert('customer telah dihapus','_self')</script>";
  echo "<script>window.open('customer.php','_self')</script>";
?>
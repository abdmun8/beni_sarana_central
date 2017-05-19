<?php
session_start(); // Memulai Session
require_once '../fungsi.php';
global $con;
$error=''; // Variabel untuk menyimpan pesan error
if (isset($_POST['login'])) {
  if (empty($_POST['username']) || empty($_POST['pass'])){
      $error = "Username or Password is invalid";
  }
  else
  {
    // Variabel username dan password
    $username=$_POST['username'];
    $password=md5($_POST['pass']);    
    // SQL query untuk memeriksa apakah karyawan terdapat di database?
    $query = ("SELECT * FROM admin WHERE username='$username' AND password='$password'");
    $cek = mysqli_query($con,$query);
    $cek_user = mysqli_num_rows($cek);
      if($cek_user== 1) {
        $_SESSION['username']=$username; // Membuat Sesi/session
        header("location: index.php"); // Mengarahkan ke halaman profil
        } else {
        $error = "Username atau Password belum terdaftar";
        }
  }
}

?>
<?php
session_start(); // Memulai Session
require_once '../fungsi.php';
global $con;
if (isset($_POST['login'])) {
  if (empty($_POST['username']) || empty($_POST['pass'])){
      echo "<script>alert('Silahkan isi kolom username dan password'),('_self')</script>";
      echo "<script>window.open('login.php'),('_self')</script>";
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
        echo "<script>alert('Username atau Password Salah','_self')</script>";
        echo "<script>window.open('index.php','_self')</script>";
        }
  }
}

?>
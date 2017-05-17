<?php



session_start(); // Memulai Session
$error=''; // Variabel untuk menyimpan pesan error
if (isset($_POST['login'])) {
  if (empty($_POST['username']) || empty($_POST['pass'])) {
      $error = "Username or Password is invalid";
  }
  else
  {
    // Variabel username dan password
    $username=$_POST['username'];
    $password=$_POST['pass'];
    // Membangun koneksi ke database
    $connection = mysql_connect("sql208.ihostfull.com", "uoolo_20056143", "shikamaruboy");
    // Mencegah MySQL injection 
    $username = stripslashes($username);
    $password = stripslashes($password);
    $username = mysql_real_escape_string($username);
    $password = mysql_real_escape_string($password);
    // Seleksi Database
    $db = mysql_select_db("uoolo_20056143_kalender", $connection);
    // SQL query untuk memeriksa apakah karyawan terdapat di database?
    $query = mysql_query("select * from admin where pass='$password' AND username='$username'", $connection);
    $rows = mysql_num_rows($query);
      if ($rows == 1) {
        $_SESSION['username']=$username; // Membuat Sesi/session
        header("location: semua.php"); // Mengarahkan ke halaman profil
        } else {
        $error = "Username atau Password belum terdaftar";
        }
        mysql_close($connection); // Menutup koneksi
  }
}
?>
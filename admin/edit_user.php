<?php
	session_start();
	require_once '../fungsi.php';
	require_once 'template/header.php';
	if (!isset($_SESSION['username'])) {
		header("Location:login.php");
		}
	$id = $_GET['id'];
	global $id;
	global $con;
	$query  = ("SELECT * FROM admin where id='$id'");
	$tampil = mysqli_query($con,$query);
	$data   = mysqli_fetch_array($tampil);

?>
<!DOCTYPE html>
<html>
<head>
	<title>PT SCB - Edit User</title>
</head>
<body>
	<div class="container" style="margin-bottom: 100px">
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
			<h1 style="padding-top: 30px; text-align: center;">Edit User</h1>
			<a href="user.php" class="btn btn-default">Lihat Data</a><hr>
			<form action="" method="post">
					<input type="hidden" name="id" value="<?php echo $id;?>">
					<div class="form-group">
					    <label>Username</label>
					    <input type="text" class="form-control" name="username" value="<?php echo $data['username'];?>" required autofocus>
					</div>
					<div class="form-group">
					    <label>Nama</label>
					    <input type="text" class="form-control" name="nama" value="<?php echo $data['nama'];?>" required autofocus>
					</div>
					<div class="form-group">
					    <label>Bagian</label>
					    <input type="text" class="form-control" name="Bagian" value="<?php echo $data['Bagian'];?>" required autofocus>
					</div>
					<div class="form-group">
					    <label>Alamat</label>
					    <input type="text" class="form-control" name="alamat" value="<?php echo $data['alamat'];?>" required autofocus>
					</div>
					<div class="form-group">
					    <label>Password Lama</label>
					    <input type="text" class="form-control" name="password" required>
					</div>
					<div class="form-group">
					    <label>Password Baru</label>
					    <input type="text" class="form-control" name="newpassword" required>
					</div>
						<input type="submit" name="simpan" value="Simpan" class="btn btn-default">
					</div>
			</form >

			<?php		
				if (isset($_POST["simpan"])) {
					$password = md5($_POST['password']);
					if($password != $data['password']){
						echo "<script>alert('Password Lama Tidak Sesuai')</script>";
						die;
					}
					$nama = $_POST['nama'];
					$username = $_POST['username'];
					$Bagian = $_POST['Bagian'];
					$alamat = $_POST['alamat'];					
					$newpassword = $_POST['newpassword'];

					$query    = ("UPDATE admin SET nama = '$nama',Bagian='$Bagian',alamat='$alamat',password='".md5($newpassword)."' WHERE id = '$id'");
					$simpan   = mysqli_query($con,$query);
					if ($simpan) {
						echo "<script>alert('User Berhasil Diubah','_self')</script>";					
						echo "<script>window.open('user.php','_self')</script>";					
					}else{
						echo "<script>alert('Gagal Menyimpan')</script>";
					}
				}
				?>
		</div>
	</div>
	
</div>
</body>
</html>
<?php
	require_once 'template/footer.php';
?>
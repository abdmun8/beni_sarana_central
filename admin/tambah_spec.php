<?php
	session_start();
	require_once '../fungsi.php';
	require_once 'template/header.php';
	if (!isset($_SESSION['username'])) {
		header("Location:login.php");
		}
?>
<!DOCTYPE html>
<html>
<head>
	<title>PT SCB - Tambah spec</title>
</head>
<body>
	<div class="container">
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
		<h1 style="padding-top: 30px; text-align: center;">Tambah Spec</h1>
			<a href="spec.php" class="btn btn-default">Lihat Data Spec</a>
			<hr>
				<form action="tambah_spec.php" action="" method="post">
					<div class="form-group">
					    <label>Nama Spec</label>
					    <input type="text" class="form-control" name="namaspec" required autofocus>
					</div>
					<div class="form-group">
						<input type="submit" name="simpan" value="Simpan" class="btn btn-default">
						<input type="reset" value="Reset" class="btn btn-default">
					</div>
				</form>
				<?php
				if (isset($_POST["simpan"])) {
					$nama   = $_POST['namaspec'];
					$query  = ("INSERT INTO spec (namaspec) VALUES ('$nama')");
					$simpan = mysqli_query($con,$query);
					if ($simpan) {
						echo "Data Berhasil disimpan";
					}else{
						echo "Gagal!";
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
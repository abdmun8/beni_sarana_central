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
	<title>PT SCB - Tambah Order</title>
</head>
<body>
	<div class="container">
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
		<h1 style="padding-top: 30px; text-align: center;">Tambah Order</h1>
			<a href="order.php" class="btn btn-default">Lihat Data Order</a>
			<hr>
				<form action="tambah_order.php" action="" method="post">
					<div class="form-group">
					    <label>Nama Order</label>
					    <input type="text" class="form-control" name="namaorder" required autofocus>
					</div>
					<div class="form-group">
						<input type="submit" name="simpan" value="Simpan" class="btn btn-default">
						<input type="reset" value="Reset" class="btn btn-default">
					</div>
				</form>
				<?php
				if (isset($_POST["simpan"])) {
					$nama   = $_POST['namaorder'];
					$query  = ("INSERT INTO orders (namaorder) VALUES ('$nama')");
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
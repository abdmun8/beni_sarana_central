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
	<title>PT SCB - Tambah Stock Bahan Baku</title>
</head>
<body>
	<div class="container">
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
		<h1 style="padding-top: 30px; text-align: center;">Tambah Bahan Baku</h1>
			<a href="stock_bahan_baku.php" class="btn btn-default">Lihat Data Bahan Baku</a>
			<hr>
				<form action="tambah_stock_bahan_baku.php" action="" method="post">
					<div class="form-group">
					    <label>Spesifikasi</label>
					    <input type="text" class="form-control" name="spesifikasi" required autofocus>
					</div>
					<div class="form-group">
					    <label>Stock</label>
					    <input type="text" class="form-control" name="stock" required autofocus>
					</div>
					<div class="form-group">
					    <label>Stosk Lapangan</label>
					    <input type="text" class="form-control" name="stocklapangan" required autofocus>
					</div>
					<div class="form-group">
					    <label>Stosk Gudang</label>
					    <input type="text" class="form-control" name="stockgudang" required autofocus>
					</div>
					<div class="form-group">
					    <label>Keterangan</label>
					    <input type="text" class="form-control" name="keterangan" required autofocus>
					</div>
					<div class="form-group">
						<input type="submit" name="simpan" value="Simpan" class="btn btn-default">
						<input type="reset" value="Reset" class="btn btn-default">
					</div>
				</form>
				<?php
				if (isset($_POST["simpan"])) {
					$spesifikasi   = $_POST['spesifikasi'];
					$stock         = $_POST['stock'];
					$stocklapangan = $_POST['stocklapangan'];
					$stockgudang   = $_POST['stockgudang'];
					$keterangan    = $_POST['keterangan'];
					$query  = ("INSERT INTO bahanbaku (spesifikasi,stock,stocklapangan,stockgudang,keterangan) VALUES ('$spesifikasi','$stock','$stocklapangan','$stockgudang','$keterangan')");
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
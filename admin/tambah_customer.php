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
	<title>PT SCB - Tambah customer</title>
</head>
<body>
	<div class="container">
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
		<h1 style="padding-top: 30px; text-align: center;">Tambah customer</h1>
			<a href="customer.php" class="btn btn-default">Lihat Data customer</a>
			<hr>
				<form action="tambah_customer.php" action="" method="post">
					<div class="form-group">
					    <label>Nama customer</label>
					    <input type="text" class="form-control" name="namacustomer" required autofocus>
					</div>
					<div class="form-group">
					    <label>Alamat customer</label>
					    <textarea type="text" class="form-control" name="alamatcustomer"  ></textarea> 
					</div>
					<div class="form-group">
					    <label>Telepon customer</label>
					    <input type="text" class="form-control" name="telpcustomer" required autofocus>
					</div>
					<div class="form-group">
						<input type="submit" name="simpan" value="Simpan" class="btn btn-default">
						<input type="reset" value="Reset" class="btn btn-default">
					</div>
				</form>
				<?php
				if (isset($_POST["simpan"])) {
					$nama   = $_POST['namacustomer'];
					$alamatcustomer   = $_POST['alamatcustomer'];
					$telpcustomer   = $_POST['telpcustomer'];

					$query  = "INSERT INTO customer (namacustomer, alamatcustomer, telpcustomer) VALUES ('$nama','$alamatcustomer','$telpcustomer')";
					$simpan = mysqli_query($con,$query);
					//cek
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
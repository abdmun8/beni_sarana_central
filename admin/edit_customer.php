<?php
	session_start();
	require_once '../fungsi.php';
	require_once 'template/header.php';
	if (!isset($_SESSION['username'])) {
		header("Location:login.php");
		}
	$id = $_GET['idcustomer'];
	global $id;
	global $con;
	$query  = ("SELECT * FROM customer where idcustomer='$id'");
	$tampil = mysqli_query($con,$query);
	$data   = mysqli_fetch_array($tampil);
?>
<!DOCTYPE html>
<html>
<head>
	<title>PT SCB - Editcustomer</title>
</head>
<body>
	<div class="container">
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
			<h1 style="padding-top: 30px; text-align: center;">Edit customer</h1>
			<a href="customer.php" class="btn btn-default">Lihat Data</a><hr>
			<form action="edit_customer.php" action="" method="post">
					<input type="hidden" name="id" value="<?php echo $id;?>">
					<div class="form-group">
					    <label>Nama customer</label>
					    <input type="text" class="form-control" name="namacustomer" value="<?php echo $data['namacustomer'];?>" required autofocus>
					</div>
					<div class="form-group">
					    <label>Alamat customer</label>
					    <textarea type="text" class="form-control" name="alamatcustomer"  ></textarea> 
					</div>
					<div class="form-group">
					    <label>Telepon customer</label>
					    <input type="text" class="form-control" name="telpcustomer" required autofocus>
					</div>
						<input type="submit" name="simpan" value="Simpan" class="btn btn-default">
						<input type="reset" value="Reset" class="btn btn-default">
					</div>
			</form>
			<?php			
				if (isset($_POST["simpan"])) {				
					$namacustomer           = $_POST['namacustomer'];
					$alamatcustomer         = $_POST['alamatcustomer'];
					$telpcustomer           = $_POST['telpcustomer'];
				
					$query  = ("UPDATE customer SET namacustomer ='$namacustomer',alamatcustomer ='$alamatcustomer',telpcustomer ='$telpcustomer', where idcustomer='$id'");
					$simpan = mysqli_query($con,$query);
					if ($simpan) {

						echo "<script>window.open('customer.php','_self')</script>";
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
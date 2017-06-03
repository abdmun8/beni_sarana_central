<?php
	session_start();
	require_once '../fungsi.php';
	require_once 'template/header.php';
	if (!isset($_SESSION['username'])) {
		header("Location:login.php");
		}
	$id = $_GET['idorder'];
	global $id;
	global $con;
	$query  = ("SELECT * FROM orders where idorder='$id'");
	$tampil = mysqli_query($con,$query);
	$data   = mysqli_fetch_array($tampil);
?>
<!DOCTYPE html>
<html>
<head>
	<title>PT SCB - Edit Order</title>
</head>
<body>
	<div class="container">
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
			<h1 style="padding-top: 30px; text-align: center;">Edit Order</h1>
			<a href="order.php" class="btn btn-default">Lihat Data</a><hr>
			<form action="edit_order.php" action="" method="post">
					<input type="hidden" name="id" value="<?php echo $id;?>">
					<div class="form-group">
					    <label>Nama order</label>
					    <input type="text" class="form-control" name="namaorder" value="<?php echo $data['namaorder'];?>" required autofocus>
					</div>
						<input type="submit" name="simpan" value="Simpan" class="btn btn-default">
					</div>
			</form>
			<?php			
				if (isset($_POST["simpan"])) {
					$namaorder = $_POST['namaorder'];
					$idorder   = $_POST['id'];
					$query    = ("UPDATE orders SET namaorder = '$namaorder' WHERE idorder = '$idorder'");
					$simpan   = mysqli_query($con,$query);
					if ($simpan) {
						header('Location: order.php');						
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
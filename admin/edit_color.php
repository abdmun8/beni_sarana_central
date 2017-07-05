<?php
	session_start();
	require_once '../fungsi.php';
	require_once 'template/header.php';
	if (!isset($_SESSION['username'])) {
		header("Location:login.php");
		}
	$id = $_GET['idcolor'];
	global $id;
	global $con;
	$query  = ("SELECT * FROM color where idcolor='$id'");
	$tampil = mysqli_query($con,$query);
	$data   = mysqli_fetch_array($tampil);
?>
<!DOCTYPE html>
<html>
<head>
	<title>PT SCB - Edit color</title>
</head>
<body>
	<div class="container">
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
			<h1 style="padding-top: 30px; text-align: center;">Edit color</h1>
			<a href="color.php" class="btn btn-default">Lihat Data</a><hr>
			<form action="edit_color.php" action="" method="post">
					<input type="hidden" name="id" value="<?php echo $id;?>">
					<div class="form-group">
					    <label>Nama color</label>
					    <input type="text" class="form-control" name="namacolor" value="<?php echo $data['namacolor'];?>" required autofocus>
					</div>
						<input type="submit" name="simpan" value="Simpan" class="btn btn-default">
					</div>
			</form>
			<?php			
				if (isset($_POST["simpan"])) {
					$namacolor = $_POST['namacolor'];
					$idcolor   = $_POST['id'];
					$query    = ("UPDATE color SET namacolor = '$namacolor' WHERE idcolor = '$idcolor'");
					$simpan   = mysqli_query($con,$query);
					if ($simpan) {
						echo "<script>window.open('_self','color.php')</script>";		
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
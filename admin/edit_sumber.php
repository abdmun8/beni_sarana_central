<?php
	session_start();
	require_once '../fungsi.php';
	require_once 'template/header.php';
	if (!isset($_SESSION['username'])) {
		header("Location:login.php");
		}
	$id = $_GET['idsumber'];
	global $id;
	global $con;
	$query  = ("SELECT * FROM sumber where idsumber='$id'");
	$tampil = mysqli_query($con,$query);
	$data   = mysqli_fetch_array($tampil);
?>
<!DOCTYPE html>
<html>
<head>
	<title>PT SCB - Edit Sumber</title>
</head>
<body>
	<div class="container">
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
			<h1 style="padding-top: 30px; text-align: center;">Edit Sumber</h1>
			<a href="sumber.php" class="btn btn-default">Lihat Data</a><hr>
			<form action="edit_sumber.php" action="" method="post">
					<input type="hidden" name="id" value="<?php echo $id;?>">
					<div class="form-group">
					    <label>Nama Sumber</label>
					    <input type="text" class="form-control" name="namasumber" value="<?php echo $data['namasumber'];?>" required autofocus>
					</div>
						<input type="submit" name="simpan" value="Simpan" class="btn btn-default">
					</div>
			</form>
			<?php			
				if (isset($_POST["simpan"])) {
					$namasumber = $_POST['namasumber'];
					$idsumber   = $_POST['id'];
					$query    = ("UPDATE sumber SET namasumber = '$namasumber' WHERE idsumber = '$idsumber'");
					$simpan   = mysqli_query($con,$query);
					if ($simpan) {
						header('Location: sumber.php');						
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
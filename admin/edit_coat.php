<?php
	session_start();
	require_once '../fungsi.php';
	require_once 'template/header.php';
	if (!isset($_SESSION['username'])) {
		header("Location:login.php");
		}
	$id = $_GET['idcoat'];
	global $id;
	global $con;
	$query  = ("SELECT * FROM coat where idcoat='$id'");
	$tampil = mysqli_query($con,$query);
	$data   = mysqli_fetch_array($tampil);
?>
<!DOCTYPE html>
<html>
<head>
	<title>PT SCB - Edit Coat</title>
</head>
<body>
	<div class="container">
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
			<h1 style="padding-top: 30px; text-align: center;">Edit Coat</h1>
			<a href="coat.php" class="btn btn-default">Lihat Data</a><hr>
			<form action="edit_coat.php" action="" method="post">
					<input type="hidden" name="id" value="<?php echo $id;?>">
					<div class="form-group">
					    <label>Nama coat</label>
					    <input type="text" class="form-control" name="namacoat" value="<?php echo $data['namacoat'];?>" required autofocus>
					</div>
						<input type="submit" name="simpan" value="Simpan" class="btn btn-default">
					</div>
			</form>
			<?php			
				if (isset($_POST["simpan"])) {
					$namacoat = $_POST['namacoat'];
					$idcoat   = $_POST['id'];
					$query    = ("UPDATE coat SET namacoat = '$namacoat' WHERE idcoat = '$idcoat'");
					$simpan   = mysqli_query($con,$query);
					if ($simpan) {
						header('Location: coat.php');						
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
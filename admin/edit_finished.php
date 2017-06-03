<?php
	session_start();
	require_once '../fungsi.php';
	require_once 'template/header.php';
	if (!isset($_SESSION['username'])) {
		header("Location:login.php");
		}
	$id = $_GET['idfinished'];
	global $id;
	global $con;
	$query  = ("SELECT * FROM finished where idfinished='$id'");
	$tampil = mysqli_query($con,$query);
	$data   = mysqli_fetch_array($tampil);
?>
<!DOCTYPE html>
<html>
<head>
	<title>PT SCB - Edit Finished</title>
<body>
	<div class="container">
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
			<h1 style="padding-top: 30px; text-align: center;">Edit Finished</h1>
			<a href="finished.php" class="btn btn-default">Lihat Data</a><hr>
			<form action="edit_finished.php" action="" method="post">
					<input type="hidden" name="id" value="<?php echo $id;?>">
					<div class="form-group">
					    <label>Nama Finished</label>
					    <input type="text" class="form-control" name="namafinished" value="<?php echo $data['namafinished'];?>" required autofocus>
					</div>
						<input type="submit" name="simpan" value="Simpan" class="btn btn-default">
					</div>
			</form>
			<?php			
				if (isset($_POST["simpan"])) {
					$namafinished = $_POST['namafinished'];
					$idfinished   = $_POST['id'];
					$query    = ("UPDATE finished SET namafinished = '$namafinished' WHERE idfinished = '$idfinished'");
					$simpan   = mysqli_query($con,$query);
					if ($simpan) {
						header('Location: finished.php');						
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
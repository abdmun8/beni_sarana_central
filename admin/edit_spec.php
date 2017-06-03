<?php
	session_start();
	require_once '../fungsi.php';
	require_once 'template/header.php';
	if (!isset($_SESSION['username'])) {
		header("Location:login.php");
		}
	$id = $_GET['idspec'];
	global $id;
	global $con;
	$query  = ("SELECT * FROM spec where idspec='$id'");
	$tampil = mysqli_query($con,$query);
	$data   = mysqli_fetch_array($tampil);
?>
<!DOCTYPE html>
<html>
<head>
	<title>PT SCB - Edit Spec</title>
</head>
<body>
	<div class="container">
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
			<h1 style="padding-top: 30px; text-align: center;">Edit Spec</h1>
			<a href="spec.php" class="btn btn-default">Lihat Data</a><hr>
			<form action="edit_spec.php" action="" method="post">
					<input type="hidden" name="id" value="<?php echo $id;?>">
					<div class="form-group">
					    <label>Nama Spec</label>
					    <input type="text" class="form-control" name="namaspec" value="<?php echo $data['namaspec'];?>" required autofocus>
					</div>
						<input type="submit" name="simpan" value="Simpan" class="btn btn-default">
					</div>
			</form>
			<?php			
				if (isset($_POST["simpan"])) {
					$namaspec = $_POST['namaspec'];
					$idspec   = $_POST['id'];
					$query    = ("UPDATE spec SET namaspec = '$namaspec' WHERE idspec = '$idspec'");
					$simpan   = mysqli_query($con,$query);
					if ($simpan) {
						header('Location: spec.php');						
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
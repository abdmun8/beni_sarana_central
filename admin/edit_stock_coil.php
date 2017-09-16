<?php
	session_start();
	require_once '../fungsi.php';
	require_once 'template/header.php';
	if (!isset($_SESSION['username'])) {
		header("Location:login.php");
		}
	$id = $_GET['idbahan'];
	global $id;
	global $con;
	$query  = ("SELECT * FROM bahan where idbahan='$id'");
	$tampil = mysqli_query($con,$query);
	$data   = mysqli_fetch_array($tampil);
?>
?>
<!DOCTYPE html>
<html>
<head>
	<title>PT SCB - Tambah Coat</title>
</head>
<body>
	<div class="container">
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
		<h1 style="padding-top: 30px; text-align: center;">Tambah Stock Coil</h1>
			<a href="stock_coil.php" class="btn btn-default">Lihat Data Coil</a>
			<hr>
				<form action="" method="post">
					<div class="form-group">
					    <label>Tebal</label>
					    <input type="text" class="form-control" name="tebal" required autofocus value="<?php echo $data['tebal']?>">
					</div>
					<div class="form-group">
					    <label>Lebar</label>
					    <input type="text" class="form-control" name="lebar" required autofocus value="<?php echo $data['lebar'];?>">
					</div>
					<div class="form-group">
					    <label>Berat</label>
					    <input type="text" class="form-control" name="berat" required autofocus value="<?php echo $data['berat']?>">
					</div>
					<div class="form-group">
					    <label>Spec</label>
					    <select class="form-control" name="spec" >
					    <?php
					    $query  = ("SELECT * FROM spec ORDER BY namaspec ASC");
					    $tampil = mysqli_query($con,$query);
					    while ($data=mysqli_fetch_array($tampil)) {
					    	echo "<option value=$data[idspec]>$data[namaspec]</option>";
					    }
					    ?>	
					    </select>					    	
					</div>
					<div class="form-group">
					    <label>Spec</label> 
					    <select class="form-control" name="sumber" >
					    <?php
					    $query  = ("SELECT * FROM sumber ORDER BY namasumber ASC");
					    $tampil = mysqli_query($con,$query);
					    while ($data=mysqli_fetch_array($tampil)) {
					    	echo "<option value=$data[idsumber]>$data[namasumber]</option>";
					    }
					    ?>	
					    </select>					    	
					</div>
					<div class="form-group">
						<input type="submit" name="simpan" value="Simpan" class="btn btn-default">
						<input type="reset" value="Reset" class="btn btn-default">
					</div>
				</form>
				<?php
				if (isset($_POST['simpan'])) {
					$tebal    = $_POST['tebal'];
					$lebar    = $_POST['lebar'];
					$berat    = $_POST['berat'];
					$idspec   = $_POST['spec'];
					$idsumber = $_POST['sumber'];
					$query  = ("UPDATE bahan  SET tebal='$tebal', lebar='$lebar', berat='$berat', idspec='$idspec', idsumber='$idsumber' where idbahan='$id'");
					$simpan = mysqli_query($con,$query);
					if ($simpan) {
						echo "<script>window.open('stock_coil.php','_self')</script>";
					}else{
						echo "Gagal";
					}
				}
				?>
		</div>
	</div>
</div>
</body>
</html>
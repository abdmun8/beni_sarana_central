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
	<title>PT SCB - Spec</title>
</head>
<body>
	<div class="container">
	<h1 style="padding-top: 30px; text-align: center;">Spec</h1>
	<div class="col-md-offset-3 col-md-6">
	<a href="tambah_spec.php"><button class="btn btn-default">Tambah</button></a>
	<hr>
	<table class="table-bordered" style="width: 100%; text-align: center;">
		<tr style="font-weight: bold; text-align: center; height: 30px;" bgcolor="#01C388">
			<td>No</td>
			<td>Nama Spec</td>
			<td>Action</td>
		</tr>
		<?php
		global $con;
		$no     = 0;
		$query  = ("SELECT * FROM spec ORDER BY namaspec ASC");
		$tampil = mysqli_query($con,$query);
		while($data=mysqli_fetch_array($tampil)){
			$no++;				
		?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $data['namaspec'];?></td>
			<td><a href="hapus_spec.php?idspec=<?php echo $data['idspec']?>"><button class="btn btn-default"><span class="glyphicon glyphicon-erase"></span></button></a>
			<a href="edit_spec.php?idspec=<?php echo $data['idspec']?>"><button class="btn btn-default"><span class="glyphicon glyphicon-edit"></span></button></a>
			</td>			
		</tr>
		<?php } ?>
	</table>
</div>
</div>
</body>
</html>
<?php
	require_once 'template/footer.php';
?>
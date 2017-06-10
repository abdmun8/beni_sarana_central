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
	<title>PT SCB - color</title>
</head>
<body>
	<div class="container">
	<h1 style="padding-top: 30px; text-align: center;">Color</h1>
	<div class="col-md-offset-3 col-md-6">
	<a href="tambah_color.php"><button class="btn btn-default">Tambah</button></a>
	<hr>
	<table class="table-bordered" style="width: 100%; text-align: center;">
		<tr style="font-weight: bold; text-align: center; height: 30px;" bgcolor="#01C388">
			<td>No</td>
			<td>Nama color</td>
			<td>Action</td>
		</tr>
		<?php
		global $con;
		$no     = 0;
		$query  = ("SELECT * FROM color")or die(mysql_error());
		$tampil = mysqli_query($con,$query);
		while($data=mysqli_fetch_array($tampil)){
			$no++;				
		?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $data['namacolor'];?></td>
			<td><a href="hapus_color.php?idcolor=<?php echo $data['idcolor']?>"><button class="btn btn-default"><span class="glyphicon glyphicon-erase"></span></button></a>
			<a href="edit_color.php?idcolor=<?php echo $data['idcolor']?>"><button class="btn btn-default"><span class="glyphicon glyphicon-edit"></span></button></a>
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
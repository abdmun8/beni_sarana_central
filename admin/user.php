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
	<title>PT SCB - Admin</title>
	<!-- Load CSS dan javascript dari folder asset/css -->
</head>
<body>
	<div class="container">
	<h1 style="padding-top: 30px; text-align: center;">User</h1>
	<div class="col-md-offset-3 col-md-6">
	<hr>
	<table class="table-bordered" style="width: 100%; text-align: center;">
		<tr style="font-weight: bold; text-align: center; height: 30px;" bgcolor="#01C388">
			<td>No</td>
			<td>Username</td>
			<td>Nama</td>
			<td>Bagian</td>
			<td>alamat</td>
			<td>Action</td>
		</tr>
		<?php
		global $con;
		$no     = 0;
		$query  = ("SELECT * FROM admin");
		$tampil = mysqli_query($con,$query);
		while($data=mysqli_fetch_array($tampil)){
			$no++;				
		?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $data['username'];?></td>
			<td><?php echo $data['nama'];?></td>
			<td><?php echo $data['Bagian'];?></td>
			<td><?php echo $data['alamat'];?></td>
			<td>
				<a href="edit_user.php?id=<?php echo $data['id']?>"><button class="btn btn-default"><span class="glyphicon glyphicon-edit"></span></button></a>
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
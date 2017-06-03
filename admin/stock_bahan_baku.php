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
	<title>PT SCB - Home</title>
	<style type="text/css">
		p a{
		text-decoration: none;
		color: black;
		}
		p a:hover{
  		color: #01C388;
  		}
	</style>
</head>
<body>
<div class="container">
	<h1 style="padding-top: 30px; text-align: center;">Stock Bahan Baku</h1>
	<div class="col-md-12">
	<a href="tambah_stock_bahan_baku.php"><button class="btn btn-default">Tambah</button></a>
	<hr>
<div class="col-md-12">
	<table class="table-bordered" style="width: 100%">
		<tr style="font-weight: bold; text-align: center;" bgcolor="#01C388">
			<td rowspan="2">No</td>
			<td rowspan="2">Spesifikasi</td>
			<td rowspan="2">Stock</td>			
			<td>Stock</td>
			<td>Stock</td>
			<td rowspan="2">Keterangan</td>
			<td rowspan="2">Action</td>
		</tr>
		<tr style="font-weight: bold; text-align: center;"  bgcolor="#01C388">
			<td>Lapangan</td>
			<td>Gudang</td>
		</tr>
		<?php
		$no     = 0;
		$query  = ("SELECT * FROM bahanbaku ORDER BY spesifikasi ASC");
		$tampil = mysqli_query($con,$query);
		while($data=mysqli_fetch_array($tampil)){
			$no++;				
		echo "
		<tr style='text-align: center;'>
			<td>$no</td>
			<td>$data[spesifikasi]</td>
			<td>$data[stock]</td>
			<td>$data[stocklapangan]</td>
			<td>$data[stockgudang]</td>
			<td>$data[keterangan]</td>
			<td>
				<a href='hapus_stock_bahan_baku.php?idbahanbaku=$data[idbahanbaku]'><button class='btn btn-default'><span class='glyphicon glyphicon-erase'></span></button></a>
				<a href='edit_stock_bahan_baku.php?idbahanbaku=$data[idbahanbaku]'><button class='btn btn-default'><span class='glyphicon glyphicon-edit'></span></button></a>
			</td>
		</tr>
		";
		} ?>
		
	</table>
	
</div>
	
</div>
</body>
</html>
<?php
	require_once 'template/footer.php';
?>
<?php
	require_once 'template/header.php';
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
	<!-- Load CSS dan javascript dari folder asset/css -->
  	<link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
  	<script src="asset/js/jquery.min.js"></script>
    <script src="asset/js/bootstrap.min.js" ></script>
</head>
<body>
<div class="container">
	<h1 style="padding-top: 30px; text-align: center;">Stock Bahan Baku</h1>
<div class="col-md-12">
	<table class="table-bordered" style="width: 100%">
		<tr style="font-weight: bold; text-align: center;" bgcolor="#01C388">
			<td rowspan="2">Spesifikasi</td>
			<td rowspan="2">Stock Awal</td>
			<td rowspan="2">Penerimaan</td>
			<td rowspan="2">Pengeluaran</td>
			<td>Stock</td>
			<td>Stock</td>
			<td rowspan="2">Stock Akhir</td>
		</tr>
		<tr style="font-weight: bold; text-align: center;"  bgcolor="#01C388">
			<td>Lapangan</td>
			<td>Gudang</td>
		</tr>
		<tr>
			<td></td>
		</tr>
		
	</table>
	
</div>
	
</div>
</body>
</html>
<?php
	require_once 'template/footer.php';
?>
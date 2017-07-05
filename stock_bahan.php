<?php
	require_once 'template/header.php';
	require_once 'fungsi.php';
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
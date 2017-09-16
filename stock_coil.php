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
<h1 style="padding-top: 30px; text-align: center;">Stock Coil</h1>
	<div class="col-md-12">	
	<hr>
<div class="col-md-12">
	<table class="table-bordered" style="width: 100%">
		<tr style="font-weight: bold; text-align: center; Height:30px;" bgcolor="#01C388">
			<td>No</td>
			<td>Size</td>
			<td>Berat</td>
			<td>Spec</td>
			<td>Sumber</td>
		</tr>
		<?php
		$no=0;
		$query  = ("SELECT bahan.idbahan, bahan.tebal, bahan.lebar, bahan.berat, spec.namaspec, sumber.namasumber FROM bahan INNER JOIN spec ON bahan.idspec=spec.idspec INNER JOIN sumber ON bahan.idsumber=sumber.idsumber");
		$tampil = mysqli_query($con,$query);
		while($data=mysqli_fetch_array($tampil)){
			$no++;
		echo "
		<tr style='text-align:center;'>
			<td>$no</td>
			<td>$data[tebal] X $data[lebar] </td>
			<td>$data[berat] ton</td>
			<td>$data[namaspec]</td>
			<td>$data[namasumber]</td>					
		</tr>
		";
		}
		?>

	</table>
</div><!-- col-md-12 -->	
</div><!-- container -->

</body>
</html>
<?php
	require_once 'template/footer.php';
?>
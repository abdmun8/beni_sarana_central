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
<h1 style="padding-top: 30px; text-align: center;">Stock Coil</h1>
	<div class="col-md-12">
	<a href="tambah_stock_coil.php"><button class="btn btn-default">Tambah</button></a>
	<hr>
<div class="col-md-12">
	<table class="table-bordered" style="width: 100%">
		<tr style="font-weight: bold; text-align: center; Height:30px;" bgcolor="#01C388">
			<td>No</td>
			<td>Size</td>
			<td>Berat</td>
			<td>Panjang</td>
			<td>Spec</td>
			<td>Sumber</td>
			<td>Action</td>
		</tr>
		<?php
		$no=0;
		$query  = ("SELECT bahan.idbahan, bahan.tebal, bahan.lebar, bahan.berat, bahan.panjang, spec.namaspec, sumber.namasumber FROM bahan INNER JOIN spec ON bahan.idspec=spec.idspec INNER JOIN sumber ON bahan.idsumber=sumber.idsumber");
		$tampil = mysqli_query($con,$query);
		while($data=mysqli_fetch_array($tampil)){
			
			$no++;
		echo "
		<tr style='text-align:center;'>
			<td>$no</td>
			<td>$data[tebal] meter X $data[lebar] meter</td>
			<td>$data[berat] ton</td>
			<td>$data[panjang] meter</td>
			<td>$data[namaspec]</td>
			<td>$data[namasumber]</td>
			<td>
			<a href='hapus_stock_coil.php?idbahan=$data[idbahan]'><button class='btn btn-default'><span class='glyphicon glyphicon-erase'></span></button></a>
			<a href='edit_stock_coil.php?idbahan=$data[idbahan]'><button class='btn btn-default'><span class='glyphicon glyphicon-edit'></span></button></a>
			</td>			
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
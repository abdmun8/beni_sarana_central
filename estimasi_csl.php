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
	<h1 style="padding-top: 30px; text-align: center;">Estimasi CSL</h1>
	<?php
	
			echo "
			<table class='table-bordered' style='width: 100%'>
				<tr style='font-weight: bold; text-align: center; Height:30px;' bgcolor='#01C388'>
					<td rowspan='2'>No</td>
					<td colspan='4'>Bahan</td>
					<td>Speed</td>
					<td colspan='2'>Waktu Prod</td>
					<td colspan='6'>Target Produk</td>
					<td rowspan='2'>Keterangan</td>
					<td rowspan='2'>Action</td>					
				</tr>
				<tr style='text-align: center; Height:30px; font-weight: bold;' bgcolor='#01C388'>
					<td>Ukuran</td>
					<td>Berat</td>
					<td>Panjang</td>
					<td>Sumber</td>
					<td>MPM</td>
					<td>Menit</td>
					<td>Jam</td>
					<td>Spec</td>
					<td>Coat</td>
					<td>Target Coat</td>
					<td>Berat(MT)</td>
					<td>Order</td>
					<td>Finished</td>					
				</tr>
			";
		$no=0;
		$query     = ("SELECT estimasicsl.tebal, estimasicsl.lebar, estimasicsl.berat, estimasicsl.panjang, sumber.namasumber, estimasicsl.mpm, estimasicsl.menit, estimasicsl.jam, spec.namaspec, coat.namacoat, orders.namaorder, estimasicsl.berattarget, finished.namafinished, estimasicsl.keterangan FROM estimasicsl INNER JOIN sumber ON estimasicsl.idsumber=sumber.idsumber INNER JOIN spec ON estimasicsl.idspec=spec.idspec INNER JOIN coat ON estimasicsl.idcoat=coat.idcoat INNER JOIN orders ON estimasicsl.idorder=orders.idorder INNER JOIN finished ON estimasicsl.idfinished=finished.idfinished WHERE estimasicsl.selesai=0");
		$tampil     = mysqli_query($con,$query);
		while ($data=mysqli_fetch_array($tampil)) {
			$no++;
			echo "
				<tr class='text-center'>
					<td>$no</td>
					<td>$data[tebal] mx$data[lebar] m</td>
					<td>$data[berat] ton</td>
					<td>$data[panjang] m</td>
					<td>$data[namasumber]</td>
					<td>$data[mpm]</td>
					<td>$data[menit]</td>
					<td>$data[jam]</td>
					<td>$data[namaspec]</td>
					<td>$data[namacoat]</td>
					<td>$data[targetcoat]</td>
					<td>$data[berattarget] ton</td>
					<td>$data[namaorder]</td>					
					<td>$data[namafinished]</td>
					<td>$data[keterangan]</td>
					<td>
						<a href='estimasi_csl_update.php?selesai=$data[idcsl]'><button class='btn btn-default'>Done</button></a>
					</td>
				</tr>
			";
		
		echo "</table>";
	}

?>	
	
	</div>
</body>
</html>
<?php
	require_once 'template/footer.php';
?>
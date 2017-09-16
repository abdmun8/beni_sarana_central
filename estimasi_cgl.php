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
	<h1 style="padding-top: 30px; text-align: center;">Estimasi CGL</h1>
	<?php
	
			echo "
			<table class='table-bordered' style='width: 100%'>
				<tr style='font-weight: bold; text-align: center; Height:30px;' bgcolor='#01C388'>
					<td rowspan='2'>No</td>
					<td colspan='4'>Bahan</td>
					<td>Speed</td>
					<td colspan='2'>Waktu Prod</td>
					<td colspan='5'>Target Produk</td>
					<td rowspan='2'>Code OP</td>
					<td rowspan='2'>Keterangan</td>								
				</tr>
				<tr style='text-align: center; Height:30px; font-weight: bold;' bgcolor='#01C388'>
					<td>Ukuran</td>
					<td>Ton</td>
					<td>Meter</td>
					<td>Sumber</td>
					<td>MPM</td>
					<td>Menit</td>
					<td>Jam</td>
					<td>Spec</td>
					<td>Coat</td>
					<td>Order</td>
					<td>Berat Target</td>
					<td>Finished</td>					
				</tr>
			";
		$no=0;
		$a=1000;
		$query    = "SELECT estimasicgl.idcgl, estimasicgl.tebal, estimasicgl.lebar, estimasicgl.berat, estimasicgl.panjang, estimasicgl.sumber, estimasicgl.mpm, estimasicgl.menit, estimasicgl.jam, spec.namaspec, coat.namacoat, orders.namaorder, finished,estimasicgl.berattarget,estimasicgl.code_sap, estimasicgl.keterangan
			FROM estimasicgl
			INNER JOIN spec ON estimasicgl.idspec=spec.idspec
			INNER JOIN coat ON estimasicgl.idcoat=coat.idcoat
			INNER JOIN orders ON estimasicgl.idorder=orders.idorder
			WHERE selesai=0
			ORDER BY estimasicgl.tgl_produksi ASC";
		$tampil     = mysqli_query($con,$query);
		foreach ($tampil as $data) {
			$no++;
			echo "
				<tr class='text-center'>
					<td>$no</td>
					<td>$data[tebal] x $data[lebar] </td>
					<td>".$data['berat']/$a." </td>
					<td>$data[panjang] m</td>
					<td>$data[sumber]</td>
					<td>$data[mpm]</td>
					<td>$data[menit]</td>
					<td>$data[jam]</td>
					<td>$data[namaspec]</td>
					<td>$data[namacoat]</td>
					<td>$data[namaorder]</td>
					<td>$data[berattarget] ton</td>
					<td>$data[finished]</td>
					<td>$data[code_sap]</td>
					<td>$data[keterangan]</td>
				</tr>
			";
		}
		echo "</table>";
		
		
					

?>	
	
	</div>
</body>
</html>
<?php
	require_once 'template/footer.php';
?>
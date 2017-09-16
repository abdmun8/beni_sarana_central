<?php
	require_once 'fungsi.php';
	require_once 'template/header.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>PT SCB - Laoran</title>
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
	<h1 style="padding-top: 30px; text-align: center;">Laporan</h1>
	Disini akan ditampilkan daftar order yang sudah diselesaikan<br>
	<a href="laporan.php"><button class="btn btn-primary btn-xs">Back</button></a>
	<hr>
		<table class='table-bordered' style='width: 100%'>
				<tr style='font-weight: bold; text-align: center; Height:30px;' bgcolor='#01C388'>
					<td>No</td>
					<td>Tebal</td>
					<td>Lebar</td>
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
					<td>Tgl Produksi</td>
					<td>Tgl Selesai</td>
					<td>Code OP</td>
					<td>Keterangan</td>
				</tr>
				<?php
				$code=$_GET['code'];
				$no=0;
				$a=1000;
				$query     = ("SELECT idcgl,estimasicgl.tebal, estimasicgl.lebar, estimasicgl.berat, estimasicgl.panjang, estimasicgl.sumber, estimasicgl.mpm, estimasicgl.menit, estimasicgl.jam, spec.namaspec, coat.namacoat, orders.namaorder, estimasicgl.berattarget, finished, estimasicgl.tgl_produksi,tgl_selesai, estimasicgl.code_sap, estimasicgl.keterangan FROM estimasicgl INNER JOIN spec ON estimasicgl.idspec=spec.idspec INNER JOIN coat ON estimasicgl.idcoat=coat.idcoat INNER JOIN orders ON estimasicgl.idorder=orders.idorder  WHERE estimasicgl.selesai=1 and code_sap='".$code."' ");
				$tampil     = mysqli_query($con,$query);
				foreach ($tampil as $data) {
					$no++;
					echo "
						<tr class='text-center'>
							<td>$no</td>
							<td>$data[tebal]</td>
							<td>$data[lebar]</td>
							<td>".$data['berat']/$a." ton</td>
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
							<td>$data[tgl_produksi]</td>
							<td>$data[tgl_selesai]</td>
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
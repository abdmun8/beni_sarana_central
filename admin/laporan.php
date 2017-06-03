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
	Disini akan ditampilkan daftar order yang sudah diselesaikan
	<hr>
		<table class='table-bordered' style='width: 100%'>
				<tr style='font-weight: bold; text-align: center; Height:30px;' bgcolor='#01C388'>
					<td>No</td>
					<td>Tebal</td>
					<td>Lebar</td>
					<td>Berat</td>
					<td>Panjang</td>
					<td>Sumber</td>
					<td>MPM</td>
					<td>Menit</td>
					<td>Jam</td>
					<td>Spec</td>
					<td>Coat</td>
					<td>Order</td>
					<td>Berat Target</td>
					<td>Finished</td>
					<td>Tgl Selesai</td>
					<td>Keterangan</td>
				</tr>
				<?php
				$no=0;
				$query     = ("SELECT estimasicgl.tebal, estimasicgl.lebar, estimasicgl.berat, estimasicgl.panjang, sumber.namasumber, estimasicgl.mpm, estimasicgl.menit, estimasicgl.jam, spec.namaspec, coat.namacoat, orders.namaorder, estimasicgl.berattarget, finished.namafinished, estimasicgl.tgl, estimasicgl.keterangan FROM estimasicgl INNER JOIN sumber ON estimasicgl.idsumber=sumber.idsumber INNER JOIN spec ON estimasicgl.idspec=spec.idspec INNER JOIN coat ON estimasicgl.idcoat=coat.idcoat INNER JOIN orders ON estimasicgl.idorder=orders.idorder INNER JOIN finished ON estimasicgl.idfinished=finished.idfinished WHERE estimasicgl.selesai=1");
				$tampil     = mysqli_query($con,$query);
				while ($data=mysqli_fetch_array($tampil)) {
					$no++;
					echo "
						<tr class='text-center'>
							<td>$no</td>
							<td>$data[tebal] m</td>
							<td>$data[lebar] m</td>
							<td>$data[berat] ton</td>
							<td>$data[panjang] m</td>
							<td>$data[namasumber]</td>
							<td>$data[mpm]</td>
							<td>$data[menit]</td>
							<td>$data[jam]</td>
							<td>$data[namaspec]</td>
							<td>$data[namacoat]</td>
							<td>$data[namaorder]</td>
							<td>$data[berattarget] ton</td>
							<td>$data[namafinished]</td>
							<td>$data[tgl]</td>
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
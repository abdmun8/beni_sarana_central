<?php

	session_start();
	require_once '../fungsi.php';
	if (!isset($_SESSION['username'])) {
		header("Location:login.php");
		}
?>
<!DOCTYPE html>
<html>
<head>
	<title>PT SCB - Laoran</title>
	<link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">
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
<div class="container-fluid">
	<h1 style="padding-top: 70px; text-align: center; padding-bottom: 0;"></h1>
		
		<table class='table-bordered' style='width: 100%;padding-top: 0;' >
				<tr>
					<td style="text-align: center;padding-bottom: 6px;padding-top: 6px;" colspan="3" ><img alt="PT SCB" src="../asset/img/saranacentral3.png" height="80" width="110"></td>
					<td colspan="9" style="padding-left: 8px;">
						<b>PT SARANACENTRAL BAJATAMA Tbk.<br>
						DEPARTEMEN PPC & PRODUKSI<BR>
						PPC CGL</b>
					</td>
			<td colspan="5" style="font-size: 24px; text-align: center;">ESTIMASI PRODUKSI CGL</td>
					
				</tr>
				<tr style='font-weight: bold; text-align: center; Height:30px;' bgcolor='#ddd'>
					<td>No</td>
					<td>Tebal</td>
					<td>Lebar</td>
					<td>Ton</td>
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
					<td>Tgl Produksi</td>
					<td>Tgl Selesai</td>
					<td>Keterangan</td>
				</tr>
				<?php
				$tgl=$_GET['tgl'];
				$total_berat='';
				$total_panjang='';
				$total_menit='';
				$total_jam='';
				$no=0;
				$a=1000;
				$query1     = ("SELECT idcgl,sum(berat) total_berat, sum(panjang) total_panjang,sum(menit) total_menit, sum(jam) total_jam  FROM estimasicgl WHERE estimasicgl.selesai=1 and tgl_selesai='".$tgl."' ");
				$tampil1     = mysqli_query($con,$query1);
				foreach ($tampil1 as $data) {
					$total_berat=$data['total_berat'];
					$total_panjang=$data['total_panjang'];
					$total_menit=$data['total_menit'];
					$total_jam=$data['total_jam'];
				}
				$query     = ("SELECT idcgl,estimasicgl.tebal, estimasicgl.lebar, estimasicgl.berat, estimasicgl.panjang, sumber.namasumber, estimasicgl.mpm, estimasicgl.menit, estimasicgl.jam,  spec.namaspec, coat.namacoat, orders.namaorder, estimasicgl.berattarget, finished, estimasicgl.tgl_produksi,tgl_selesai, estimasicgl.keterangan FROM estimasicgl INNER JOIN sumber ON estimasicgl.idsumber=sumber.idsumber INNER JOIN spec ON estimasicgl.idspec=spec.idspec INNER JOIN coat ON estimasicgl.idcoat=coat.idcoat INNER JOIN orders ON estimasicgl.idorder=orders.idorder  WHERE estimasicgl.selesai=1 and tgl_selesai='".$tgl." group by idcgl' ");
				$tampil     = mysqli_query($con,$query);
				foreach ($tampil as $data) {
					$no++;
					echo "
						<tr class='text-center'>
							<td>$no</td>
							<td>$data[tebal]</td>
							<td>$data[lebar]</td>
							<td>".$data['berat']/$a." </td>
							<td>$data[panjang] m</td>
							<td>$data[namasumber]</td>
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
							<td>$data[keterangan]</td>
							
						</tr>
					";
				}
				echo "<tr>					
					<td colspan='3' style='text-align:center;'><b>Total</b></td>
					<td style='text-align:center;'><b>".$total_berat/$a."</b></td>
					<td style='text-align:center;'><b>".$total_panjang."</b></td>
					<td colspan='2'></td>
					<td style='text-align:center;'><b>".$total_menit."</b></td>
					<td style='text-align:center;'><b>".$total_jam."</b></td>
					<td colspan='8'></td>
				</tr>";
				echo "</table>";
					
				?>
	
	</div>
</body>
</html>
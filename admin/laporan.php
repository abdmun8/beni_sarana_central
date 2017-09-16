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
	<div class="col-md-6 col-md-offset-3">
		<table class='table-bordered' style='width: 100%'>
				<tr style='font-weight: bold; text-align: center; Height:30px;' bgcolor='#01C388'>
					<td>No</td>
					<td>Code OP</td>
					
					<td>Lihat Laporan</td>
				</tr>
				<?php
				$no=0;
				$a=1000;
				$query     = ("SELECT idcgl,estimasicgl.tebal, estimasicgl.lebar, estimasicgl.berat, estimasicgl.panjang, estimasicgl.sumber, estimasicgl.mpm, estimasicgl.menit, estimasicgl.jam, spec.namaspec, coat.namacoat, orders.namaorder, estimasicgl.berattarget, finished, estimasicgl.tgl_produksi,tgl_selesai, code_sap, estimasicgl.keterangan FROM estimasicgl INNER JOIN spec ON estimasicgl.idspec=spec.idspec INNER JOIN coat ON estimasicgl.idcoat=coat.idcoat INNER JOIN orders ON estimasicgl.idorder=orders.idorder  WHERE estimasicgl.selesai=1 group by code_sap");
				$tampil     = mysqli_query($con,$query);
				foreach ($tampil as $data) {
					$no++;
					echo "
						<tr class='text-center'>
							<td>$no</td>
							<td>$data[code_sap]</td>
							
							<td>
								<a href='detail_laporan.php?code=$data[code_sap]'><button class='btn btn-primary btn-xs'>Detail</button></a>";
							echo "</td>
						</tr>
					";
				}
				echo "</table>";
					
				?>
	
	</div>
	</div>
</body>
</html>
<?php
	require_once 'template/footer.php';
?>
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
	<h1 style="padding-top: 30px; text-align: center;">Laporan</h1>
	Disini akan ditampilkan daftar order yang sudah diselesaikan
	<hr>
		<div class="col-md-6 col-md-offset-3">
		<table class='table-bordered' style='width: 100%'>
				<tr style='font-weight: bold; text-align: center; Height:30px;' bgcolor='#01C388'>
					<td>No</td>					
					<td>Tgl Produksi</td>
					<td>Tgl Selesai</td>
					<td>Action</td>
				</tr>
				<?php
				$no=0;
				$a=1000;
				$query = ("SELECT estimasicgl.idcgl, estimasicgl.tebal, estimasicgl.lebar, estimasicgl.berat, estimasicgl.panjang, sumber.namasumber, estimasicgl.mpm, estimasicgl.menit, estimasicgl.jam, spec.namaspec, coat.namacoat, orders.namaorder, finished,estimasicgl.berattarget,tgl_produksi,tgl_selesai,estimasicgl.keterangan
					FROM estimasicgl
					INNER JOIN sumber ON estimasicgl.idsumber=sumber.idsumber
					INNER JOIN spec ON estimasicgl.idspec=spec.idspec
					INNER JOIN coat ON estimasicgl.idcoat=coat.idcoat
					INNER JOIN orders ON estimasicgl.idorder=orders.idorder
					WHERE selesai=1
					group by tgl_selesai
					ORDER BY estimasicgl.tgl_produksi ASC");
				$tampil     = mysqli_query($con,$query);
				foreach ($tampil as $data) {
					$no++;
					echo "
						<tr class='text-center'>
							<td>$no</td>
							
							<td>$data[tgl_produksi]</td>
							<td>$data[tgl_selesai]</td>
							<td>
								<a href='detail_laporan.php?tgl=$data[tgl_selesai]'><button class='btn btn-primary btn-xs'>Detail</button></a>";
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
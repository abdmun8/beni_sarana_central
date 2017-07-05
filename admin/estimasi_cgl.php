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
	<!-- Load CSS dan javascript dari folder asset/css -->  	
	
	<script>
            $(document).ready(function () {
                $('.tanggal').datepicker({
                    format: "yyyy-mm-dd",
                    autoclose:true
                });
            });
        </script>
</head>
<body>
<div class="container">

<div class="col-md-12">
	<h1 style="padding-top: 30px; text-align: center;">ESTIMASI PRODUKSI CGL</h1>
	<a href="tambah_estimasi_cgl.php"><button class="btn btn-default">Tambah</button></a>
	<hr>
<?php
	
			echo "
			<table class='table-bordered' style='width: 100%'>
				<tr style='font-weight: bold; text-align: center; Height:30px;' bgcolor='#01C388'>
					<td rowspan='2'>No</td>
					<td colspan='4'>Bahan</td>
					<td>Speed</td>
					<td colspan='2'>Waktu Prod</td>
					<td colspan='5'>Target Produk</td>
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
					<td>Order</td>
					<td>Berat Target</td>
					<td>Finished</td>					
				</tr>
			";
		$no=0;
		$query     = ("SELECT estimasicgl.idcgl, estimasicgl.tebal, estimasicgl.lebar, estimasicgl.berat, estimasicgl.panjang, sumber.namasumber, estimasicgl.mpm, estimasicgl.menit, estimasicgl.jam, spec.namaspec, coat.namacoat, orders.namaorder, estimasicgl.berattarget, finished.namafinished, estimasicgl.keterangan FROM estimasicgl INNER JOIN sumber ON estimasicgl.idsumber=sumber.idsumber INNER JOIN spec ON estimasicgl.idspec=spec.idspec INNER JOIN coat ON estimasicgl.idcoat=coat.idcoat INNER JOIN orders ON estimasicgl.idorder=orders.idorder INNER JOIN finished ON estimasicgl.idfinished=finished.idfinished WHERE selesai=0 ORDER BY estimasicgl.tgl ASC");
		$tampil     = mysqli_query($con,$query);
		while ($data=mysqli_fetch_array($tampil)) {
			$no++;
			echo "
				<tr class='text-center'>
					<td>$no</td>
					<td>$data[tebal] m x $data[lebar] m</td>
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
					<td>$data[keterangan]</td>
					<td>
						<a href='estimasi_cgl_update.php?selesai=$data[idcgl]'><button class='btn btn-default'>Done</button></a>";


					echo "</td>
				</tr>
			";
		}
		echo "</table>";
	
		
		

?>	
</div>
	<script type="text/javascript" src="../asset/js/bootstrap-datepicker.min.js"></script>
</body>
</html>
<?php
	require_once 'template/footer.php';
?>


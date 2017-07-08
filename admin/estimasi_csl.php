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
	<h1 style="padding-top: 30px; text-align: center;">Estimasi CSL</h1>
	<a href="tambah_estimasi_csl.php"><button class="btn btn-default">Tambah</button></a>
	<hr>
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
		$query     = ("SELECT a.idcsl, a.tebal, a.lebar, a.berat, a.panjang, sumber.namasumber, a.mpm, a.menit, a.jam, spec.namaspec, c.namacoat, a.targetcoat, orders.namaorder, a.berattarget, finished.namafinished, a.keterangan
			FROM estimasicsl a
			INNER JOIN sumber ON a.idsumber=sumber.idsumber
			INNER JOIN spec ON a.idspec=spec.idspec
			INNER JOIN coat c ON a.idcoat=c.idcoat
			INNER JOIN orders ON a.idorder=orders.idorder
			INNER JOIN finished ON a.idfinished=finished.idfinished
			WHERE a.selesai=0");
		$tampil     = mysqli_query($con,$query);
		while ($data = mysqli_fetch_array($tampil)) {
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

	<script type="text/javascript" src="../asset/js/bootstrap-datepicker.min.js"></script>
</body>
</html>
<?php
	require_once 'template/footer.php';
?>
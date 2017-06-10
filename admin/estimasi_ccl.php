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
	<h1 style="padding-top: 30px; text-align: center;">Estimasi CCL</h1>
	<a href="tambah_estimasi_ccl.php"><button class="btn btn-default">Tambah</button></a>
	<hr>

<?php
		echo "
			<table class='table-bordered' style='width: 100%'>
				<tr style='font-weight: bold; text-align: center; Height:30px;' bgcolor='#01C388'>
					<td rowspan='2'>No</td>
					<td rowspan='2'>Size</td>
					<td rowspan='2'>Spec</td>
					<td rowspan='2'>Color</td>
					<td rowspan='2'>Qty</td>
					<td rowspan='2'>Customer</td>
					<td rowspan='2'>Tgl Order</td>
					<td rowspan='2'>Mill</td>
					<td colspan='3'>Coating</td>
					<td rowspan='2'>Rencana Produksi</td>
					<td rowspan='2'>Keterangan</td>
					<td rowspan='2'>Action</td>					
				</tr>
				<tr style='text-align: center; Height:30px; font-weight: bold;' bgcolor='#01C388'>
					<td>TC</td>
					<td>BC</td>
					<td>PC</td>		
				</tr>
			";
		$no=0;
		$query     = ("SELECT estimasiccl.tebal, estimasiccl.lebar, spec.namaspec, color.namacolor, estimasiccl.qty, customer.namacustomer, estimasiccl.tgl_order, estimasiccl.mill, coat.namacoat, estimasiccl.rencana_produksi, estimasiccl.catatan FROM estimasiccl INNER JOIN spec ON estimasiccl.idspec=spec.idspec INNER JOIN color ON estimasiccl.idcolor=color.idcolor INNER JOIN customer ON estimasiccl.idcustomer=customer.idcustomer  INNER JOIN coat ON estimasiccl.idcoat=coat.idcoat ");
		$tampil     = mysqli_query($con,$query);
		while ($data=mysqli_fetch_array($tampil)) {
			$no++;
			echo "
				<tr class='text-center'>
					<td>$no</td>
					<td>$data[tebal] mx$data[lebar] m</td>
					<td>$data[namaspec]</td>
					<td>$data[namacolor]</td>
					<td>$data[qty]</td>
					<td>$data[namacustomer]</td>
					<td>$data[tgl_order]</td>
					<td>$data[mill]</td>					
					<td>$data[namacoat]</td>
					<td>$data[rencana_produksi]</td>
					<td>$data[keterangan]</td>
					<td></td>
				</tr>
			";
		
		echo "</table>";
	}

?>	
</div>

	<script type="text/javascript" src="../asset/js/bootstrap-datepicker.min.js"></script>
</html>
<?php
	require_once 'template/footer.php';
?>
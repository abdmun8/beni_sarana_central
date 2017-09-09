<?php
require_once 'template/header.php';
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
	<div style="padding-top: 50px;">
	<h1 style="text-align: center;">Selamat Datang</h1>
	<p align="center">Disini anda dapat melihat jadwal, laporan dan stock material</p>
	<p align="center">Jika anda belum mengerti cara menggunakan sistem ini, silahkan baca operation manual <a href="manual.php">disini</a></p>
	<div class="col-md-4 col-sm-6 col-xs-12" align="center">
		<h3>Jadwal Produksi</h3>
		<a href="stock_coil.php" ><img src="asset/img/jadwal.png"></a>		
	</div>
	<div class="col-md-4 col-sm-6 col-xs-12" align="center">
		<h3>Laporan</h3>
		<a href='laporan.php'> <img src="asset/img/report.png"></a>
	</div>
	<div class="col-md-4 col-sm-6 col-xs-12" align="center">
		<h3>Stock</h3>
		<div class="col-md-3" style="padding-bottom: 20px;"><a href="stock_bahan.php"><img src="asset/img/stock.png">
	</div>
</div>
</div>
</body>
</html>
<?php 
require_once 'template/footer.php';
 ?>
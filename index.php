<?php
require_once 'template/header.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>PT SSB - Home</title>
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
	<div class="col-md-4 col-sm-6 col-xs-12">
		jadwal
	</div>
	<div class="col-md-4 col-sm-6 col-xs-12">
		Laporan
	</div>
	<div class="col-md-4 col-sm-6 col-xs-12">
		Stock
	</div>
</div>
</div>
</body>
</html>
<?php 
require_once 'template/footer.php';
 ?>
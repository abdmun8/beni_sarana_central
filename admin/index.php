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
	<title>PT SCB - Login</title>	
</head>
<body>
	<div class="container" >
	<div class="col-md-offset-4 col-md-4" style="padding-top: 50px;">
	<h1 align="center">Welcome <?php echo $_SESSION['username']; ?></h1><br>
	</div>
	</div>
	<div class="container text-center">
	<div class="col-md-3" style="padding-bottom: 20px;"><a href="sumber.php"><img src="../asset/img/sumber.png" width="80%"></a><br>
	<p style="font-weight: bolder; font-size: 30px;">Sumber</p>
	</div>
	<div class="col-md-3" style="padding-bottom: 20px;"><a href="order.php"><img src="../asset/img/order.png" width="80%"></a><br>
	<p style="font-weight: bolder; font-size: 30px;">Order</p>
	</div>
	<div class="col-md-3" style="padding-bottom: 20px;"><a href="spec.php"><img src="../asset/img/spec.png" width="80%"></a><br>
	<p style="font-weight: bolder; font-size: 30px;">Spec</p>
	</div>
	<div class="col-md-3" style="padding-bottom: 30px;"><a href="coat.php"><img src="../asset/img/coat.png" width="80%"></a><br>
	<p style="font-weight: bolder; font-size: 30px;">Coat</p>
	</div>
	
	<div class="col-md-3" style="padding-bottom: 30px;"><a href="estimasi_cgl.php"><img src="../asset/img/estimasi.png" width="80%"></a><br>
	<p style="font-weight: bolder; font-size: 30px;">Estimasi CGL</p>
	</div>
	<!--<div class="col-md-3" style="padding-bottom: 30px;"><a href="estimasi_csl.php"><img src="../asset/img/estimasi.png" width="80%"></a><br>-->
	
	<div class="col-md-3" style="padding-bottom: 30px;"><a href="stock_bahan_baku.php"><img src="../asset/img/stock.png" width="80%"></a><br>
	<p style="font-weight: bolder; font-size: 30px;">Stock Bahan Baku</p>
	</div>
	<div class="col-md-3" style="padding-bottom: 30px;"><a href="stock_coil.php"><img src="../asset/img/stock.png" width="80%"></a><br>
	<p style="font-weight: bolder; font-size: 30px;">Stock Coil</p>
	</div>
	<div class="col-md-3" style="padding-bottom: 30px;"><a href="laporan.php"><img src="../asset/img/report.png" width="80%"></a><br>
	<p style="font-weight: bolder; font-size: 30px;">Laporan</p>
	</div>
	<!--<div class="col-md-3" style="padding-bottom: 30px;"><a href="color.php"><img src="../asset/img/color.png" width="80%"></a><br>
	<p style="font-weight: bolder; font-size: 30px;">Color</p>
	</div>
	<div class="col-md-3" style="padding-bottom: 30px;"><a href="customer.php"><img src="../asset/img/customer.png" width="80%"></a><br>-->
	<!--<p style="font-weight: bolder; font-size: 30px;">customer</p>
	</div>-->
	<!--<div class="col-md-3" style="padding-bottom: 20px;"><a href="finished.php"><img src="../asset/img/finished.png" width="80%"></a><br>
	<p style="font-weight: bolder; font-size: 30px;">Finished</p>
	</div>-->
	<!--<div class="col-md-3" style="padding-bottom: 30px;"><a href="estimasi_ccl.php"><img src="../asset/img/estimasi.png" width="80%"></a><br>
	<p style="font-weight: bolder; font-size: 30px;">Estimasi CCL</p>
	</div>-->
	<!--<p style="font-weight: bolder; font-size: 30px;">Estimasi CSL</p>
	</div>-->
	
	
</body>
</html>
<?php
	require_once 'template/footer.php';
?>
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
</body>
</html>
<?php
	require_once 'template/footer.php';
?>
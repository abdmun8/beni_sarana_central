<?php
	require_once 'template/header.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>PT SSB - Login</title>
	<!-- Load CSS dan javascript dari folder asset/css -->
	<link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">
	<script src="../asset/js/jquery.min.js"></script>
	<script src="../asset/js/bootstrap.min.js" ></script>
</head>
<body>
	<div class="container" >
		<div class="col-md-offset-4 col-md-4" style="padding-top: 50px;">
			<h1 align="center">Login</h1><br>
			<form method="post" action="proses_login.php">
				<div class="form-group">
				  	<input type="text" name="username" class="form-control" placeholder="Username">
				</div>
				<div class="form-group">
				    <input type="password" name="pass" class="form-control" placeholder="Password">
				</div>    
					<input type="submit" name="login" class="btn btn-default" value="login">  
			</form>  
		</div>		
	</div>
</body>
</html>

<?php
	require_once 'template/footer.php';
?>
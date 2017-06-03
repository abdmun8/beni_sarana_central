<?php
	session_start();
	require_once '../fungsi.php';
	require_once 'template/header.php';
	if (isset($_SESSION['username'])) {
		header("Location:index.php");
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
			<h1 align="center">Login</h1><br>
			<form method="post" action="proses_login.php">
				<div class="form-group">
				  	<input type="text" name="username" class="form-control" placeholder="Username" required>
				</div>
				<div class="form-group">
				    <input type="password" name="pass" class="form-control" placeholder="Password" required>
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
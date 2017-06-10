<?php
	session_start();
	require_once '../fungsi.php';
	if (!isset($_SESSION['username'])) {
		header("Location:login.php");
		}
	if (isset($_GET['selesai'])) {
		$id      = $_GET['selesai'];
		$sql     = ("UPDATE estimasicsl SET selesai=1 where idcsl='$id'");
		$update  = mysqli_query($con,$sql);
		if ($update) {
			echo "<script>window.open('estimasi_csl.php','_self')</script>";
		}
		else{
			echo "gagal";
		}
	}
?>
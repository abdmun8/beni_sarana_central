<?php
	session_start();
	require_once '../fungsi.php';
	$tgl_selesai = date("Y-m-d");
	if (!isset($_SESSION['username'])) {
		header("Location:login.php");
		}
	if (isset($_GET['selesai'])) {
		$id      = $_GET['selesai'];
		$sql     = ("UPDATE estimasicgl SET selesai=1,tgl_selesai='".$tgl_selesai."' where idcgl='$id'");
		$update  = mysqli_query($con,$sql);
		if ($update) {
			echo "<script>window.open('estimasi_cgl.php','_self')</script>";
		}
		else{
			echo "gagal";
		}
	}
?>
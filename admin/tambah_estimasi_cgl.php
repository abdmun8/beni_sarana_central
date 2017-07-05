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
	<script type="text/javascript" src="../asset/js/bootstrap-datepicker.min.js"></script>
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
<div class="col-md-8 col-md-offset-2">
	<h1 style="padding-top: 30px; text-align: center;">Estimasi CGL</h1>
	<a href="estimasi_cgl.php" class="btn btn-default">Lihat Estimasi CGL</a>
			<hr>
				<form action="" method="post">
					<div class="form-group">
					    <label>Tebal</label>
					    <input type="text" class="form-control" name="tebal" required autofocus>
					</div>
					<div class="form-group">
					    <label>Lebar</label>
					    <input type="text" class="form-control" name="lebar" required autofocus>
					</div>
					<div class="form-group">
					    <label>Berat</label>
					    <input type="text" class="form-control" name="berat" required autofocus>
					</div>					
					<div class="form-group">
					    <label>Spec</label> 
					    <select class="form-control" name="sumber" >
					    <?php
					    $query  = ("SELECT * FROM sumber ORDER BY namasumber ASC");
					    $tampil = mysqli_query($con,$query);
					    while ($data=mysqli_fetch_array($tampil)) {
					    	echo "<option value=$data[idsumber]>$data[namasumber]</option>";
					    }
					    ?>	
					    </select>					    	
					</div>
					<div class="form-group">
					    <label>Spec</label>
					    <select class="form-control" name="spec" >
					    <?php
					    $query  = ("SELECT * FROM spec ORDER BY namaspec ASC");
					    $tampil = mysqli_query($con,$query);
					    while ($data=mysqli_fetch_array($tampil)) {
					    	echo "<option value=$data[idspec]>$data[namaspec]</option>";
					    }
					    ?>	
					    </select>					    	
					</div>
					<div class="form-group">
					    <label>Coat</label>
					    <select class="form-control" name="coat" >
					    <?php
					    $query  = ("SELECT * FROM coat ORDER BY namacoat ASC");
					    $tampil = mysqli_query($con,$query);
					    while ($data=mysqli_fetch_array($tampil)) {
					    	echo "<option value=$data[idcoat]>$data[namacoat]</option>";
					    }
					    ?>	
					    </select>					    	
					</div>
					<div class="form-group">
					    <label>Order</label>
					    <select class="form-control" name="order" >
					    <?php
					    $query  = ("SELECT * FROM orders ORDER BY namaorder ASC");
					    $tampil = mysqli_query($con,$query);
					    while ($data=mysqli_fetch_array($tampil)) {
					    	echo "<option value=$data[idorder]>$data[namaorder]</option>";
					    }
					    ?>	
					    </select>					    	
					</div>					
					<div class="form-group">
					    <label>Berat Target</label>
					    <input type="text" class="form-control" name="berattarget" required autofocus>
					</div>
					<div class="form-group">
					    <label>Finished</label>
					    <select class="form-control" name="finished" >
					    <?php
					    $query  = ("SELECT * FROM finished ORDER BY namafinished ASC");
					    $tampil = mysqli_query($con,$query);
					    while ($data=mysqli_fetch_array($tampil)) {
					    	echo "<option value=$data[idfinished]>$data[namafinished]</option>";
					    }
					    ?>	
					    </select>					    	
					</div>
					<div class="form-group">
					    <label>Keterangan</label>
					    <input type="text" class="form-control" name="keterangan" required autofocus>
					</div>
					<div class="form-group">
					    <label>Tanggal</label>
					    <input type="text" class="form-control tanggal" name="tanggal" required autofocus>
					</div>
					<div class="form-group">
					    <label>MPM</label>
					    <input type="text" class="form-control" name="mpm" required autofocus>
					</div>
					<div class="form-group">
						<input type="submit" name="simpan" value="Simpan" class="btn btn-default">
						<input type="reset" value="Reset" class="btn btn-default">
					</div>

				</form>
				<?php
				if (isset($_POST['simpan'])) {
					$tebal      = $_POST['tebal'];
					$lebar      = $_POST['lebar'];
					$berat      = $_POST['berat'];
					$panjang    = $berat/($tebal*$lebar*7.85)/1000.000;
					$idsumber   = $_POST['sumber'];
					$idspec     = $_POST['spec'];					
					$idcoat     = $_POST['coat'];
					$idorder    = $_POST['order'];
					$berattarget= $_POST['berattarget'];
					$idfinished = $_POST['finished'];
					$keterangan = $_POST['keterangan'];
					$tanggal    = $_POST['tanggal'];
					$selesai    = 0;
					$mpm        = $_POST['mpm'];
					$menit      = $panjang/60;
					$jam        = $menit/60;
					$query      = ("INSERT INTO estimasicgl (tebal, lebar, berat, panjang, idsumber, idspec, idcoat, idorder, berattarget, idfinished, keterangan, tgl, selesai, mpm, menit, jam) VALUES ('$tebal','$lebar','$berat','$panjang', '$idsumber', '$idspec', '$idcoat', '$idorder', '$berattarget', '$idfinished', '$keterangan', '$tanggal', '$selesai', '$mpm', '$menit', '$jam')");
					$simpan     = mysqli_query($con,$query);
					if ($simpan) {
						echo "Data Berhasil disimpan";
					}else{
					echo mysqli_error($con)."gagal<br>";
					}
				}
				?>

</div>
</div>

</body>
</html>
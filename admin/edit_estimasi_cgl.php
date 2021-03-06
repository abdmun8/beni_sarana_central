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
<?php


	$id = $_GET['id'];
	$query    = "SELECT estimasicgl.tebal, estimasicgl.lebar, estimasicgl.berat, estimasicgl.panjang, estimasicgl.sumber, estimasicgl.mpm, estimasicgl.menit, estimasicgl.jam, spec.namaspec, coat.namacoat, orders.namaorder, finished,estimasicgl.berattarget,tgl_produksi, estimasicgl.code_sap, estimasicgl.keterangan
				FROM estimasicgl
				INNER JOIN spec ON estimasicgl.idspec=spec.idspec
				INNER JOIN coat ON estimasicgl.idcoat=coat.idcoat
				INNER JOIN orders ON estimasicgl.idorder=orders.idorder
				WHERE idcgl=".$id." ";
			$tampil     = mysqli_query($con,$query);
			foreach ($tampil as $data) {
			
?>
<div class="container">
<div class="col-md-8 col-md-offset-2">
	<h1 style="padding-top: 30px; text-align: center;">Estimasi CGL</h1>
	<a href="estimasi_cgl.php" class="btn btn-default">Lihat Estimasi CGL</a>
			<hr>
				<form action="" method="post">
					<div class="form-group">
					    <label>Tebal</label>
					    <input type="text" class="form-control" name="tebal" required autofocus value="<?=$data['tebal']?>">
					</div>
					<div class="form-group">
					    <label>Lebar</label>
					    <input type="text" class="form-control" name="lebar" value="<?=$data['lebar']?>" required>
					</div>
					<div class="form-group">
					    <label>Berat</label>
					    <input type="text" class="form-control" name="berat" value="<?=$data['berat']/1000;?>"required>
					</div>		
					<div class="form-group">
					    <label>Berat Target</label>
					    <input type="text" class="form-control" name="berattarget" value="<?=$data['berattarget']?>" required>
					</div>
					<div class="form-group">
					    <label>Finished</label>
					     <input type="text" class="form-control" name="finished" value="<?=$data['finished']?>" required>		    	
					</div>
					<div class="form-group">
					    <label>Code OP</label>
					    <input type="text" class="form-control" name="code_sap" value="<?=$data['code_sap']?>" required>
					</div>
					<div class="form-group">
					    <label>Keterangan</label>
					    <input type="text" class="form-control" name="keterangan" value="<?=$data['keterangan']?>" required>
					</div>
					<div class="form-group">
					    <label>Tanggal</label>
					    <input type="text" class="form-control tanggal" name="tanggal" value="<?=$data['tgl_produksi']?>" required>
					</div>			
					<div class="form-group">
					    <label>Sumber</label> 
					    <input type="text" class="form-control" name="sumber" value="<?=$data['sumber']?>" required>
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
						<input type="submit" name="simpan" value="Simpan" class="btn btn-default">
						<input type="reset" value="Reset" class="btn btn-default">
					</div>

				</form>
				<?php

				}

				if (isset($_POST['simpan'])) {
					$tebal      = $_POST['tebal'];
					$lebar      = $_POST['lebar'];
					$berat      = $_POST['berat']*1000;
					$panjang    = round((($berat/($tebal*$lebar*7.85))*1000));
					$sumber     = $_POST['sumber'];
					$idspec     = $_POST['spec'];					
					$idcoat     = $_POST['coat'];
					$idorder    = $_POST['order'];
					$berattarget= $_POST['berattarget'];
					$finished   = $_POST['finished'];
					$code_sap   = $_POST['code_sap'];
					$keterangan = $_POST['keterangan'];
					$tanggal    = $_POST['tanggal'];
					$mpm        = ubah_speed($tebal);
					if ($mpm == 0) {
						echo "<script> alert('tebal yang anda masukan tidak sesuai','_self')</script>";
						die;						
					}
					$hadir;
					
					$menit      = round(($panjang/$mpm));
					$jam        = round(($menit/60));
					$query      = "UPDATE  estimasicgl set tebal=".$tebal.", lebar=".$lebar.", 
						berat=".$berat.", panjang=".$panjang.", sumber='".$sumber."', 
						idspec=".$idspec.", idcoat=".$idcoat.", idorder=".$idorder.", 
						berattarget='".$berattarget."', finished='".$finished."', code_sap='".$code_sap."',
						keterangan='".$keterangan."',
						tgl_produksi='".$tanggal."', mpm=".$mpm.", 
						menit=".$menit.", jam = ".$jam." where idcgl=".$id." ";
					$simpan     = mysqli_query($con,$query);
					if ($simpan) {
						
						echo "<script> alert('data Berhasil Diupdate','_self')</script>";
						echo "<script> window.open('estimasi_cgl.php','_self')</script>";
					}else{
					echo mysqli_error($con)."gagal<br>";
					}
				}
				
				

				?>

</div>
</div>

</body>
</html>
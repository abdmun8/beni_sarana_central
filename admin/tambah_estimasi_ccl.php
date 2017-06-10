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
	<h1 style="padding-top: 30px; text-align: center;">Estimasi CCL</h1>
	<a href="estimasi_ccl.php" class="btn btn-default">Lihat Estimasi CCL</a>
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
					    <label>Color</label>
					    <select class="form-control" name="color" >
					    <?php
					    $query  = ("SELECT * FROM color ORDER BY namacolor ASC");
					    $tampil = mysqli_query($con,$query);
					    while ($data=mysqli_fetch_array($tampil)) {
					    	echo "<option value=$data[idcolor]>$data[namacolor]</option>";
					    }
					    ?>	
					    </select>					    	
					</div>
					<div class="form-group">
					    <label>Qty</label>
					    <input type="text" class="form-control" name="qty" required autofocus>
					</div>
					<div class="form-group">
					    <label>Customer</label>
					    <select class="form-control" name="customer" >
					    <?php
					    $query  = ("SELECT * FROM customer ORDER BY namacustomer ASC");
					    $tampil = mysqli_query($con,$query);
					    while ($data=mysqli_fetch_array($tampil)) {
					    	echo "<option value=$data[idcustomer]>$data[namacustomer]</option>";
					    }
					    ?>	
					    </select>					    	
					</div>
					<div class="form-group">
					    <label>Tanggal order</label>
					    <input type="text" class="form-control tgl_order" name="tgl_order" required autofocus>
					</div>
					</form>
					<div class="form-group">
					    <label>Mill</label>
					    <input type="text" class="form-control" name="mill" required autofocus>
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
					    <label>Rencana Produksi</label>
					    <input type="text" class="form-control rencana_produksi" name="rencana_produksi" required autofocus>
					</div>
					<div class="form-group">
					    <label>Catatan</label>
					    <textarea  type="text" class="form-control" name="catatan" required autofocus></textarea>
					</div>
					<div class="form-group">
						<input type="submit" name="simpan" value="Simpan" class="btn btn-default">
						<input type="reset" value="Reset" class="btn btn-default">
					</div>

				</form>
				<?php
				if (isset($_POST['simpan'])) {
					$tebal               = $_POST['tebal'];
					$lebar               = $_POST['lebar'];
					$idspec              = $_POST['spec'];	
					$idcolor             = $_POST['color'];	
					$qty                 = $_POST['qty'];	
					$idcustomer          = $_POST['customer'];
					$tgl_order  		 = $_POST['tgl_order'];
					$mill      			 = $_POST['mill'];			
					$idcoat    			 = $_POST['coat'];
					$rencana_produksi    = $_POST['rencana_produksi'];
					$catatan             = $_POST['catatan'];
					
					
					$query      = ("INSERT INTO estimasiccl (tebal, lebar, idspec, idcolor, qty, idcustomer, tgl_order, mill, idcoat, rencana_produksi, catatan) VALUES ('$tebal', '$lebar', '$idspec', '$idcolor', '$qty', '$idcustomer', '$tgl_order', '$mill', '$idcoat', '$rencana_produksi', '$catatan')");
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
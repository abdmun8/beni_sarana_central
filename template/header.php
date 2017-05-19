<!DOCTYPE html>
<html>
<head>
  <title>PT SCB</title>
  <!-- Load CSS dan javascript dari folder asset/css -->
  <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
  <script src="asset/js/jquery.min.js"></script>
  <script src="asset/js/bootstrap.min.js" ></script>
</head>

<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><img alt="PT SCB" src="asset/img/saranacentral.png" height="25" width="90"></a>
    </div>
    <!-- Mengumpilkan link yang bisa dikunjungi -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Schedule<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="estimasi_cgl.php">Estimasi Produksi CGL</a></li>
            <li><a href="estimasi_csl.php">Estimasi Produksi CSL</a></li> 
            <li><a href="estimasi_ccl.php">Estimasi Produksi CCL</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Stock<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="stock_coil.php">Stock Coil</a></li>
            <li><a href="stock_bahan.php">Stock Bahan Baku</a></li> 
          </ul>
        </li>
        <li><a href="laporan.php">Laporan</a></li>        
      </ul>     
      <ul class="nav navbar-nav navbar-right">
        <li>       
          <a href="admin/login.php">Login</a>
        </li>
      </ul>        
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

</body>
</html>
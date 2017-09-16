<!DOCTYPE html>
<html>
<head>
  <title>PT SCB</title>
  <!-- Load CSS dan javascript dari folder asset/css -->
  <link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../asset/css/bootstrap-datepicker.css">
  <script src="../asset/js/jquery.min.js"></script>
  <script src="../asset/js/bootstrap.min.js" ></script>

</head>
<body>
  <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="../index.php"><img alt="PT SCB" src="../asset/img/saranacentral2.png" height="25" width="90"></a>
    </div>
      <ul class="nav navbar-nav">
      <?php
      if (isset($_SESSION['username'])) {
        echo "
        <li><a href='index.php'>Home</a></li>
        <li><a href='sumber.php'>Sumber</a></li>
        <li><a href='order.php'>Order</a></li>
        <li><a href='spec.php'>Spec</a></li>
        <li><a href='coat.php'>Coat</a></li>
        <li class='dropdown'>
          <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Schedule<span class='caret'></span></a>
          <ul class='dropdown-menu'>
            <li><a href='estimasi_cgl.php'>Estimasi Produksi CGL</a></li>
          </ul>
        </li>
        <li class='dropdown'>
          <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Stock<span class='caret'></span></a>
          <ul class='dropdown-menu'>
            <li><a href='stock_coil.php'>Stock Coil</a></li>
            <ul>
            </ul>
            <li><a href='stock_bahan_baku.php'>Stock Bahan Baku Penunjang</a></li>
          </ul>
        </li>
        <li class='dropdown'>
          <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Laporan<span class='caret'></span></a>
        <ul class= 'dropdown-menu'>
        <li><a href='laporan.php'>Laporan CGL</a></li>
        </ul>
      </li>

        ";
        }
        ?>
      </ul>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li>
          <?php
          if (isset($_SESSION['username'])) {
            echo "<a href='logout.php'>Logout</a>";
          }
          ?>
        </li>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

</body>
</html>

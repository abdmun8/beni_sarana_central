<!DOCTYPE html>
<html>
<head>
  <title>PT SCB</title>
  <style type="text/css">
  	ul li a{
  		text-decoration: none;
  		color: white;
  		  	}
  	ul li a:hover{
  		color: #01C388;
  	}
  	ul li{
  		list-style:  none;
  	}
  </style>
  <!-- Load CSS dan javascript dari folder asset/css -->
  <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
  <script src="asset/js/jquery.min.js"></script>
  <script src="asset/js/bootstrap.min.js" ></script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-bottom">
  <div class="container" style="padding-top: 20px;">
    <div class="col-md-3">
    <ul>
      <li><a href="about.php">About us</a></li>
      <li><a href="contact.php">Contact & support</a></li>
      </ul>
    </div>
    <div class="col-md-3">
    <ul>
      <li><a href="manual.php">Operation Manual</a></li>
      </ul>
    </div>
	<div class="col-md-12"><p style="color: #ffffff; text-align: center; padding-top: 5px; font-weight: bold;">&copy PT Sarana Central bajatama Tbk. <?php echo date('Y');?></p></div>
  </div>
</nav>
</body>
</html>

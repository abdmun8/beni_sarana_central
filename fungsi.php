<?php 
$con = mysqli_connect("localhost","root","","saranacentral");

    if (mysqli_connect_errno())
    {
      echo "gagal menghubungkan ke database";
    }



	//untuk menentukan speed 
	function ubah_speed($tebal){
		switch ($tebal) {
			case 0.2:
				$mpm=70;
				break;
			case 0.25:
				$mpm=65;
				break;
			case 0.3:
				$mpm=60;
				break;
			case 0.35:
				$mpm=60;
				break;
			case 0.4:
				$mpm=55;
				break;
			case 0.45:
				$mpm=55;
				break;
			case 0.50:
				$mpm=50;
				break;
			case 0.60:
				$mpm=45;
				break;
			case 0.65:
				$mpm=45;
				break;
			case 0.7:
				$mpm=40;
				break;
			case 0.75:
				$mpm=40;
				break;
			case 0.8:
				$mpm=35;
				break;
			case 1:
				$mpm=30;
				break;
			case 1.2:
				$mpm=25;
				break;
			default:
				$mpm=0;
				break;			
			
		}
		return $mpm;
	}
?>

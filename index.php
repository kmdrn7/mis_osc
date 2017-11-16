<?php
	session_start();
	if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {  
    	header("Location: login.php");
    } else {
    	$userId=$_SESSION['user_name'];
		$userLvl=$_SESSION['lvl'];
    }
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.theme.min.css">
	<link rel="stylesheet" type="text/css" href="css/mystyle.css">
	<script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/npm.js"></script>
	<script type="text/javascript">		
		$(".button-collapse").sideNav();
	</script>
	<title>Open Source Community</title>
</head>
<body>
	<?php 
		$nav_text = "Rekap Absensi";
		include "navbar.php";
	 ?>
	<div align="center" class="container tengah myboxsize" style="margin-bottom: 5px; margin-top: 45px;">
		<div class="row topspace">
			<h4><?php if ($userId != '') { ?>
				<a style="margin-bottom: 5px; margin-top: 65px; padding: 10px; color: white;" href="absen.php">Absen </a>
				<a style="margin-bottom: 5px; margin-top: 65px; padding: 10px; color: white;" href="absen_tutup.php">Tutup Absen </a><?php } ?>
				<a style="margin-bottom: 5px; margin-top: 65px; padding: 10px; color: white;" href="data_mhs.php">Data Mahasiswa </a>
			</h4>
		</div>
		<?php
			include "index_table.php";
		?>
	</div>
</body>
</html
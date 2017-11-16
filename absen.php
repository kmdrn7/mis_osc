<?php
	session_start(); 
	if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {  
    	header("Location: login.php");
    }
	$minggu=0;
	$errorcode=0;
    if(isset($_GET['nrp'])) {
		$nrp=$_GET["nrp"];
		include 'koneksi.php';
		$result = mysqli_query($conn, "SELECT * FROM data_mahasiswa where nrp=" . $nrp);
		$sqlMinggu = "SELECT * FROM `data_tambahan` WHERE `tanggal` = '" . date("Y-m-d") . "'";
		$resultMinggu = mysqli_query($conn, $sqlMinggu);
		while($row = mysqli_fetch_assoc($resultMinggu)) {
			$minggu = $row["minggu_ke"];
		}
		$minggu="minggu_ke" . $minggu;
		if($minggu != "minggu_ke0") {
			if($result) {
				//echo $nrp;
				$sql = "UPDATE data_absensi SET " . $minggu . "=1 WHERE nrp=" . $nrp;
				if(mysqli_query($conn, $sql)) {
					header("Location: absen.php?errorcode=2");
					//echo "Sukses";
				} else {
					header("Location: absen.php?errorcode=1");
					//echo $minggu;
				}
			} else {
				header("Location: absen.php?errorcode=1");
			}
		} else {
			header("Location: absen.php?errorcode=3");
		}
		
		mysqli_close($conn);
    } else {
    	if(isset($_GET["errorcode"])) {
    		$errorcode=$_GET["errorcode"];
    	}
    	if(isset($_GET["style"])) {
    		$style=$_GET["style"];
    	} else {
    		$style=0;
    	}
?> 
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.theme.min.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="css/mystyle.css">
	<script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/npm.js"></script>
	<script type="text/javascript" src="js/bootstrap-notify.js"></script>
	<script type='text/javascript'>
	function showalert(){
		$.notify({
			title: 'Server : ',
			message: 'NRP tidak terdaftar atau tidak tepat'
		},{
			type: 'warning',
			delay: 5000,
			template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
				'<span data-notify="title">{1}</span>' +
				'<span data-notify="message">{2}</span>' +
			'</div>'
		});
	}
	function showalertSuccess(){
		$.notify({
			title: 'Server : ',
			message: 'Absen telah tercatat'
		},{
			type: 'warning',
			delay: 5000,
			template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
				'<span data-notify="title">{1}</span>' +
				'<span data-notify="message">{2}</span>' +
			'</div>'
		});
	}
	function showalertFailed(){
		$.notify({
			title: 'Server : ',
			message: 'Absen belum terbuka'
		},{
			type: 'warning',
			delay: 5000,
			template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
				'<span data-notify="title">{1}</span>' +
				'<span data-notify="message">{2}</span>' +
			'</div>'
		});
	}
	</script>
	<title>OSC 2017</title>
</head>
<body>
	<nav class="navbar navbar-fixed-top navbar-light" role="navigation" >
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
<!-- 	      <a class="navbar-brand" href="#"><img src="resources/osc.jpg" width="33" height="auto" alt=""></a> -->
	      <a class="navbar-text navbar-text-center" href="index.php" style="color: white;"> Open Source Community </a>
	    </div>
	  </div><!-- /.container-fluid -->
	</nav>

	<div align="center" class="container tengah myboxsize" style="margin-bottom: 5px; margin-top: 40px;">
		<form action="" method="GET" enctype="multipart/form-data">
			<div class="row topspace myboxsize blue" align="left">
			<div class="row" align="center" style="margin-bottom: 40px;">
				<h2>Absensi</h2>
			</div>
			<?php
				if($style==1) {
					echo "<div class='row' align='center'><h5>Silahkan mengisi NRP dibawah ini</h5></div>";
				}
			?>
			<div class='row'><div class='col-md-4'><h4>NRP</h4></div><div class='col-md-8'><input style='width: 80%;' type='text' name='nrp' value='' required></div></div>
			<div class="row topspace" align="center">
				<button type="submit" name="btn" style="padding-left: 20px; padding-right: 20px; padding-top: 10px; padding-bottom: 10px;"><span class="glyphicon glyphicon-cloud-upload" aria-hidden="true"></span> Absen </button>
				<button type="button" name="cancel" onclick="window.location='index.php';" style="padding-left: 20px; padding-right: 20px; padding-top: 10px; padding-bottom: 10px;"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancel </button>
			</div>
		</form>
		<div class="row" align="center">
				<h5>Anggota baru ? <a href="new.php">daftar disini</a></h5>
			</div>
	</div>
	<?php 
		if($errorcode == 1) {
			echo "<script> showalert(); </script>";
			exit;
		} else if($errorcode == 2) {
			echo "<script> showalertSuccess(); </script>";
			exit;
		} else if($errorcode == 3) {
			echo "<script> showalertFailed(); </script>";
			exit;
		}
	?>
</body>
</html>
<?php } ?>
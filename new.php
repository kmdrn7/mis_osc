<?php 
	session_start();
	if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {  
    	$userId='';
    } else {
    	$userId=$_SESSION['user_name'];
    }
    $uploadDir = 'file/';
    if(isset($_POST['btn'])) {
		$nrp=$_POST["nrp"];
		$nama=$_POST["nama"];
		$jenis_kelamin=$_POST["jenis_kelamin"];
		$kelas=$_POST["kelas"];
		$angkatan=$_POST["angkatan"];
		include 'koneksi.php';
		$sql = "INSERT INTO data_mahasiswa(nrp, nama, jenis_kelamin, kelas, angkatan)
		VALUES ($nrp,'$nama','$jenis_kelamin','$kelas',$angkatan)";
		$sqlAbsen = "INSERT INTO data_absensi(nrp, minggu_ke1, minggu_ke2, minggu_ke3, minggu_ke4, minggu_ke5, minggu_ke6, minggu_ke7, minggu_ke8, minggu_ke9, minggu_ke10, minggu_ke11, minggu_ke12)
		VALUES ($nrp, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
		if(mysqli_query($conn, $sql) && mysqli_query($conn, $sqlAbsen)) {
			header("Location: absen.php?style=1");
		} else {
			header("Location: new.php");
		}
		mysqli_close($conn);
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
	<title>Open Source Community</title>
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
	      <a class="navbar-brand" href="#"><img src="resources/osc.png" width="33" height="auto" alt=""></a>
	      <a class="navbar-brand" href="#" style="color: white;"></a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <!-- <ul class="nav navbar-nav">
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu <span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li><a href="#">Daftar Mahasiswa</a></li>
	            <li><a href="#">Daftar Absensi</a></li>
	            <li><a href="#">Daftar Pegawai</a></li>
	            <li class="divider"></li>
	            <li><a href="#">Rekap Absensi</a></li>
	            <li class="divider"></li>
	            <li><a href="#">Smart Parking</a></li>
	          </ul>
	        </li>
	      </ul> -->
	      <p class="navbar-text navbar-text-center">OSC 2017</p>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>

	<div align="center" class="container tengah myboxsize" style="margin-bottom: 5px; margin-top: 40px;">
		<form action="" method="post" name="myform" enctype="multipart/form-data">
			<div class="row topspace header myboxsize blue">
				<h2 class="judul">Masukkan data - data kamu</h2>
			</div>
			<div class="row topspace myboxsize blue" align="left">
				<div class='row'>
					<div class='col-md-4'>
						<h4>NRP</h4>
					</div>
					<div class='col-md-8'>
						<input autofocus="true" style='width: 80%;' type='text' placeholder="NRP" name='nrp'>
					</div>
				</div>
			<div class='row'>
				<div class='col-md-4'>
					<h4>Nama</h4>
				</div>
				<div class='col-md-8'>
					<input style='width: 100%;' type='text' placeholder="Nama Lengkap" name='nama'>
				</div>
			</div>
			<div class='row'>
				<div class='col-md-4'>
					<h4>Jenis Kelamin</h4>
				</div>
				<div class='col-md-8'>
					<select name="jenis_kelamin">
						<option value="L">Laki-Laki</option>
					    <option value="P">Perempuan</option>
					</select>
				</div>
			</div>
			<div class='row'>
				<div class='col-md-4'>
					<h4>Kelas</h4>
				</div>
				<div class='col-md-8'>
					<select name="kelas">
						<option value="D3 IT A">D3 IT A</option>
					    <option value="D3 IT B">D3 IT B</option>
					    <option value="D4 IT A">D4 IT A</option>
					    <option value="D4 IT B">D4 IT B</option>
					</select>
				</div>
			</div>
			<div class='row'>
				<div class='col-md-4'>
					<h4>Angkatan</h4>
				</div>
				<div class='col-md-8'>
					<select name="angkatan">
						<?php 
							$tahun=2013;
							while($tahun < 2018) {
								echo "<option value='" . $tahun . "'>" . $tahun . "</option>";
								$tahun++;
							}
						?>
					</select>
				</div>
			</div>
			<div class="row topspace" align="center">
				<button name="btn" type="submit" style="padding-left: 20px; padding-right: 20px; padding-top: 10px; padding-bottom: 10px;"><span class="glyphicon glyphicon-cloud-upload" aria-hidden="true"></span> Daftar </button>
				<button type="button" onclick="javascript:window.location='index.php';" style="padding-left: 20px; padding-right: 20px; padding-top: 10px; padding-bottom: 10px;"><span class="glyphicon glyphicon-remove"></span> Cancel </button>
			</div>
		</form>
	</div>
</body>
</html>
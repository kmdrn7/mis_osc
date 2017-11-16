<?php 
	session_start();
	if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {  
    	header("Location: login.php");
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
	<?php 
		$nav_text = "Daftar Anggota";
		include "navbar.php";
	 ?>

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
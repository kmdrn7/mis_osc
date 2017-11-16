<?php 
	session_start();
	if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {  
    	header("Location: login.php");
    } else {
    	$userId=$_SESSION['user_name'];
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
		$nav_text = "Detail Data Mahasiswa";
		include "navbar.php";
	 ?>

	<div align="center" class="container tengah myboxsize" style="margin-bottom: 5px; margin-top: 45px;">
			<div class="row topspace myboxsize blue" align="left">

			<?php 
					include 'koneksi.php';
					$nrp=$_GET["nrp"];
					$nama="";
					$jenis_kelamin="";
					$agama="";
					$tgllahir="";
					$alamat="";
					$sql="SELECT * FROM data_mahasiswa where nrp=" . $nrp;
					$result = mysqli_query($conn, $sql);
							while ($row = mysqli_fetch_assoc($result)) {
								$nrp=$row["nrp"];
								$nama=$row["nama"];
								$jenis_kelamin=$row["jenis_kelamin"];
								$kelas=$row["kelas"];
								$angkatan=$row["angkatan"];
							}
						mysqli_close($conn);
			?>
			<div class="table">
				<div class="rowtable header blue">
					<div class="cell">&emsp;&emsp;&emsp;</div>
				    <div class="cell"></div>
				</div>
				<div class="rowtable">
					<div class="cell">
						<strong>NRP</strong>
					</div>
					<div class="cell">
						<?php echo "$nrp" ?>
					</div>
				</div>
				<div class="rowtable">
					<div class="cell">
						<strong>Nama</strong>
					</div>
					<div class="cell">
						<?php echo "$nama" ?>
					</div>
				</div>
				<div class="rowtable">
					<div class="cell">
						<strong>Jenis Kelamin</strong>
					</div>
					<div class="cell">
						<?php echo "$jenis_kelamin" ?>
					</div>
				</div>
				<div class="rowtable">
					<div class="cell">
						<strong>Kelas</strong>
					</div>
					<div class="cell">
						<?php echo "$kelas" ?>
					</div>
				</div>
				<div class="rowtable">
					<div class="cell">
						<strong>Angkatan</strong>
					</div>
					<div class="cell">
						<?php echo "$angkatan" ?>
					</div>
				</div>
			</div>
			</div>
			<div class="row topspace2">
				<button onclick="document.location.href='index.php'" style="padding-left: 20px; padding-right: 20px; padding-top: 10px; padding-bottom: 10px;"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</button>
			</div>
	</div>
</body>
</html>
<?php 
	session_start();
	$errorcode = 0;
	if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {  
    	header("Location: login.php");
    } else {
    	$userId=$_SESSION['user_name'];
    }
    $uploadDir = 'file/';
    if(isset($_POST['btn'])){
    	$nrp=$_POST["nrp"];
		$nama=$_POST["nama"];
		$jenis_kelamin=$_POST["jenis_kelamin"];
		$kelas=$_POST["kelas"];
		$angkatan=$_POST["angkatan"];
		include 'koneksi.php';
		$sql = "UPDATE data_absensi SET minggu_ke1='$minggu_ke1' WHERE nrp=$nrp";
		if ($cek == 'image' && $result && mysqli_query($conn, $sql)) {
			header("Location: index.php");
		} else {
			
		}
		mysqli_close($conn);
    } /*else if (isset($_POST['cancel'])) {
    	header("Location: index.php");
    }*/
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
			message: 'File yang diupload harus berupa gambar!'
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
	<title>MIS IT B '16 PENS</title>
</head>
<body>
	<?php 
		$nav_text = "Edit Data Mahasiswa";
		include "navbar.php";
	 ?>

	<div align="center" class="container tengah myboxsize" style="margin-bottom: 5px; margin-top: 40px;">
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="row topspace myboxsize blue" align="left">
			<?php 
					include 'koneksi.php';
					$nrp=$_GET["nrp"];
					$nama="";
					$jenis_kelamin="";
					$agama="";
					$tgllahir="";
					$alamat="";
					$sql="SELECT * FROM Mahasiswa where nrp=" . $nrp;
					$result = mysqli_query($conn, $sql);
							while ($row = mysqli_fetch_assoc($result)) {
								$nrp=$row["nrp"];
								$nama=$row["nama"];
								$jenis_kelamin=$row["jenis_kelamin"];
								$agama=$row["agama"];
								$notelp=$row["notelp"];
								$tgllahir=$row["tgllahir"];
								$alamat=$row["alamat"];
								$filePath=$row["filepath"];
							}
						mysqli_close($conn);
			?>
			<div class="row">
					<div class="col-md-12" align="center">
						<?php echo "<img src='$filePath' alt='Photo Profil' style='width:auto;height:200px;margin-bottom:5px;'>" ?>
					</div>
			</div>
			<div class='row'><div class='col-md-4'><h4>NRP</h4></div><div class='col-md-8'><input style='width: 80%;' type='text' name='nrp' value='<?php echo "$nrp" ?>' required></div></div>
			<div class='row'><div class='col-md-4'><h4>Nama</h4></div><div class='col-md-8'><input style='width: 100%;' type='text' name='nama' value='<?php echo "$nama" ?>' required></div></div>
			<div class='row'>
				<div class='col-md-4'>
					<h4>Jenis Kelamin</h4>
				</div>
				<div class='col-md-8'>
					<select name="jenis_kelamin">
						<?php
						if($jenis_kelamin == 'Laki-Laki') {
				            echo '
				            <option value="Laki-Laki" selected>Laki-Laki</option>
				            <option value="Perempuan">Perempuan</option>';
				        } else {
				            echo '
				            <option value="Laki-Laki">Laki-Laki</option>
					    	<option value="Perempuan" selected>Perempuan</option>';
				        }
						?>
					</select>
					
				</div>
			</div>
			<div class='row'><div class='col-md-4'><h4>Agama</h4></div><div class='col-md-8'><input style='width: 55%;' type='text' name='agama' value='<?php echo "$agama" ?>' required></div></div>
			<div class='row'><div class='col-md-4'><h4>Tanggal Lahir</h4></div><div class='col-md-8'><input style='width: 35%;' type='date' name='tgllahir' value='<?php echo "$tgllahir" ?>' required></div></div>
			<div class='row'><div class='col-md-4'><h4>No. Telpon</h4></div><div class='col-md-8'><input style='width: 55%;' type='text' name='notelp' value='<?php echo "$notelp" ?>' required></div></div>
			<div class='row'><div class='col-md-4'><h4>Alamat</h4></div><div class='col-md-8'><textarea style='width: 100%;' name='alamat' required><?php echo "$alamat" ?></textarea></div></div>
			<div class='row'>
				<div class='col-md-4'>
					<h4>Upload foto</h4>
				</div>
				<div class='col-md-8'>
					<input type="file" name="userfile" id="userfile">
				</div>
			</div>
			</div>
			<div class="row topspace">
				<button type="submit" name="btn" style="padding-left: 20px; padding-right: 20px; padding-top: 10px; padding-bottom: 10px;"><span class="glyphicon glyphicon-cloud-upload" aria-hidden="true"></span> Update </button>
				<button type="button" name="cancel" onclick="window.location='index.php';" style="padding-left: 20px; padding-right: 20px; padding-top: 10px; padding-bottom: 10px;"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancel </button>
			</div>
		</form>
	</div>
	<?php 
		if($errorcode == 1) {
			echo "<script> showalert(); </script>";
			exit;
		}
	?>
</body>
</html>
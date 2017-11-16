<?php 
	session_start();
	if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {  
    	$userId='';
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
	      <a class="navbar-brand" href="#"><img src="resources/pens.png" width="33" height="auto" alt=""></a>
	      <a class="navbar-brand" href="#" style="color: white;"> OSC 2017 </a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <p class="navbar-text navbar-text-center">Detail Data Mahasiswa</p>
	      <ul class="nav navbar-nav navbar-right">
	        
	          <?php 
	          	if ($userId == '') {
	          		echo "<li><a href='login.php' class='login-text'>Login</a></li>";
	          	} else {
	          		echo "<li class='dropdown'><a href='#'' class='dropdown-toggle' data-toggle='dropdown'>Welcome $userId <span class='glyphicon glyphicon-user'></span></a><ul id='login-dp' class='dropdown-menu'><li><div class='row'><div class='col-md-12'><div class='form-group' style='padding-bottom: 50px;'><div class='col-md-6'><form action='userdetails.php'><button type='submit' class='btn btn-primary btn-block'>Profil</button></form></div><div class='col-md-6'><form action='logout.php'><button type='submit' class='btn btn-primary btn-block'>Logout</button></form></div></div></div></div></li></ul></li>";
	          	}
	          ?>
	        
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>

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
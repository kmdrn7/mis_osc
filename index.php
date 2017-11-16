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
	      <a class="navbar-brand" href="#"><img src="resources/pens.png" width="33" height="auto" alt="" style="background-color: white;"></a>
	      <a class="navbar-brand" href="#" style="color: white;"> Open Source Community </a>
	    </div>
	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <p class="navbar-text navbar-text-center">Rekap Absensi</p>
	      <ul class="nav navbar-nav navbar-right">
	          <?php 
	          	if ($userId == '') {
	          		echo "<li>
	          				<a href='login.php' class='login-text'>Login</a>
	          			  </li>";
	          	} else {
	          		echo "<li class='dropdown'>
	          				<a href='#'' class='dropdown-toggle' data-toggle='dropdown'>Welcome $userId <span class='glyphicon glyphicon-user'></span></a>
	          				<ul id='login-dp' class='dropdown-menu'>
	          					<li>
	          						<div class='row'>
	          							<div class='col-md-12'>
	          								<div class='form-group' style='padding-bottom: 50px;'>
	          									<div class='col-md-6'>
	          										<form action='userdetails.php'>
	          											<button type='submit' class='btn btn-primary btn-block'>Profil</button>
	          										</form>
	          									</div>
	          									<div class='col-md-6'>
	          										<form action='logout.php'>
	          											<button type='submit' class='btn btn-primary btn-block'>Logout</button>
	          										</form>
	          									</div>
	          								</div>
	          							</div>
	          						</div>
	          					</li>
	          				</ul>
	          			</li>";
	          	}
	          ?>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
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
</html>
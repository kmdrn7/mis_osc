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
	      <a class="navbar-brand" href="#" style="color: white;"> MIS PENS </a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
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
			<div class="table">
				<div class="rowtable header blue">
					<div class="cell">&emsp;&emsp;&emsp;</div>
				    <div class="cell"></div>
				</div>
				<?php
					include 'koneksi.php';
					$sql="SELECT * FROM tbl_auth_user WHERE user_name='$userId'";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_assoc($result)) {
							echo '<div class="rowtable"><div class="cell"><strong>Full Name</strong></div><div class="cell">' . $row["user_name"] . '</div></div>';
							echo '<div class="rowtable"><div class="cell"><strong>User Name</strong></div><div class="cell">' . $row["user_id"] . '</div></div>';
							echo '<div class="rowtable"><div class="cell"><strong>Email</strong></div><div class="cell">' . $row["user_email"] . '</div></div>';
							echo '<div class="rowtable"><div class="cell"><strong>Password</strong></div><div class="cell">' . hexdec($row["user_password"]) . '</div></div>';
						}
					}
					mysqli_close($conn);
				?>
			</div>
			</div>
			<div class="row topspace">
				<button onclick="document.location.href='index.php'" style="padding-left: 20px; padding-right: 20px; padding-top: 10px; padding-bottom: 10px;"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</button>
			</div>
	</div>
</body>
</html>
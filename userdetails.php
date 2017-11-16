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
		$nav_text = "Detail Akun";
		include "navbar.php";
	 ?>

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
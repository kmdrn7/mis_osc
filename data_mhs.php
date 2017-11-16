<?php
	session_start();
	if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {  
    	header("Location: login.php");
    }
	if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {  
    	$userId='';
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
		$nav_text = "Data Mahasiswa";
		include "navbar.php";
	 ?>
	<div align="center" class="container tengah myboxsize" style="margin-bottom: 5px; margin-top: 45px;">
		<div class="row topspace">
				<button onclick="document.location.href='index.php'" style="padding-left: 20px; padding-right: 20px; padding-top: 10px; padding-bottom: 10px;"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</button>
			</div>
		<div class="row topspace">
			<div class="table">
				<div class="rowtable header blue">
					<div class="cell" style='border-color: black; border: 1px; border-right-style: solid;border-left-style: solid;'>No.</div>
				    <div class="cell" style='border-color: black; border: 1px; border-right-style: solid;'>Nama</div>
				    <div class="cell" style='border-color: black; border: 1px; border-right-style: solid;'>Kelas</div>
				    <div class="cell" style='border-color: black; border: 1px; border-right-style: solid;'>Angkatan</div>
				    <div class="cell" style='border-color: black; border: 1px; border-right-style: solid;'>Option</div>
				</div>
				<?php
					include 'koneksi.php';

					$sql = "SELECT * FROM data_mahasiswa ORDER BY angkatan";
					$result = mysqli_query($conn, $sql);
					$i=1;
					// if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_assoc($result)) {
							$j=1;
							echo "<div class='rowtable'>";
							echo "<div class='cell' style='border: 1px; border-right-style: solid; border-left-style: solid; border-bottom-style: solid;'>" . $i . "</div>";
								echo "<div class='cell' style='border: 1px; border-right-style: solid; border-bottom-style: solid;'>" . $row["nama"]. "</div>";
								echo "<div class='cell' style='border: 1px; border-right-style: solid; border-bottom-style: solid;'>" . $row["kelas"]. "</div>";
								echo "<div class='cell' style='border: 1px; border-right-style: solid; border-bottom-style: solid;'>" . $row["angkatan"]. "</div>";
							
							echo "<div class='cell' style='border: 1px; border-right-style: solid; border-bottom-style: solid;'><a href='details.php?nrp=$row[nrp]'></span><span class='glyphicon glyphicon-info-sign optionrow'></a>";
							// echo "<div class='cell'>" . $row["minggu_ke1"] . "</div>";
							// if ($userId !== '') {
							// 	// if($userLvl == "admin") { 
							// 	//echo "<a href='edit.php?nrp=$row[nrp]'><span class='glyphicon glyphicon-pencil optionrow'></span></a>"; }
							// 	if($userLvl == "admin") {
							// 	echo"<a href='delete.php?nrp=$row[nrp]'><span class='glyphicon glyphicon-trash optionrow'></span></a>";
							// 	}
							// }
							echo "</div>" ;
							// else {
							// 	echo "<a href='details.php?nrp=$row[nrp]'></span><span class='glyphicon glyphicon-info-sign optionrow'></a>";
							// }
							echo "</div>";
							$i++;
						}
					// }
					// mysqli_close($conn);
				?>
			</div>
		</div>
	</div>
</body>
</html>
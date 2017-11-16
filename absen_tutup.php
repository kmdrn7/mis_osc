<?php
		session_start();
		if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {  
    		header("Location: login.php");
    	}
		include 'koneksi.php';
		// $result = mysqli_query($conn, "SELECT * FROM data_mahasiswa where nrp=" . $nrp);
		$sqlMinggu = "SELECT * FROM `data_tambahan` WHERE `tanggal` = '" . date("Y-m-d") . "'";
		$resultMinggu = mysqli_query($conn, $sqlMinggu);
		while($row = mysqli_fetch_assoc($resultMinggu)) {
			$minggu = $row["minggu_ke"];
		}
		$minggu="minggu_ke" . $minggu;
		if($minggu != "minggu_ke0") {
			// if($result) {
				//echo $nrp;
				$sql = "UPDATE data_absensi SET " . $minggu . "=3 WHERE " . $minggu . "=0";
				if(mysqli_query($conn, $sql)) {
					header("Location: index.php");
					//echo "Sukses";
				} else {
					header("Location: index.php");
					//echo $minggu;
				}
			// } else {
			// 	header("Location: absen.php?errorcode=1");
			// }
		} else {
			header("Location: index.php");
		}
		
		mysqli_close($conn);
?>
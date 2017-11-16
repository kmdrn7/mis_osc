<?php
session_start();
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {  
    	header("Location: login.php");
    }
$nrp=$_GET["nrp"];
include 'koneksi.php';
$sql = "DELETE FROM data_absensi WHERE nrp=" . $nrp;
if (mysqli_query($conn, $sql)) {
	header("Location: index.php");
}
mysqli_close($conn);
?>

<?php
$nrp=$_GET["nrp"];
include 'koneksi.php';
$sql = "DELETE FROM data_absensi WHERE nrp=" . $nrp;
if (mysqli_query($conn, $sql)) {
	header("Location: index.php");
}
mysqli_close($conn);
?>

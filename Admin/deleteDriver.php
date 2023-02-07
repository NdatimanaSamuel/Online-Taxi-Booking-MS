<?php 

$conn = new mysqli("localhost", "root", "", "taxibookdb") or die(mysqli_error());

	$ID=$_GET['id'];
	$conn->query("DELETE FROM `driverdb` WHERE `driverid` = ' $ID'") or die(mysqli_error());
	echo '<script type="text/javascript">alert("Driver deleted Successfully");window.location=\'viewDrivers.php\';</script>';
 ?>
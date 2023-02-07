<?php 

$conn = new mysqli("localhost", "root", "", "taxibookdb") or die(mysqli_error());

	$ID=$_GET['id'];
	$conn->query("DELETE FROM `taxitb` WHERE `taxiid` = ' $ID'") or die(mysqli_error());
	echo '<script type="text/javascript">alert("Taxi deleted Successfully");window.location=\'viewTaxi.php\';</script>';
 ?>
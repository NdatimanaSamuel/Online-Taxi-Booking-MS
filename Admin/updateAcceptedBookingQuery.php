
<?php

  $conn = new mysqli("localhost", "root", "", "taxibookdb") or die(mysqli_error());
  $statuModify=null;
  $driverNames=null;
  $driverPhone=null;
  $taxiids=null;
  $bookidd=null;

$driverNamePIdExiIsExist=null;
$driverNpPIdExiIsExist=null;
$driverNpPIdLonExiIsExist=null;

?>

<?php
  if(ISSET($_POST['savetaxisupdate'])){
   
   $statuModify=$_POST['bookingtaxistatus'];
   $driverNames=$_POST['driveremails'];
   $driverPhone=$_POST['driverphone'];
   $taxiids=$_POST['taxidss'];
   $bookidd=$_POST['bookngid'];

 if (!preg_match('/^[0-9\+]*$/',$driverPhone)) {
   $driverNamePIdExiIsExist="Only Mobile Number";
 }


elseif (strlen($driverPhone)<10) {
 $driverNpPIdExiIsExist="Enter Proper Mobile Number";
}

elseif (strlen($driverPhone)>14) {
     $driverNpPIdLonExiIsExist="Telephone Number is To Long Try Again";
}


else{

    $conn->query("UPDATE `taxitb` SET `taxistatus`='Taken' WHERE `taxiid` = '$taxiids'") or die(mysqli_error());


   $conn->query("UPDATE `bookingtb` SET `status`='$statuModify', `drivername`='$driverNames',`driverphone`='$driverPhone' WHERE `bookingid` = '$bookidd'") or die(mysqli_error());
    echo '<script>alert("Booking Started Successfully ");window.location=\'viewAcceptedBooking.php\';</script>';
        
}
          

  }
?>
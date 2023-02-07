<?php

  $conn = new mysqli("localhost", "root", "", "taxibookdb") or die(mysqli_error());

  $BooknId=null;
?>

<?php
  if(ISSET($_POST['savetaxisupdate'])){
   
   $BooknId=$_POST['bookngid'];
   $statuModify=$_POST['bookingtaxistatus'];

   $Namess=$_POST['custoname'];
   $phoness=$_POST['custophone'];

          
    $phno=$phoness;

  $messege=$Namess.  "Your Request Has Been Received Wait A Call ,Thank You  and Request Is ".$statuModify;

   require ("sms.php");


   $conn->query("UPDATE `bookingtb` SET `status`='$statuModify' WHERE `bookingid` = '$BooknId'") or die(mysqli_error());
    echo '<script>alert("Booking Accepted Successfully ");window.location=\'viewPendingBooking.php\';</script>';
        
  }
?>
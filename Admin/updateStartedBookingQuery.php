
<?php

  $conn = new mysqli("localhost", "root", "", "taxibookdb") or die(mysqli_error());
  $statusModify=null;
  $timecompleted=null;
  $time=null;
  $priceTaxi=null;
  $taxiids=null;
  $bookidd=null;
  
?>

<?php
  if(ISSET($_POST['savetaxisupdate'])){
   

   $statusModify=$_POST['bookingtaxistatus'];
   $timecompleted=date("Y-m-d");
   $time=$_POST['starttimes'];
   $priceTaxi=$_POST['pricess'];
   $taxiids=$_POST['taxidss'];
   $bookidd=$_POST['bookngid'];


   // $totalPaid=$_POST['totaltopay'];


    $times=date("h:i:s");

    $dateTimeObject1 = date_create($time); 
    $dateTimeObject2 = date_create($times); 
                                  
    $difference = date_diff($dateTimeObject1, $dateTimeObject2); 

                                 //save dff hour and mult price
    $dff=$difference->h;
    $totaltopay=$dff*$priceTaxi;
                                



                                // echo ("The difference in hours is:");
                                // echo $difference->h;

                                // echo "\n";
                                // $minutes = $difference->days * 24 * 60;
                                // $minutes += $difference->h * 60;
                                // $minutes += $difference->i;
                                // echo("The difference in minutes is:");
                                // echo $minutes.' minutes';
                                



  $conn->query("UPDATE `taxitb` SET `taxistatus`='available' WHERE `taxiid` = '$taxiids'") or die(mysqli_error());

   $conn->query("UPDATE `bookingtb` SET `status`='$statusModify',`paystatus`='Paid',`usedtime`='$dff',`totalpaid`='$totaltopay',`completedon`='$timecompleted' WHERE `bookingid` = '$bookidd'") or die(mysqli_error());
    echo '<script>alert("Booking Completed Successfully ");window.location=\'viewStartedJourney.php\';</script>';
        

          

  }
?>

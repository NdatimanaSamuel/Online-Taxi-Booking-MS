
<?php

  $conn = new mysqli("localhost", "root", "", "taxibookdb") or die(mysqli_error());

  $emailError=null;
  $driverNames=null;
  $driverPhone=null;
  $driverEmail=null;
  $driverCategory=null;
  $driverId=null;
  $driverStatus=null;
  $IDDSS=null;


  $driverNamePIdExiIsExist=null;
  $driverNpPIdExiIsExist=null;
  $driverNpPIdLonExiIsExist=null;
$driverNpPIdShonExiIsExist=null;
$driverNpPIdLonIdNumbExiIsExist=null;




?>

<?php
  if(ISSET($_POST['updatetaxidriver'])){
    
   $IDDSS=$_POST['iddd'];
    $driverNames=$_POST['drivernames'];
    $driverPhone=$_POST['driverphone'];
   
    $driverEmail=$_POST['driveremail'];
    $driverCategory=$_POST['drivercategory'];
     $driverId=$_POST['driverid'];
     $driverStatus="active";
     $t=date("Y-m-d");

      



if (!preg_match("/^[a-zA-Z\s]+$/",$driverNames)) {

 $driverNamePIdExiIsExist="Names Must Be Character";
 }


 elseif (!preg_match('/^[0-9\+]*$/',$driverPhone)) {

     $driverNamePIdExiIsExist="Only Mobile Number";
 }


elseif (strlen($driverPhone)<10) {
   
  $driverNpPIdExiIsExist="Enter Proper Mobile Number";
}

elseif (strlen($driverPhone)>14) {
    
     $driverNpPIdLonExiIsExist="Telephone Number is To Long Try Again";
}

elseif (strlen($driverId)>16) {
    
     $driverNpPIdShonExiIsExist="Entered Id Number is long must be 16 ";
}


elseif (strlen($driverId)<16) {
    
$driverNpPIdLonIdNumbExiIsExist="Entered Id Number is Few must be 16 ";
    }



 else{
         $conn->query("UPDATE `driverdb` SET `drivernames`='$driverNames',`driverphone`='$driverPhone',`driveremail`='$driverEmail',`drivercategory`='$driverCategory',`driveridnumber`='$driverId',`driverstatus`='$driverStatus' WHERE `driverid` = '$IDDSS'") or die(mysqli_error());
        echo " <script>window.alert('Driver Updated Successfully');window.location='viewDrivers.php'</script>";

  }

  }
?>
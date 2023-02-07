
<?php

  $conn = new mysqli("localhost", "root", "", "taxibookdb") or die(mysqli_error());

  $emailError=null;
  $driverNames=null;
  $driverPhone=null;
  $driverEmail=null;
  $driverCategory=null;
  $driverId=null;
  $driverStatus=null;

  $driverExiIsExist=null;
  $driverPhExiIsExist=null;
  $driverPIdExiIsExist=null;
  $driverNamePIdExiIsExist=null;
  $driverNpPIdExiIsExist=null;
  $driverNpPIdLonExiIsExist=null;
$driverNpPIdShonExiIsExist=null;
$driverNpPIdLonIdNumbExiIsExist=null;




?>

<?php
  if(ISSET($_POST['savetaxidriver'])){
    

    $driverNames=$_POST['drivernames'];
    $driverPhone=$_POST['driverphone'];
   
    $driverEmail=$_POST['driveremail'];
    $driverCategory=$_POST['drivercategory'];
     $driverId=$_POST['driverid'];
     $driverStatus="active";
     $t=date("Y-m-d");

      
$sql = "SELECT * FROM driverdb WHERE  driveremail='$driverEmail' ";
$query = mysqli_query($conn, $sql);
$row = mysqli_num_rows($query);

$sqlphone = "SELECT * FROM driverdb WHERE  driverphone='$driverPhone' ";
$queryphone = mysqli_query($conn, $sqlphone);
$rowphone = mysqli_num_rows($queryphone);

$sqlId = "SELECT * FROM driverdb WHERE  driveridnumber = '$driverId'";
$queryId = mysqli_query($conn, $sqlId);
$rowId = mysqli_num_rows($queryId);

if ($row>0) {

 $driverExiIsExist=" Driver Email Already Exist";
}




elseif ($rowphone>0) {

 $driverPhExiIsExist=" Driver Phone Already Exist";
}



elseif ($rowId>0) {

$driverPIdExiIsExist=" Driver Id Already Exist";
}
     


elseif (!preg_match("/^[a-zA-Z\s]+$/",$driverNames)) {

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

 $conn->query("INSERT INTO `driverdb`(drivernames,driverphone,driveremail,drivercategory,driveridnumber,driverstatus,addedon) VALUES('$driverNames','$driverPhone','$driverEmail','$driverCategory','$driverId','$driverStatus','$t')") or die(mysqli_error());
        echo '<script>alert("Driver Added Successfully");window.location=\'addDrivers.php\';</script>';

  }

  }
?>
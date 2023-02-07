
<?php

  $conn = new mysqli("localhost", "root", "", "taxibookdb") or die(mysqli_error());


$TaxiNamess=null;
$TaxiPlatess=null;
$TaxiSeatss=null;
$TaxiPricess=null;
$TaxiStatuss=null;
$TaxiDescr=null;
$taxiiddss=null;


$photo=null;
$photo_size=null;
$photo_name=null;







$taxiinameIsExist=null;
$Seatserror=null;
$TaxiPrQtyrror=null;



?>

<?php
  if(ISSET($_POST['savetaxis'])){

    $taxiiddss=$_POST['taxiidd'];
    $TaxiNamess=$_POST['taxinames'];
    $TaxiPlatess=$_POST['taxiplates'];
    $TaxiSeatss=$_POST['taxiseats'];
     $TaxiPricess=$_POST['taxipries'];
     $TaxiStatuss=$_POST['taxistatus'];
     $TaxiDescr=$_POST['descrip'];
    

    $t=date("Y-m-d");

        $photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
        $photo_name = addslashes($_FILES['photo']['name']);
        $photo_size = getimagesize($_FILES['photo']['tmp_name']);
        move_uploaded_file($_FILES['photo']['tmp_name'],"photo/" . $_FILES['photo']['name']);







if($TaxiSeatss<1) {

   $Seatserror="Enter Valid Seats";
 }

 elseif($TaxiPricess<1) {

   $TaxiPrQtyrror="Enter Valid Price ";
 }




   else{
    
    $conn->query("UPDATE `taxitb` SET `taxiname`='$TaxiNamess', `taxiplate` = '$TaxiPlatess',`taxiseats` = '$TaxiSeatss', `taxiprice` = '$TaxiPricess',`taxidescription`='$TaxiDescr' ,`taxistatus`= '$TaxiStatuss',`taxiimage`='$photo_name' WHERE `taxiid` = '$taxiiddss'") or die(mysqli_error());


  echo '<script>alert("Taxi Updated Successfully ");window.location=\'viewTaxi.php\';</script>';

}

}

    
?>
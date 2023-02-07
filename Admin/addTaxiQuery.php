
<?php

  $conn = new mysqli("localhost", "root", "", "taxibookdb") or die(mysqli_error());


$TaxiNamess=null;
$TaxiPlatess=null;
$TaxiSeatss=null;
$TaxiPricess=null;
$TaxiStatuss=null;
$TaxiDescr=null;


$photo=null;
$photo_size=null;
$photo_name=null;







$taxiinameIsExist=null;
$Seatserror=null;
$TaxiPrQtyrror=null;



?>

<?php
  if(ISSET($_POST['savetaxis'])){

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



$sql = "SELECT * FROM taxitb WHERE  taxiplate= '$TaxiPlatess'";
$query = mysqli_query($conn, $sql);
$row = mysqli_num_rows($query);


 
if ($row>0) {
// echo " <script>window.alert(' This Students Is Already Exist ');window.location='addStudents.php'</script>";
   $taxiinameIsExist="This Taxi Is Already Exist";
// exit();
}



elseif($TaxiSeatss<1) {

   $Seatserror="Enter Valid Seats";
 }

 elseif($TaxiPricess<1) {

   $TaxiPrQtyrror="Enter Valid Price ";
 }




   else{

 
  $conn->query("INSERT INTO `taxitb`(taxiname,taxiplate,taxiseats,taxiprice,taxidescription,taxistatus,taxiimage,taxiaddedon) VALUES('$TaxiNamess','$TaxiPlatess','$TaxiSeatss','$TaxiPricess','$TaxiDescr','$TaxiStatuss','$photo_name','$t')") or die(mysqli_error());

  echo '<script>alert("Taxi Added Successfully ");window.location=\'viewTaxi.php\';</script>';

}

}

    
?>
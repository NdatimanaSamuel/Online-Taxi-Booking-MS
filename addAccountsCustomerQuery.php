
<?php

  $conn = new mysqli("localhost", "root", "", "taxibookdb") or die(mysqli_error());


$customerNames=null;
$customerEmail=null;
$custPass=null;
$customerGender=null;
$customerPhone=null;
$customerAddress=null;
$custCountryss=null;
$custPass=null;


$customerIsExist=null;
$accountAddedSuccess=null;
$accountnames_error=null;
$accountphone_error=null;
$accountphonefewnumber_error=null;


?>

<?php
  if(ISSET($_POST['saveuser'])){

     $customerNames=$_POST['custnames'];
    $customerEmail=$_POST['custemail'];
    $custCountryss=$_POST['custcountry'];
    $customerGender=$_POST['custgender'];
       $customerPhone=$_POST['custphone'];
    $customerAddress=$_POST['custaddress'];
    $custPass=$_POST['custpass'];
  
    $t=date("Y-m-d");



$sql = "SELECT * FROM customertb WHERE  customeremail= '$customerEmail' || 	customerphone='$customerPhone'";
$query = mysqli_query($conn, $sql);
$row = mysqli_num_rows($query);


 
if ($row>0) {
// echo " <script>window.alert(' This Students Is Already Exist ');window.location='addStudents.php'</script>";
   $customerIsExist="This Customer Is Already Exist";
// exit();
}

elseif(!preg_match("/^[a-zA-Z\s]+$/",$customerNames)) {

   $accountnames_error="Names Must Be Character";
 }

 
elseif(!preg_match('/^[0-9\+]*$/',$customerPhone)) {

   $accountphone_error="Only Mobile Number";
 }


elseif(strlen($customerPhone)<10) {

   $accountphonefewnumber_error="Enter Proper Mobile Number";
 }



     else{


   $conn->query("INSERT INTO `customertb`(customernames,customeremail,customerphone,customeraddress,customergender,  customercountry,customerpassword,customercreatedon) VALUES('$customerNames','$customerEmail','$customerPhone','$customerAddress','$customerGender','$custCountryss','$custPass','$t')") or die(mysqli_error());

     echo '<script>alert("Account  Created Successfully ");window.location=\'Login.php\';</script>';
  }



}

    
?>
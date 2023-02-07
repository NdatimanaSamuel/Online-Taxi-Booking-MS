 <?php 

                    
$db=mysqli_connect("localhost","root","","taxibookdb");

$bookingcodes=null;
$customerids=null;
$customername=null;
$customeremails=null;
$customertel=null;
$customeraddresses=null;
$customergenders=null;
$customercountrys=null;
$taxiid=null;
$taxiplate=null;
$taxiprices=null;
$customerpickupaddress=null;
$customerdropupaddress=null;
$customerstartdate=null;
$customerstarttime=null;
$status=null;
$paystatus=null;
$statusShows=null;
$payingStatus=null;
$bookingStatuss=null;

$sendbookingerr_error=null;
$verifybookingfwnumber_error=null;
$dtaebookingerr_error=null;

if (isset($_POST['sendbookinginfo'])) {

   $bookingcodes=$_POST['bookingcode'];
   $customerids=$_POST['customerids'];
   $customername=$_POST['customername'];
   $customeremails=$_POST['customeremails'];
   $customertel=$_POST['customertel'];
   $customeraddresses=$_POST['customeraddresses'];

   $customergenders=$_POST['customergenders'];
    $customercountrys=$_POST['customercountrys'];
   $taxiid=$_POST['taxiid'];
   $taxiplate=$_POST['taxiplate'];
   $taxiprices=$_POST['taxiprices'];

      $customerpickupaddress=$_POST['customerpickupaddress'];
      $customerdropupaddress=$_POST['customerdropupaddress'];
      $customerstartdate=$_POST['customerstartdate'];
      $customerstarttime=$_POST['customerstarttime'];
   
   
   $status='Pending';
   $paystatus='Not Paid';
   $statusShows='Not Problem';
 

   $t=date("m/d/Y");
   $doneons=date("Y-m-d");
   

   $_SESSION['bookingcode'] =$bookingcodes; 
   
   



$sql = "SELECT * FROM bookingtb WHERE  customerphone= '$customertel' AND customeremail = '$customeremails'";
$query = mysqli_query($db, $sql);
$row = mysqli_num_rows($query);


   while ($data  = mysqli_fetch_array($query)) {
            
            $payingStatus  = $data['paystatus'];
            $bookingStatuss  = $data['status'];
           
        }

if ($payingStatus=="Not Paid") {
// echo " <script>window.alert(' This Booking Can Not Sended Without Paying First ');window.location='customerHome.php'</script>";
 $sendbookingerr_error="This Booking Can Not Sended Without Paying First ";

}


elseif ($bookingStatuss=="Pending") {

$verifybookingfwnumber_error="This Booking Can Not Sended Without Verfying First";
}


// $sqlroom = "SELECT * FROM rooms WHERE  roomid= '$roomid'";
// $queryroom = mysqli_query($conn, $sqlroom);
// $rowroom = mysqli_num_rows($queryroom);


//    while ($dataroom  = mysqli_fetch_array($queryroom)) {
            
//             $roomStatus  = $dataroom['roomstatus'];
           
           
//         }

// if ($roomStatus=="Accupied") {
// echo " <script>window.alert(' This Room is Aleardy Booked try other Room or Conatct Us ');window.location='customerHome.php'</script>";

// exit();
// }

                 //about date 

       elseif($customerstartdate < date("Y-m-d")) {
                                          
         $dtaebookingerr_error="Please Enter Valid Start Date ";
       }                       


else
    {





$insert=mysqli_query($db,"INSERT INTO bookingtb(bookingcode,customerid,taxiid,taxiplates,taxiprices,customername,customeremail,customerphone,customeraddress,customergender,customercountry,customerpickupaddress,customerdropaddress,customerstartdate,customerstarttime,status,paystatus,doneon,customerbookedon)
  VALUES('$bookingcodes','$customerids','$taxiid','$taxiplate','$taxiprices','$customername','$customeremails','$customertel','$customeraddresses','$customergenders','$customercountrys','$customerpickupaddress','$customerdropupaddress','$customerstartdate','$customerstarttime','$status','$paystatus','$t','$doneons')");


// $insert=mysqli_query($db,"INSERT INTO print_info(userid,boatid,names,code,firstname,lastname,telephone,email,country,address,guardian_tel,status,resrve_date,tim,descrption)
//   VALUES('$userid','$boatid','$boatname','$code1','$firstname','$lastname','$telephone','$email','$country','$address','$guardian_tel','$status','$resrve_date','$Time','$descrption')");



    echo '<script>alert("Booking  Sended Successfully ");window.location=\'printEvidence.php\';</script>';
  }



}

    
                     ?>

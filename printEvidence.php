 <?php


 session_start();
 error_reporting(0);
 if($_SESSION['customeremail']!=""){
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
 <title>Online Taxi Booking MS</title>
  <!-- MDB icon -->
  <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="bootstrap-invoice-main/css/bootstrap-invoice.min.css" />
          <script type="text/javascript">
        function preventBack() { window.history.forward(); }
        setTimeout("preventBack()", 0);
        window.onunload = function () { null };
    </script>
</head>

<body>
  
  <!-- Start your project here-->
  <div class="card">
    <div class="card-body">
      <div class="container mb-5 mt-3">
        <div class="row d-flex align-items-baseline" >
          <div class="col-xl-9">
                                          <?php
                                      $connet=mysqli_connect("localhost","root","", "taxibookdb") or die(mysql_error());
                                   
                                       ?>
    
                                          <?php


                          $querys = $connet->query("SELECT * FROM  bookingtb WHERE `bookingcode` = '".$_SESSION['bookingcode']."'") or die(mysqli_error());
                                     $fetched = $querys->fetch_array();

                                     
                                      ?>
            <p style="color: #7e8d9f;font-size: 20px;">Invoice  <strong>ID:<?php echo $fetched['bookingcode']?></strong></p>
          </div>
          <div class="col-xl-3 float-end">
            <a href="logout.php" class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark"><i class="fas fa-print text-primary"></i> Back</a>
          <!--   <a  class="btn btn-light text-capitalize" data-mdb-ripple-color="dark"><i class="far fa-file-pdf text-danger"></i> Export</a> -->
          </div>
          <hr>
        </div>
  
        <div class="container">
          <div class="col-md-12">
            <div  class="text-center">
              <p class="pt-0">Booked Taxi Information</p>
            </div>
  
          </div>
  
  
          <div class="row">
            <div class="col-xl-8">
              <ul class="list-unstyled">
                <li class="text-muted">Booked By: <span style="color:#5d9fc5 ;"><?php echo $fetched['customername']?></span></li>
                <li class="text-muted">Address : <span style="color:#5d9fc5 ;"><?php echo $fetched['customeraddress']?></span></li>
                <li class="text-muted">Country :<span style="color:#5d9fc5 ;"><?php echo $fetched['customercountry']?></span></li>
                <li class="text-muted">Gender :<span style="color:#5d9fc5 ;"><?php echo $fetched['customergender']?></span></li>
                 <li class="text-muted">Email :<span style="color:#5d9fc5 ;"><?php echo $fetched['customeremail']?></span></li>
                  <li class="text-muted"><i class="fas fa-phone"></i> <span style="color:#5d9fc5 ;"><?php echo $fetched['customerphone']?></span></li>
                <li class="text-muted"><?php echo $fetched['doneon']?></li>
              </ul>
            </div>
            <div class="col-xl-4">
              <p class="text-muted">Invoice</p>
              <ul class="list-unstyled">
              <!--   <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span class="fw-bold">ID:</span>#123-456</li> -->
                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span class="fw-bold">Creation Date: </span><?php echo $fetched['customerbookedon']?></li>
                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span class="me-1 fw-bold">Status:</span><span class="badge bg-warning text-black fw-bold"> <?php echo $fetched['status']?></span></li>

                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span class="me-1 fw-bold">PayStatus:</span><span class="badge bg-warning text-black fw-bold">  <?php echo $fetched['paystatus']?></span></li>
              </ul>
            </div>
          </div>
  
          <div class="row my-2 mx-1 justify-content-center">
            <table class="table table-striped table-borderless">
              <thead style="background-color:#84B0CA ;" class="text-white">
                <tr>
                  <th scope="col">Taxi Plate</th>
                  <th scope="col">Taxi Prices</th>
                  <th scope="col">Pick Up Address</th>
                  <th scope="col">Drop Address</th>
                  <th scope="col">Start Date</th>
                     <th scope="col">Start Time</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row"><?php echo $fetched['taxiplates']?></th>
                  <td><?php echo $fetched['taxiprices']?> Frw / per Hour</td>
                  <td><?php echo $fetched['customerpickupaddress']?></td>
                  <td><?php echo $fetched['customerdropaddress']?></td>
                  <td><?php echo $fetched['customerstartdate']?></td>
                    <td><?php echo $fetched['customerstarttime']?></td>
                </tr>
              
              </tbody>
  
            </table>
          </div>
          <div class="row">
            <div class="col-xl-8">
            <!--   <p class="ms-3">Add additional notes and payment information</p> -->
  
            </div>
         <!--    <div class="col-xl-3">
              <ul class="list-unstyled">
                <li class="text-muted ms-3"><span class="text-black me-4">SubTotal</span>$1110</li>
                <li class="text-muted ms-3 mt-2"><span class="text-black me-4">Tax(15%)</span>$111</li>
                </ul>
                <p class="text-black float-start"><span class="text-black me-3"> Total Amount</span><span style="font-size: 25px;">$1221</span></p>
            </div> -->
          </div>
          <hr>
          <div class="row">
            <div class="col-xl-10">
              <p>Thank you for Booking with us wait our call soon</p>
            </div>
            <div class="col-xl-2">
              <button type="button" class="btn btn-primary text-capitalize" style="background-color:#60bdf3 ;" onclick="print()">Print</button>
            </div>
          </div>
  
        </div>
      </div>
    </div>
  </div>
  <!-- End your project here-->

  <!-- MDB -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript"></script>
</body>

</html>
<?php
}else{
header("location:index.php");
}
?>
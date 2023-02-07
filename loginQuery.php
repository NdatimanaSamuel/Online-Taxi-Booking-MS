
<?php
 $username=null;
  $password=null;
  $checkaccount_error=null;

    session_start();




            if(ISSET($_POST['loginmanager'])){

        $username = $_POST['usernames'];
        $password = $_POST['userpass'];

        $conn = new mysqli("localhost", "root", "", "taxibookdb") or die(mysqli_error());
        $query = $conn->query("SELECT * FROM `customertb` WHERE `customeremail` = '$username' && `customerpassword` = '$password'") or die(mysqli_error());
        $fetch = $query->fetch_array();
        $valid = $query->num_rows;
        // $section = $fetch['staffrole'];   

            if($valid > 0){
               
                    $_SESSION['customerid'] = $fetch['customerid'];
                     $_SESSION['customeremail'] = $fetch['customeremail'];
                      $_SESSION['customernames'] = $fetch['customernames'];
                      $_SESSION['customerphone'] = $fetch['customerphone'];
                     
                    header("location:customerHome.php");
                
              
                // if($section == "Animation"){
                //      $_SESSION['staffnames'] = $fetch['staffnames'];
                //     $_SESSION['staffid'] = $fetch['staffid'];
                //     header("location:templates/Animation/homeAnimation.php");
                // }
              
            }
                

            else{
                  $checkaccount_error="Account Does Not Exist Try Again !";
                // echo "<script>alert('Account Does Not Exist!')</script>";
                // echo "<script>window.location = 'index.php'</script>";
            }
                        
        
        }

?>

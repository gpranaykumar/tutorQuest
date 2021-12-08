<?php
session_start(); 
include "../../../db_connection.php";
  if(isset($_GET['OTPauth']) && $_GET['OTPauth']==='true'){
    
    $organisationId = $_SESSION['id'];
    $uname = $_SESSION['uname'];
    $sql2 = "UPDATE organisation_data SET status='0' WHERE id='$organisationId' and uname='$uname' ";
		$result2 = mysqli_query($conn, $sql2);
		if ($result2) {
      session_unset();
      session_destroy();
      header("Location: ../../organisationLogin.php?success=OTP Verified successfully. Your account is under verification. ");
      exit();
	}
  }else{
    header("Location: orgOtp.php?error=Unknown error occured");
    exit();
  }

?>
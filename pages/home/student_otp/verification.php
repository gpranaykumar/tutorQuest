<?php
session_start(); 
include "../../../db_connection.php";
  if(isset($_GET['OTPauth']) && $_GET['OTPauth']==='true'){
    
    $studentId = $_SESSION['id'];
    $uname = $_SESSION['uname'];
    $sql2 = "UPDATE student_data SET status='0' WHERE id='$studentId' and uname='$uname' ";
		$result2 = mysqli_query($conn, $sql2);
		if ($result2) {
      session_unset();
      session_destroy();
      header("Location: ../../studentLogin.php?success=OTP Verified successfully. Your account is under verification. ");
      exit();
	}
  }else{
    header("Location: studentOtp.php?error=Unknown error occured");
    exit();
  }

?>
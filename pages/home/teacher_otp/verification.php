<?php
session_start(); 
include "../../../db_connection.php";
  function verified($OTPauth){
      $teacherId = $_SESSION['id'];
      $uname = $_SESSION['uname'];
      $sql2 = "UPDATE teacher_data SET status='0' WHERE id='$teacherId' and uname='$uname' ";
      $result2 = mysqli_query($conn, $sql2);
      if ($result2) {
        header("Location: teacherOtp.php?success=OTP Verified successfully. Your account is under verification. ");
        exit();
      }else{
      header("Location: teacherOtp.php?error=Unknown error occured");
      exit();
    }
  }
  if(isset($_GET['OTPauth']) && $_GET['OTPauth']==='true'){
    
    $teacherId = $_SESSION['id'];
    $uname = $_SESSION['uname'];
    $sql2 = "UPDATE teacher_data SET status='0' WHERE id='$teacherId' and uname='$uname' ";
		$result2 = mysqli_query($conn, $sql2);
		if ($result2) {
      header("Location: ../../teacherLogin.php.php?success=OTP Verified successfully. Your account is under verification. ");
      exit();
	}
  }else{
    header("Location: teacherOtp.php?error=Unknown error occured");
    exit();
  }

?>
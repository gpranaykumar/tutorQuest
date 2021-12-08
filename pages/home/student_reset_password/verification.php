<?php
session_start(); 
include "../../../db_connection.php";
  if(isset($_GET['OTPauth']) && $_GET['OTPauth']==='true'){
      $_SESSION['reset']='1';
      header("Location: studentPasswordReset.php");
      exit();
  }else{
    header("Location: studentOtp.php?error=Unknown error occured");
    exit();
  }

?>
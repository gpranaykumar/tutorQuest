<?php 
session_start(); 
include "../../../db_connection.php";

if (isset($_POST['password']) && isset($_POST['re_password'])){
    $password = $_POST['password'];
    $re_password = $_POST['re_password'];
    $uname = $_SESSION['uname'];
    if($password !== $re_password){
        header("Location: teacherPasswordReset.php?error=Password doesn't match with confirm password");
	    exit();
    }else{
        $sql = "UPDATE teacher_data SET password='$password' WHERE uname='$uname' ";
        $result = mysqli_query($conn, $sql);
		if ($result) {
            session_unset();
            session_destroy();
            header("Location: ../../teacherLogin.php?success=Password changed successfully");
		    exit();
        }else{
			header("Location: teacherPasswordReset.php?error=Username not found");
	        exit();
		}
    }
} 

?>
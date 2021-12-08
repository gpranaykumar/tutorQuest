<?php 
session_start(); 
include "../../db_connection.php";

if (isset($_POST['classLink']) && isset($_POST['stdId']) && isset($_SESSION['id'])){

//isset($_POST['stdId']) && isset($_POST['teaId'])){

	$link = $_POST['classLink'];
    //$stuID = $_POST['stdId'];
    //$teaID = $_POST['teaId'];
	$stuID = $_POST['stdId'];
    $teaID = $_SESSION['id'];
    
    if (empty($link)) {
		header("Location: teacherHome.php?error=Class Link Required:");
	    exit();
	}else{
		$sql2 = "UPDATE mobile_req SET classLink='$link' WHERE student_id='$stuID' and teacher_id='$teaID'";
        $result2 = mysqli_query($conn, $sql2);
        if ($result2) {
        header("Location: teacherHome.php?success=Link added Successfully");
        exit();
        }
	}
	
}else{
	header("Location: teacherLogin.php?error"."link:".$_POST['classLink']);
	exit();
}
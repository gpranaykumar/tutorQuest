<?php

if (isset($_SESSION['id']) && isset($_SESSION['uname']) && isset($_SESSION['role'])) {
		if($_SESSION['role']=== 'student'){ 
			header("Location: ./home/studentHome.php");
		}else if($_SESSION['role']=== 'teacher'){
			header("Location: ./home/teacherHome.php");
		} 
		else if($_SESSION['role']=== 'organisation'){
			header("Location: ./home/organisationHome.php");
		}
		else {
			header("Location: ../index.php");
		}
	}
?>

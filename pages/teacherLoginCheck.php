<?php 
session_start(); 
include "../db_connection.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: teacherLogin.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: teacherLogin.php?error=Password is required");
	    exit();
	}else{
		// hashing the password
        //$pass = md5($pass);
		//$pass = $pass;
        
		$sql = "SELECT * FROM teacher_data WHERE uname='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['uname'] === $uname && $row['password'] === $pass) {
            	if($row['status'] === '0'){
					header("Location: teacherLogin.php?error=Account Not Activated - Under Verification");
		        	exit();
				}
				if($row['status'] === '3'){
					header("Location: teacherLogin.php?error=Account Blocked By Admin");
		        	exit();
				}
				
				$_SESSION['uname'] = $row['uname'];
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['id'] = $row['id'];
				$_SESSION['role'] = $row['role'];
				$_SESSION['Accstatus'] = $row['status'];
				$_SESSION['reason'] = $row['reason'];
				$_SESSION['number'] = $row['number'];
            	header("Location: home/teacherHome.php");
		        exit();
            }else{
				header("Location: teacherLogin.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: teacherLogin.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: teacherLogin.php");
	exit();
}
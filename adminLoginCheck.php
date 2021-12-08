<?php 
session_start(); 
include "db_connection.php";

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
		header("Location: admin.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: admin.php?error=Password is required");
	    exit();
	}else{
		// hashing the password
        //$pass = md5($pass);
		//$pass = $pass;
        
		$sql = "SELECT * FROM admin WHERE uname='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['uname'] === $uname && $row['password'] === $pass) {
                $_SESSION['id'] = $row['id'];
            	$_SESSION['uname'] = $row['uname'];
				$_SESSION['role'] = 'admin';
            	header("Location: pages/admin/home.php");
		        exit();
            }else{
				header("Location: admin.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: admin.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: admin.php");
	exit();
}
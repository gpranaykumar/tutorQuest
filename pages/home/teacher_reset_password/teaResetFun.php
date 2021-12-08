<?php 
session_start(); 
include "../../../db_connection.php";

if (isset($_POST['uname'])){
    $uname = ($_POST['uname']);
    if (empty($uname)) {
		header("Location: teacherReset.php?error=Username is required");
	    exit();
	}else{
        $sql = "SELECT * FROM teacher_data WHERE uname='$uname'";
        $result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            	$_SESSION['uname'] = $row['uname'];
				$_SESSION['number'] = $row['number'];
            	header("Location: teacherOtp.php");
		        exit();
		}else{
			header("Location: teacherReset.php?error=Username not found");
	        exit();
		}
    }
}else{
    header("Location: teacherReset.php?error=Unknown error");
	exit();
} 

?>
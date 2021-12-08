<?php 
session_start(); 
include "../../../db_connection.php";

if(isset($_POST['aadhar_no'])){
    $aadhar_no = $_POST['aadhar_no'];

	$aadhar_front = $_FILES['aadhar_front']['name'];
	$aadhar_back = $_FILES['aadhar_back']['name'];
	$student_id = $_FILES['student_id']['name'];

    if(empty($aadhar_no)){
		
        header("Location: student_upload_doc.php?error=Aadhar Number is required&$aadhar_no");
	    exit();
    }else if(strlen($aadhar_no) !== 12 ){
		header("Location: student_upload_doc.php?error=Invalid Aadhar Number&$aadhar_no");
	    exit();
	}
    else if($aadhar_front === ""){
		header("Location: student_upload_doc.php?error=Aadhar Front image is required&$aadhar_no");
	    exit();
	}
	else if($aadhar_back === ""){
		header("Location: student_upload_doc.php?error=Aadhar Back image is required&$aadhar_no");
	    exit();
	}
	else if($student_id === ""){
		header("Location: student_upload_doc.php?error=Student ID image is required&$aadhar_no");
	    exit();
	}else{
        $stuid = $_SESSION['id'];
        $uname = $_SESSION['uname'];
        $sql2 = "UPDATE student_data SET status='0' WHERE id='$stuid' and uname='$uname' ";
		$result2 = mysqli_query($conn, $sql2);
		if ($result2) {
            $target_dir = "../../assets/student_data/". $_SESSION['uname'] ."/";
			if(!is_dir($target_dir)) {
				mkdir($target_dir);
			}
            move_uploaded_file($_FILES["aadhar_front"]["tmp_name"], $target_dir. 'aadhar_front'. '.' .pathinfo($aadhar_front)['extension']);
            move_uploaded_file($_FILES["aadhar_back"]["tmp_name"], $target_dir. 'aadhar_back'. '.' .pathinfo($aadhar_back)['extension']);
            move_uploaded_file($_FILES["student_id"]["tmp_name"], $target_dir. 'student_id'. '.' .pathinfo($student_id)['extension']);
            header("Location: student_upload_doc.php?success=Your details has submitted successfully");
            exit();
		}
    }

}else{
    header("Location: student_upload_doc.php?error=Fill All Details");
	exit();
}

?>
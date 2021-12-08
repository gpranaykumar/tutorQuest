<?php 
session_start(); 
include "../../../db_connection.php";

if(isset($_POST['aadhar_no'])){
    $aadhar_no = $_POST['aadhar_no'];

	$aadhar_front = $_FILES['aadhar_front']['name'];
	$aadhar_back = $_FILES['aadhar_back']['name'];
	$proof_doc = $_FILES['proof_doc']['name'];

    if(empty($aadhar_no)){
		
        header("Location: teacher_upload_doc.php?error=Aadhar Number is required&$aadhar_no");
	    exit();
    }else if(strlen($aadhar_no) !== 12 ){
		header("Location: teacher_upload_doc.php?error=Invalid Aadhar Number&$aadhar_no");
	    exit();
	}
    else if($aadhar_front === ""){
		header("Location: teacher_upload_doc.php?error=Aadhar Front image is required&$aadhar_no");
	    exit();
	}
	else if($aadhar_back === ""){
		header("Location: teacher_upload_doc.php?error=Aadhar Back image is required&$aadhar_no");
	    exit();
	}
	else if($proof_doc === ""){
		header("Location: teacher_upload_doc.php?error=Experience Proof (or) Highest Qulification is required&$aadhar_no");
	    exit();
	}else{
        $stuid = $_SESSION['id'];
        $uname = $_SESSION['uname'];
        $sql2 = "UPDATE teacher_data SET status='0' WHERE id='$stuid' and uname='$uname' ";
		$result2 = mysqli_query($conn, $sql2);
		if ($result2) {
            $target_dir = "../../assets/teacher_data/". $_SESSION['uname'] ."/";
			if(!is_dir($target_dir)) {
				mkdir($target_dir);
			}
            move_uploaded_file($_FILES["aadhar_front"]["tmp_name"], $target_dir. 'aadhar_front'. '.' .pathinfo($aadhar_front)['extension']);
            move_uploaded_file($_FILES["aadhar_back"]["tmp_name"], $target_dir. 'aadhar_back'. '.' .pathinfo($aadhar_back)['extension']);
            move_uploaded_file($_FILES["proof_doc"]["tmp_name"], $target_dir. 'proof_doc'. '.' .pathinfo($proof_doc)['extension']);
            header("Location: teacher_upload_doc.php?success=Your details has submitted successfully");
            exit();
		}
    }

}else{
    header("Location: teacher_upload_doc.php?error=Fill All Details");
	exit();
}

?>
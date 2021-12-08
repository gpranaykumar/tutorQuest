<?php 
session_start(); 
include "../../../db_connection.php";

	$proof_doc = $_FILES['proof_doc']['name'];

    if($proof_doc === ""){
		header("Location: organisation_upload_doc.php?error=Organisation proof doc is required&$aadhar_no");
	    exit();
	}else{
        $orgid = $_SESSION['id'];
        $uname = $_SESSION['uname'];
        $sql2 = "UPDATE organisation_data SET status='0' WHERE id='$orgid' and uname='$uname' ";
		$result2 = mysqli_query($conn, $sql2);
		if ($result2) {
            $target_dir = "../../assets/organisation_data/". $_SESSION['uname'] ."/";
			if(!is_dir($target_dir)) {
				mkdir($target_dir);
			}
            move_uploaded_file($_FILES["proof_doc"]["tmp_name"], $target_dir. 'proof_doc'. '.' .pathinfo($proof_doc)['extension']);
            header("Location: organisation_upload_doc.php?success=Your details has submitted successfully");
            exit();
		}
    }


?>
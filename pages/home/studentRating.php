<?php 
session_start(); 
include "../../db_connection.php";

if (isset($_POST['sturating']) && isset($_POST['teaId']) && isset($_SESSION['id'])){
	
    $sturating = $_POST['sturating'];
    //$stuID = $_POST['stdId'];
    //$teaID = $_POST['teaId'];
	$teaId = $_POST['teaId'];
    $stuId = $_SESSION['id'];
    
    if (empty($sturating)) {
		header("Location: studentHome.php?error=Rating Required:");
	    exit();
	}else{
        $sql = "SELECT * FROM mobile_req WHERE student_id='$stuId' and teacher_id='$teaId'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
		    $row = mysqli_fetch_assoc($result);
            if($row['rating'] === '0'){
                $sql3 = "UPDATE teacher_data SET rating=rating+'$sturating', norating=norating+1 WHERE id='$teaId'";
                $result3 = mysqli_query($conn, $sql3);
            }else{
                $rat = $row['rating'];
                $sql4 = "UPDATE teacher_data SET rating=(rating - '$rat')+'$sturating' WHERE id='$teaId'";
                $result4 = mysqli_query($conn, $sql4);
                
            }
            $sql2 = "UPDATE mobile_req SET rating='$sturating' WHERE student_id='$stuId' and teacher_id='$teaId'";
            $result2 = mysqli_query($conn, $sql2);
            if ($result2) {
                header("Location: studentHome.php?success=Rating Submitted Successfully");
                exit();
            }else{
                header("Location: studentHome.php?error=failed to submit rating=".$sturating.".stdId=".$stuId.".teacId=".$teaId);
                    exit();
            }
        }
		
	}
	
}else{
	header("Location: studentHome.php?error"."rating:".$_POST['sturating']);
	exit();
}
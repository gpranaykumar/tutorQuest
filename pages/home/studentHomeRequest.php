<?php 
include "../../db_connection.php";
session_start();
 #header("Location: student_home.php?success=Requested");
$student_id=$_SESSION['id'];
if(isset($_GET['status'])){
	
 
		$teacher_id1=$_GET['status'];
		#echo $teacher_id1." = ". $student_id;
		$sql2 = "INSERT INTO mobile_req(student_id,teacher_id,status) VALUES('$student_id','$teacher_id1','Requested')";
		$result2 = mysqli_query($conn, $sql2);
		if ($result2) {
		header("Location: studentHome.php?success=Requested");
		exit();
		}
}

?>
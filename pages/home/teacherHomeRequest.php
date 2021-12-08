<?php 
include "../../db_connection.php";
session_start();
 #header("Location: student_home.php?success=Requested");
$teacher_id=$_SESSION['id'];
if(isset($_GET['status'])){
		$arr=explode(" ",$_GET['status']);
		echo $arr[0]." =[][][][][[]=".$arr[1];
		
		$student_id=(int)($arr[0]);
		echo $teacher_id1." = ". $student_id;
		$st=$arr[1];
		$sql2 = "UPDATE mobile_req SET status='$st' WHERE student_id='$student_id' and teacher_id='$teacher_id' ";
		$result2 = mysqli_query($conn, $sql2);
		if ($result2) {
		header("Location: teacherHome.php?success=$st");
		exit();
		}
}

?>
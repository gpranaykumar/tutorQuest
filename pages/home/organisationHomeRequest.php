<?php 
include "../../db_connection.php";
session_start();
 #header("Location: student_home.php?success=Requested");
$organisation_id=$_SESSION['id'];
if(isset($_GET['status'])){
	
 
		$teacher_id1=$_GET['status'];
		#echo $teacher_id1." = ". $organisation_id;
		$sql2 = "INSERT INTO organisation_req(organisation_id,teacher_id,status) VALUES('$organisation_id','$teacher_id1','Requested')";
		$result2 = mysqli_query($conn, $sql2);
		if ($result2) {
		header("Location: organisationHome.php?success=Requested");
		exit();
		}
}

?>
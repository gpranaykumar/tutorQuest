<?php 
//session_start(); 
include "../../db_connection.php";

function delete(){
	if(isset($_POST['delete'])){
		$id=$_POST['delete'];
		$role=$_POST['role'];
		#if($role === 'student'){
			$sql="DELETE FROM teacher_data WHERE id =$id ";
			if(mysqli_query($conn, $sql)){
				$_SESSION['msg']= "Selected record deleted successfully.";
				$_SESSION['alert']="alert alert-danger";
			}
			header("location:home.php");
			
		#}
		
	}
}

if(isset($_GET['uname']) && isset($_GET['status']) && $_GET['status']==='A' && isset($_GET['rol']) && $_GET['rol']==='S'){
	$uname=$_GET['uname'];
	$sql2 = "UPDATE student_data SET status='1' WHERE uname='$uname'";
	$result2 = mysqli_query($conn, $sql2);
	if ($result2) {
	header("Location: home.php?success=Approved Successfully&flag=S");
	exit();
	}
}
if(isset($_GET['uname']) && isset($_GET['status']) && $_GET['status']==='R' && isset($_GET['rol']) && $_GET['rol']==='S'){
	$uname=$_GET['uname'];
	$sql2 = "UPDATE student_data SET status='2' WHERE uname='$uname'";
	$result2 = mysqli_query($conn, $sql2);
	if ($result2) {
	header("Location: home.php?success=Rejected Successfully&flag=S");
	exit();
	}
}

if(isset($_GET['uname']) && isset($_GET['status']) && $_GET['status']==='B' && isset($_GET['rol']) && $_GET['rol']==='S'){
	$uname=$_GET['uname'];
	$sql2 = "UPDATE student_data SET status='3' WHERE uname='$uname'";
	$result2 = mysqli_query($conn, $sql2);
	if ($result2) {
	header("Location: home.php?success=Blocked Successfully&flag=S");
	exit();
	}
}

if(isset($_GET['uname']) && isset($_GET['status']) && $_GET['status']==='UNB' && isset($_GET['rol']) && $_GET['rol']==='S'){
	$uname=$_GET['uname'];
	$sql2 = "UPDATE student_data SET status='0' WHERE uname='$uname'";
	$result2 = mysqli_query($conn, $sql2);
	if ($result2) {
	header("Location: home.php?success=Unblocked Successfully&flag=S");
	exit();
	}
}




//Teachers
if(isset($_GET['uname']) && isset($_GET['status']) && $_GET['status']==='A' && isset($_GET['rol']) && $_GET['rol']==='T'){
	$uname=$_GET['uname'];
	$sql2 = "UPDATE teacher_data SET status='1' WHERE uname='$uname'";
	$result2 = mysqli_query($conn, $sql2);
	if ($result2) {
	header("Location: home.php?success=Approved Successfully&flag=T");
	exit();
	}
}
if(isset($_GET['uname']) && isset($_GET['status']) && $_GET['status']==='R' && isset($_GET['rol']) && $_GET['rol']==='T'){
	$uname=$_GET['uname'];
	$sql2 = "UPDATE teacher_data SET status='2' WHERE uname='$uname'";
	$result2 = mysqli_query($conn, $sql2);
	if ($result2) {
	header("Location: home.php?success=Rejected Successfully&flag=T");
	exit();
	}
}

if(isset($_GET['uname']) && isset($_GET['status']) && $_GET['status']==='B' && isset($_GET['rol']) && $_GET['rol']==='T'){
	$uname=$_GET['uname'];
	$sql2 = "UPDATE teacher_data SET status='3' WHERE uname='$uname'";
	$result2 = mysqli_query($conn, $sql2);
	if ($result2) {
	header("Location: home.php?success=Blocked Successfully&flag=T");
	exit();
	}
}

if(isset($_GET['uname']) && isset($_GET['status']) && $_GET['status']==='UNB' && isset($_GET['rol']) && $_GET['rol']==='T'){
	$uname=$_GET['uname'];
	$sql2 = "UPDATE teacher_data SET status='0' WHERE uname='$uname'";
	$result2 = mysqli_query($conn, $sql2);
	if ($result2) {
	header("Location: home.php?success=Unblocked Successfully&flag=T");
	exit();
	}
}



//Organisation
if(isset($_GET['uname']) && isset($_GET['status']) && $_GET['status']==='A' && isset($_GET['rol']) && $_GET['rol']==='O'){
	$uname=$_GET['uname'];
	$sql2 = "UPDATE organisation_data SET status='1' WHERE uname='$uname'";
	$result2 = mysqli_query($conn, $sql2);
	if ($result2) {
	header("Location: home.php?success=Approved Successfully&flag=O");
	exit();
	}
}
if(isset($_GET['uname']) && isset($_GET['status']) && $_GET['status']==='R' && isset($_GET['rol']) && $_GET['rol']==='O'){
	$uname=$_GET['uname'];
	$sql2 = "UPDATE organisation_data SET status='2' WHERE uname='$uname'";
	$result2 = mysqli_query($conn, $sql2);
	if ($result2) {
	header("Location: home.php?success=Rejected Successfully&flag=O");
	exit();
	}
}

if(isset($_GET['uname']) && isset($_GET['status']) && $_GET['status']==='B' && isset($_GET['rol']) && $_GET['rol']==='O'){
	$uname=$_GET['uname'];
	$sql2 = "UPDATE organisation_data SET status='3' WHERE uname='$uname'";
	$result2 = mysqli_query($conn, $sql2);
	if ($result2) {
	header("Location: home.php?success=Blocked Successfully&flag=O");
	exit();
	}
}

if(isset($_GET['uname']) && isset($_GET['status']) && $_GET['status']==='UNB' && isset($_GET['rol']) && $_GET['rol']==='O'){
	$uname=$_GET['uname'];
	$sql2 = "UPDATE organisation_data SET status='0' WHERE uname='$uname'";
	$result2 = mysqli_query($conn, $sql2);
	if ($result2) {
	header("Location: home.php?success=Unblocked Successfully&flag=O");
	exit();
	}
}


?>
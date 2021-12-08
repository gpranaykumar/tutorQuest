<?php 
session_start(); 
include "../../db_connection.php";
?>
<html lang="en">

<head>
	<?php $base=" ADMIN";include "head.php"?>
</head>

<body>
	<?php include "header.php"?>
	</br>
	<?php if(isset($_SESSION['uname']) && isset($_SESSION['role']) && $_SESSION['role']==='admin' ){ ?> 
	<div class="container-fluid p-2">
		<div class="row justify-content-center">
			<h1>Admin</h1>
			<div class="container-fluid">
				<?php if(isset($_GET['flag'])){
					if($_GET['flag'] === "S"){
						$flag = "student";
					}else if($_GET['flag'] === "T"){
						$flag = "teacher";
					}else if($_GET['flag'] === "O"){
						$flag = "organisation";
					}else{
						$flag="all";
					}
				}else{ $flag="all"; }	?>
				<?php
					if(isset($_POST['allBtn'])) {
						$flag = "all";
					}
					if(isset($_POST['teacehrBtn'])) {
						$flag = "teacher";
					}
					if(isset($_POST['studentBtn'])) {
						$flag = "student";
					}
					if(isset($_POST['organisationBtn'])) {
						$flag = "organisation";
					}
					if(isset($_GET['flag'])){
						unset($_GET['flag']);
					}
					if(isset($_GET['success'])){
						unset($_GET['success']);
					}
				?>
				<div class="row justify-content-center">
					<form method="post">
						<input type="submit" name="allBtn"
								value="All" class="btn2"/>
						<input type="submit" name="teacehrBtn"
								value="Teacher" class="btn2"/>
						
						<input type="submit" name="studentBtn"
								value="Student" class="btn2"/>
						<input type="submit" name="organisationBtn"
						value="Organisation" class="btn2"/>
					</form>
				</div>
			</div>
			<?php if( $flag === "all"){
				include "studentAccReq.php";
				include "studentData.php";
				include "teacherAccReq.php";
				include "teacherData.php";
				include "organisationAccReq.php";
				include "organisationData.php";
			 }else if( $flag === "student"){
				include "studentAccReq.php";
				include "studentData.php";
			 }else if ($flag === "teacher"){
				include "teacherAccReq.php";
				include "teacherData.php";
			 }else if ($flag === "organisation"){
				include "organisationAccReq.php";
				include "organisationData.php";
			 } ?>
		</div>
		<?php }else{ ?>
			<div class="row justify-content-center">
				</br>
				<h3> 404 - Page Not Found </h3>
			</div>
		<?php } ?>
	</div>
	
</body>
<script type="text/javascript">
   jQuery(function($){
	$('.table').footable();
	});
</script>
</html>
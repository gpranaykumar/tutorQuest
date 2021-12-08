<?php 
session_start();
include "../../db_connection.php";

if (isset($_SESSION['id']) && isset($_SESSION['uname']) && $_SESSION['Accstatus'] === '1') {

 ?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
	<?php $base="Teacher Home"; include "head.php"; ?>
</head>
<body>

<header>
	<?php $base='teacherHome'; include "header.php";  ?>
</header>
<div>
	<div class="container">
			</br>
          <div class="row justify-content-center">
               <h3><u>Hello, <?php echo ucfirst($_SESSION['name']); ?></u>&#128512</h3>
          </div>
		  </br>
		  <div class="row justify-content-center">
               <h1>Student's Data</h1>
          </div>
    </div>
	<div class="container ">
		<div class="row justify-content-center">
			<div class="col-md-12 table-responsive-sm ">
			<?php if (isset($_GET['success'])) { ?>
				   <p class="text-success"><?php echo $_GET['success']; ?></p>
			<?php unset($_GET['success']);} ?>
				<table class="table table-bordered"  data-sorting="true">
					<thead>
						<tr>
							<th >Name</th>
							<th >Email</th>
							<th>Grade</th>
							<th>Number</th>
							<th>Parent Number</th>
							<th>Request</th>
							<th>Link</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$teacher_id=$_SESSION['id'];
						#search request data 
						$sql_req=" SELECT * FROM mobile_req where teacher_id=$teacher_id";
						$result = mysqli_query($conn, $sql_req);
						while($row=$result->fetch_assoc()){
							#print_r($row);
									$student_id=$row['student_id'];
									$sql_stu=" SELECT * FROM student_data WHERE id=$student_id ";
									$result_stu = mysqli_query($conn, $sql_stu);
									while($row_stu=$result_stu->fetch_assoc()){
									 ?>
							<tr>
								<td> <?= $row_stu['name']; ?></td>
								<td> <?= $row_stu['email']; ?></td>
								<td> <?= $row_stu['grade']; ?></td>
								<td> <?= $row_stu['number']; ?></td>
								<td> <?= $row_stu['pnumber']; ?></td>
								
								<?php 
								
									if($row['status']=== 'Approved'){ ?>
										<td class="text-success"> Approved </td>
										<td><?php /* 
											<form action="teacherClassLink.php" method="post">
												<?php $_SESSION['stdID']=$row_stu['id'];?>
												<input type="text" name="classLink" id="classLink" placeholder="Class Link" class="form-control" onchange="updateInput(this.value)">
												<button type="submit" class="btn2 m-1">Submit</button>
											</form>
											*/?>
											<form name="form" action="teacherClassLink.php"method="post">
												<p> <?php if($row['classLink']){ echo $row['classLink']; }?></p>
												<input type="text" name="classLink" id='classLink' placeholder=<?php if($row['classLink']){ echo $row['classLink']; }else { echo "ClassLink";}?> class="form-control">
												<input type="text" name="stdId" id="stdId" value=<?php echo $row_stu['id'];?> class="d-none" >
												<button type="submit" class="btn2">Upload Link</button>
											</form>
											<?php /*
											<a href="teacherClassLink.php?link=<?php if(isset($_POST['classLink'])) {  echo $_POST['link'].'&'; }else{ echo '&'; }?>stdId=<?php echo $row_stu['id'];?>&teaId=<?php echo $_SESSION['id']; ?>" class="btn btn2" title="submit" >Submit</a>
											*/?>

											</td>
									<?php }else if($row['status']=== 'Rejected'){ ?>
										<td class="text-danger"> <?= $row['status']; ?></td>
									<?php } else { ?>
										<td> 
											<a href="teacherHomeRequest.php?status=<?= strval($row_stu['id'])." Approved"; ?>" class="btn btn2" title="Approve" >Approve</a>
											<a href="teacherHomeRequest.php?status=<?= strval($row_stu['id'])." Rejected"; ?>" class="btn btn2" title="Reject" >Reject</a>
										</td>
									<?php } ?>
							
							</tr>
						<?php }
						} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<?php $teacher_id=$_SESSION['id']; include "teacherHomeOrganisation.php"; ?>
	
</div>
	
	 
<?php include "footer.php"; ?> 
</body>
<script type="text/javascript">
   jQuery(function($){
	$('.table').footable();
	});
	function updateInput(lin){
    	document.getElementById("classLink").value = lin;
	}
    </script>
</html>



<?php 
}else if($_SESSION['Accstatus'] === '2'){
	header("Location: teacher_upload/teacher_upload_doc.php");

}else if($_SESSION['Accstatus'] === '4'){
	header("Location: teacher_otp/teacherOtp.php");

}else{
     header("Location: ../../../index.php");
     exit();
}
 ?>
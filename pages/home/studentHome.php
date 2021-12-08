<?php 
session_start();
include "../../db_connection.php";

if (isset($_SESSION['id']) && isset($_SESSION['uname']) && $_SESSION['Accstatus'] === '1') {

 ?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
	<?php $base="Student Home";include "head.php"; ?>
</head>
<body>

<header>
	<?php $base='studentHome'; include "header.php";  ?>
</header>
 
	<div class="container">
			</br>
          <div class="row justify-content-center">
               <h3><u>Hello, <?php echo ucfirst($_SESSION['name']); ?></u>&#128512</h3>
          </div>
		  </br>
		  <div class="row justify-content-center">
               <h1>Teacher's Data</h1>
          </div>
    </div>
	<div class="container-fluid ">
		<div class="row justify-content-center">
			<div class="col-md-12 table-responsive-sm ">
			<?php if (isset($_GET['success'])) { ?>
				   <p class="text-success"><?php echo $_GET['success']; ?></p>
			<?php unset($_GET['success']);} ?>
				<table class="table table-bordered"  data-sorting="true">
					<thead>
						<tr>
							<th >Name</th>
							<th>Subject</th>
							<th>Experience</th>
							<th>Skills</th>
							<th >Price/hr</th>
							<th>Number</th>
							<th>Link</th>
							<th>Rating</th>
							<th>No of Rating's</th>
							<th>Give Rating</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						#display teacher data 
						$sql=" SELECT * FROM teacher_data WHERE status=1";
						$result = mysqli_query($conn, $sql);
						while($row=$result->fetch_assoc()){
							#print_r($row); ?>
							<tr>
								<td> <?= $row['name']; ?></td>
								<td> <?= $row['subject']; ?></td>
								<td> <?= $row['experience']; ?></td>
								<td> <?= $row['skills']; ?></td>
								<td> <?= $row['price']; ?></td>
								
								<?php 
								$student_id=$_SESSION['id'];
								$teacher_id=$row['id'];
								$sql_req="SELECT * FROM mobile_req where student_id=$student_id and teacher_id=$teacher_id ";
									$result_req = mysqli_query($conn, $sql_req);
									$row_req=$result_req->fetch_assoc();
									if($row_req['status']=== 'Approved'){ ?>
										<td> <?= $row['number']; ?></td>
									<?php }else if($row_req['status']=== 'Rejected'){ ?>
										<td class="text-danger"> <?= $row_req['status']; ?></td>
									<?php }else if($row_req['status']=== 'Requested'){ ?>
										<td class="text-success"> <?= $row_req['status']; ?></td>
									<?php } else { ?>
										<td> 
												<a href="studentHomeRequest.php?status=<?= $row['id']; ?>" class="btn btn1" title="Request" >Request</a>
										</td>
									<?php } ?>
									<td> <?= $row_req['classLink']; ?></td>
									<td> <?= $row['rating']; ?></td>
									<td> <?= $row['norating']; ?></td>
									<?php 
									if($row_req['status']=== 'Approved'){ ?>
										<td>
											<form name="form" action="studentRating.php"method="post">
												<input type="number" name="sturating" id='sturating' 
													placeholder=<?php if($row_req['rating']){ echo $row_req['rating']; }else { echo "Rating";}?> 
													class="form-control" min="1" max="5" required>
												<input type="text" name="teaId" id="teaId" value=<?php echo $row_req['teacher_id'];?> class="d-none" >
												<button type="submit" class="btn2">Submit</button>
											</form>
										</td>
									<?php }else{?>
										<td>-</td>
									<?php }?>
							
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	
	
	 
<?php include "footer.php"; ?> 
</body>
<script type="text/javascript">
   jQuery(function($){
	$('.table').footable();
	});
    </script>
</html>



<?php 
}else if($_SESSION['Accstatus'] === '2'){
	header("Location: student_upload/student_upload_doc.php");
}else if($_SESSION['Accstatus'] === '4'){
	header("Location: student_otp/studentOtp.php");

}else{
     header("Location: ../../index.php");
     exit();
}
 ?>
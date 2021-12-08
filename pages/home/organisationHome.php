<?php 
session_start();
include "../../db_connection.php";

if (isset($_SESSION['id']) && isset($_SESSION['uname']) && $_SESSION['Accstatus'] === '1') {

 ?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
	<?php $base="Organisation Home";include "head.php"; ?>
</head>
<body>

<header>
	<?php $base='organisation'; include "header.php";  ?>
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
                            <th >Gender</th>
							<th>Subject</th>
							<th>Experience</th>
							<th>Skills</th>
							<th>Price/Month</th>
							<th>Number</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						#display teacher data 
						$sql=" SELECT * FROM teacher_data WHERE status=1 ";
						$result = mysqli_query($conn, $sql);
						while($row=$result->fetch_assoc()){
							#print_r($row); ?>
							<tr>
								<td> <?= $row['name']; ?></td>
                                <td> <?= $row['email']; ?></td>
                                <td> <?php if($row['gender']==="1"){ echo "Male";}else{ echo "Female";} ?></td>
								<td> <?= $row['subject']; ?></td>
								<td> <?= $row['experience']; ?></td>
								<td> <?= $row['skills']; ?></td>
								<td> <?= $row['priceOrg']; ?></td>
								<?php 
								$organisation_id=$_SESSION['id'];
								$teacher_id=$row['id'];
								$sql_req="SELECT * FROM organisation_req where organisation_id=$organisation_id and teacher_id=$teacher_id ";
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
												<a href="organisationHomeRequest.php?status=<?= $row['id']; ?>" class="btn btn1" title="Request" >Request</a>
										</td>
									<?php } ?>
							
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
	header("Location: organisation_upload/organisation_upload_doc.php");
}else if($_SESSION['Accstatus'] === '4'){
	header("Location: org_otp/orgOtp.php");

}else{
     header("Location: ../../index.php");
     exit();
}
 ?>
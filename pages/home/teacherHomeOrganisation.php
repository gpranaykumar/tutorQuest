<div class="container">
		  </br>
		  <div class="row justify-content-center">
               <h1>Organisation's Data</h1>
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
							<th>Number</th>
							<th>State</th>
							<th>City</th>
							<th>Address</th>
                            <th>Request</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$teacher_id=$_SESSION['id'];
						#search request data 
						$sql_req=" SELECT * FROM organisation_req where teacher_id=$teacher_id";
						$result = mysqli_query($conn, $sql_req);
						while($row=$result->fetch_assoc()){
							#print_r($row);
									$organisation_id=$row['organisation_id'];
									$sql_stu=" SELECT * FROM organisation_data WHERE id=$organisation_id ";
									$result_stu = mysqli_query($conn, $sql_stu);
									while($row_stu=$result_stu->fetch_assoc()){
									 ?>
							<tr>
								<td> <?= $row_stu['name']; ?></td>
								<td> <?= $row_stu['email']; ?></td>
								<td> <?= $row_stu['number']; ?></td>
                                <td> <?= $row_stu['state']; ?></td>
								<td> <?= $row_stu['city']; ?></td>
                                <td> <?= $row_stu['address']; ?></td>
								
								<?php 
								
									if($row['status']=== 'Approved'){ ?>
										<td class="text-success"> Approved </td>
									<?php }else if($row['status']=== 'Rejected'){ ?>
										<td class="text-danger"> <?= $row['status']; ?></td>
									<?php } else { ?>
										<td> 
											<a href="teacherHomeOrganisationRequest.php?status=<?= strval($row_stu['id'])." Approved"; ?>" class="btn btn2" title="Approve" >Approve</a>
											<a href="teacherHomeOrganisationRequest.php?status=<?= strval($row_stu['id'])." Rejected"; ?>" class="btn btn2" title="Reject" >Reject</a>
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
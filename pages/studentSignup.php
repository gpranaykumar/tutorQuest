<!DOCTYPE html>
<html lang="en">
<head>
  <?php $base=" Sign Up"; include "head.php"; ?>
</head>
<body>

<header>
	<?php $base='signup'; include "header.php"; 
	include "checkLoginStatus.php";
	?>
</header>
	<div class="container-fluid   ">
		<div class="form_custom  my-4 mx-2 mx-md-5">
		
			<div class="container p-5">
				<div class="row justify-content-center no-gutters" >
					
					<div class="col-md-5">
						<form action="studentSignupCheck.php" method="post" enctype="multipart/form-data">
							<h2>Student Sign Up</h2>
							<?php if (isset($_GET['error'])) { ?>
								<p class="text-danger"><?php echo $_GET['error']; ?></p>
							<?php } ?>
							
							<?php if (isset($_GET['success'])) { ?>
								   <p class="text-success"><?php echo $_GET['success']; ?></p>
							<?php } ?>

							  <label>Full Name</label>
							  <?php if (isset($_GET['name'])) { ?>
								   <input type="text" 
										  name="name" 
										  placeholder="Name"
										  value="<?php echo $_GET['name']; ?>" class="form-control"><br>
							  <?php }else{ ?>
								   <input type="text" 
										  name="name" 
										  placeholder="Name" class="form-control"><br>
							  <?php }?>

							  <label>User Name</label>
							  <?php if (isset($_GET['uname'])) { ?>
								   <input type="text" 
										  name="uname" 
										  placeholder="User Name"
										  value="<?php echo $_GET['uname']; ?>" class="form-control"><br>
							  <?php }else{ ?>
								   <input type="text" 
										  name="uname" 
										  placeholder="User Name" class="form-control"><br>
							  <?php }?>

							  <label>E-mail</label>
							  <?php if (isset($_GET['email'])) { ?>
								   <input type="email" 
										  name="email" 
										  placeholder="Email"
										  value="<?php echo $_GET['email']; ?>" class="form-control"><br>
							  <?php }else{ ?>
								   <input type="text" 
										  name="email" 
										  placeholder="Email" class="form-control"><br>
							  <?php }?>

							<label>Gender</label>
							  <?php if (isset($_GET['gender'])) { ?>
								   <input type="text" 
										  name="gender" 
										  placeholder="Male (or) Female"
										  value="<?php echo $_GET['gender']; ?>" class="form-control"><br>
							  <?php }else{ ?>
								   <input type="text" 
										  name="gender" 
										  placeholder="Male (or) Female" class="form-control"><br>
							  <?php }?>

							<label>Password</label>
							<input type="password" 
									 name="password" 
									 placeholder="Password" class="form-control"><br>

							  <label>Re Password</label>
							  <input type="password" 
									 name="re_password" 
									 placeholder="Re_Password"  class="form-control"><br>

							  <label>Board</label>
							  <?php if (isset($_GET['board'])) { ?>
								   <input type="text" 
										  name="board" 
										  placeholder="ex: SSC, CBSE, etc ..."
										  value="<?php echo $_GET['board']; ?>" class="form-control"><br>
							  <?php }else{ ?>
								   <input type="text" 
										  name="board" 
										  placeholder="ex: SSC, CBSE, etc..." class="form-control"><br>
							  <?php }?>

							  <label>Grade</label>
							  <?php if (isset($_GET['grade'])) { ?>
								   <input type="text" 
										  name="grade" 
										  placeholder="ex: 8th,10th,12th,B.tech 1st Year, etc..."
										  value="<?php echo $_GET['grade']; ?>" class="form-control"><br>
							  <?php }else{ ?>
								   <input type="text" 
										  name="grade" 
										  placeholder="ex: 8th,10th,12th,B.tech 1st Year, etc..." class="form-control"><br>
							  <?php }?>

							<label>Student Number</label>
							  <?php if (isset($_GET['number'])) { ?>
								   <input type="text" 
										  name="number" 
										  placeholder="+91 **********"
										  value="<?php echo $_GET['number']; ?>" class="form-control"><br>
							  <?php }else{ ?>
								   <input type="text" 
										  name="number" 
										  placeholder="+91 **********" 
										  value="+91" class="form-control"><br>
							  <?php }?>

							  <label>Parents's Number</label>
							  <?php if (isset($_GET['pnumber'])) { ?>
								   <input type="text" 
										  name="pnumber" 
										  placeholder="+91 **********"
										  value="<?php echo $_GET['pnumber']; ?>" class="form-control"><br>
							  <?php }else{ ?>
								   <input type="text" 
										  name="pnumber" 
										  placeholder="+91 **********" 
										  value="+91" class="form-control"><br>
							  <?php }?>
								
							  <label>State</label>
							  <?php if (isset($_GET['state'])) { ?>
								   <input type="text" 
										  name="state" 
										  placeholder="ex: TS, AP, etc ..."
										  value="<?php echo $_GET['state']; ?>" class="form-control"><br>
							  <?php }else{ ?>
								   <input type="text" 
										  name="state" 
										  placeholder="ex: TS, AP, etc ..." 
										class="form-control"><br>
							  <?php }?>
							  
							  <label>City</label>
							  <?php if (isset($_GET['city'])) { ?>
								   <input type="text" 
										  name="city" 
										  placeholder="ex: HYD, etc ..."
										  value="<?php echo $_GET['city']; ?>" class="form-control"><br>
							  <?php }else{ ?>
								   <input type="text" 
										  name="city" 
										  placeholder="ex: HYD, etc ..." 
										class="form-control"><br>
							  <?php }?>

							  <label>Aadhar Number</label>
							  <?php if (isset($_GET['aadhar_no'])) { ?>
								   <input type="text" 
										  name="aadhar_no" 
										  placeholder="************"
										  value="<?php echo $_GET['aadhar_no']; ?>" class="form-control"><br>
							  <?php }else{ ?>
								   <input type="text" 
										  name="aadhar_no" 
										  placeholder="***********" 
										class="form-control"><br>
							  <?php }?>

							  <label>Aadhar Card Front Image</label>
							  <input type="file" name="aadhar_front" class="form-control" /><br>
							  <label>Aadhar Card Back Image</label>
							  <input type="file" name="aadhar_back" class="form-control" /><br>

							  <label>Student ID Card</label>
							  <input type="file" name="student_id" class="form-control"/><br>

							<button type="submit" class="btn1">Sign Up</button>
							</br>
							<p class=" pt-3">Already have an account?<a href="studentLogin.php" class="ca">Click here</a></p>
							
						</form>
					</div>
				
				</div>
			</div>
			
		</div>
	</div>
	
	
	<?php include "footer.php"; ?> 

</body>
</html>

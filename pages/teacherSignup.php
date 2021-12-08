<!DOCTYPE html>
<html lang="en">
<head>
  <title>STC - Teacher Sign Up</title>
  <?php include "head.php"; ?>
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
						<form action="teacherSignupCheck.php" method="post" enctype="multipart/form-data">
							<h2>Teacher Sign Up</h2>
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
									 
							<label>Subject Teaching</label>
							  <?php if (isset($_GET['subject'])) { ?>
								   <input type="text" 
										  name="subject" 
										  placeholder="subject(ex: English, PPS, Science, etc..)"
										  value="<?php echo $_GET['subject']; ?>" class="form-control"><br>
							  <?php }else{ ?>
								   <input type="text" 
										  name="subject" 
										  placeholder="subject(ex: English, PPS, Science, etc..)" class="form-control"><br>
							  <?php }?>
							<label>Experience</label>
							  <?php if (isset($_GET['experience'])) { ?>
								   <input type="text" 
										  name="experience" 
										  placeholder="ex: 1 year, 6 months,etc..."
										  value="<?php echo $_GET['experience']; ?>" class="form-control"><br>
							  <?php }else{ ?>
								   <input type="text" 
										  name="experience" 
										  placeholder="ex: 1 year, 6 months ,etc..." class="form-control"><br>
							  <?php }?>
							<label>Skills</label>
							<?php if (isset($_GET['skill'])) { ?>
								<input type="text" 
										name="skill"
										value="<?php echo $_GET['skill']; ?>" class="form-control"><br>
							<?php }else{ ?>
								<input type="text" 
										name="skill" 
										placeholder="" class="form-control"><br>
							<?php }?>
							<label>Price per hour for Students's</label>
							  <?php if (isset($_GET['price'])) { ?>
								   <input type="text" 
										  name="price" 
										  placeholder="ex:100rs, 200rs, etc..."
										  value="<?php echo $_GET['price']; ?>" class="form-control"><br>
							  <?php }else{ ?>
								   <input type="text" 
										  name="price" 
										  placeholder="ex:100rs, 200rs, etc..." class="form-control"><br>
							  <?php }?>
							<label>Price per month For Organisation</label>
							  <?php if (isset($_GET['priceOrg'])) { ?>
								   <input type="text" 
										  name="priceOrg" 
										  placeholder="ex:5000rs, 10000rs, etc..."
										  value="<?php echo $_GET['priceOrg']; ?>" class="form-control"><br>
							  <?php }else{ ?>
								   <input type="text" 
										  name="priceOrg" 
										  placeholder="ex:5000rs, 10000rs, etc..." class="form-control"><br>
							  <?php }?>
							<label>Contact Number</label>
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

							  <label>Experience Proof (or) Highest Qulification</label>
							  <input type="file" name="proof_doc" class="form-control"/><br>

							<button type="submit" class="btn1">Sign Up</button>
							</br>
							<p class=" pt-3">Already have an account?<a href="teacherLogin.php" class="ca">Click here</a></p>
							
						</form>
					</div>
				
				</div>
			</div>
			
		</div>
	</div>


<?php include "footer.php"; ?>
</body>
</html>

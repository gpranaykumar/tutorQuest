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
						<form action="organisationSignupCheck.php" method="post" enctype="multipart/form-data">
							<h2>Organisation Sign Up</h2>
							<?php if (isset($_GET['error'])) { ?>
								<p class="text-danger"><?php echo $_GET['error']; ?></p>
							<?php } ?>
							
							<?php if (isset($_GET['success'])) { ?>
								   <p class="text-success"><?php echo $_GET['success']; ?></p>
							<?php } ?>

							  <label>Organisation Name</label>
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
							  <label>Email</label>
							  <?php if (isset($_GET['email'])) { ?>
								   <input type="text" 
										  name="email" 
										  placeholder="Email"
										  value="<?php echo $_GET['email']; ?>" class="form-control"><br>
							  <?php }else{ ?>
								   <input type="text" 
										  name="email" 
										  placeholder="Email" class="form-control"><br>
							  <?php }?>
							<label>Password</label>
							<input type="password" 
									 name="password" 
									 placeholder="Password" class="form-control"><br>

							  <label>Re Password</label>
							  <input type="password" 
									 name="re_password" 
									 placeholder="Re_Password"  class="form-control"><br>
							
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
							<label>State</label>
							  <?php if (isset($_GET['state'])) { ?>
								   <input type="text" 
										  name="state" 
										  placeholder="State"
										  value="<?php echo $_GET['state']; ?>" class="form-control"><br>
							  <?php }else{ ?>
								   <input type="text" 
										  name="state" 
										  placeholder="state" class="form-control"><br>
							  <?php }?>
							<label>City</label>
							  <?php if (isset($_GET['city'])) { ?>
								   <input type="text" 
										  name="city" 
										  placeholder="City"
										  value="<?php echo $_GET['city']; ?>" class="form-control"><br>
							  <?php }else{ ?>
								   <input type="text" 
										  name="city" 
										  placeholder="City" class="form-control"><br>
							  <?php }?>
							  <label>Address</label>
							  <?php if (isset($_GET['address'])) { ?>
								   <input type="text" 
										  name="address" 
										  placeholder="Address"
										  value="<?php echo $_GET['address']; ?>" class="form-control"><br>
							  <?php }else{ ?>
								   <input type="text" 
										  name="address" 
										  placeholder="Address" class="form-control"><br>
							  <?php }?>
							<label>Organisation proof doc</label>
							  <input type="file" name="proof_doc" class="form-control" /><br>
							<button type="submit" class="btn1">Sign Up</button>
							</br>
							<p class=" pt-3">Already have an account?<a href="organisationLogin.php" class="ca">Click here</a></p>
							
						</form>
					</div>
				
				</div>
			</div>
			
		</div>
	</div>
	
	
	<?php include "footer.php"; ?> 

</body>
</html>

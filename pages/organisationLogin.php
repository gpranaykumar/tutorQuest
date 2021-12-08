<!DOCTYPE html>
<html lang="en">
<head>
	<?php $base=" Login"; include "head.php"; ?>
</head>
<body>

<header>
	<?php $base='login'; include "header.php";  
	include "checkLoginStatus.php";
	?>
</header>
	<div class="container-fluid   ">
		<div class="form_custom  my-4 mx-2 mx-md-5">
		
			<div class="container p-5">
				<div class="row justify-content-center no-gutters" >
					<div class="col-md-5">
						<img src="../assets/img/home_organisation.svg" class=" img-fluid center" alt="">
					</div>
					<div class="col-md-5">
						<form action="organisationLoginCheck.php" method="post">
							<h2>Organisation Login</h2>
							<?php if (isset($_GET['error'])) { ?>
								<p class="text-danger"><?php echo $_GET['error']; ?></p>
							<?php } ?>
							<?php if (isset($_GET['success'])) { ?>
								<p class="text-success"><?php echo $_GET['success']; ?></p>
							<?php } ?>
							<label>User Name</label>
							<input type="text" name="uname" placeholder="User Name" class="form-control"><br>

							<label>Password</label>
							<input type="password" name="password" placeholder="Password" class="form-control"><br>

							<button type="submit" class="btn1">Login</button>
							</br>
							<p class=" pt-3">Don't have an account? <a href="organisationSignup.php" class="ca">Register here</a></p>
							<p class="">Forgot Password? <a href="home/org_reset_password/orgReset.php" class="ca">Reset here</a></p>
							
						</form>
					</div>
				
				</div>
			</div>
			
		</div>
	</div>
	
	
	<?php include "footer.php"; ?> 

</body>
</html>

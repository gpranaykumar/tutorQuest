
<!DOCTYPE html>
<html lang="en">
<head>
	<?php $base="Admin Login"; include "head.php"; ?>
</head>
<body>

<header>
	<?php $base='Admin login'; include "header.php";	?>
</header>
<?php
	if(isset($_SESSION['role'])){
		if($_SESSION['role'] === 'admin'){
			header("Location: pages/admin/home.php");
		}else{
			session_unset();
			session_destroy();
		}
	}
?>
	<div class="container-fluid   ">
		<div class="form_custom  my-4 mx-2 mx-md-5">
		
			<div class="container p-5">
				<div class="row justify-content-center no-gutters" >
					<div class="col-md-5">
						<img src="assets/img/admin.svg" class=" img-fluid center" alt="">
					</div>
					<div class="col-md-5">
						<form action="adminLoginCheck.php" method="post">
							<h2>Admin Login</h2>
							<?php if (isset($_GET['error'])) { ?>
								<p class="text-danger"><?php echo $_GET['error']; ?></p>
							<?php } ?>
							<label>User Name</label>
							<input type="text" name="uname" placeholder="User Name" class="form-control"><br>

							<label>Password</label>
							<input type="password" name="password" placeholder="Password" class="form-control"><br>

							<button type="submit" class="btn1">Login</button>
							</br>
							
						</form>
					</div>
				
				</div>
			</div>
			
		</div>
	</div>
	
	
	<footer class="p-4 bg-dark text-white text-center position-relative">
      <div class="container">
        <p class="lead">Copyright &copy; 2021 | Mini Project B54 | CMRCET</p>
      </div>
    </footer>

</body>
</html>

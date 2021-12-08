<?php 
session_start();
include "../../../db_connection.php";
if(isset($_SESSION['reset']) && $_SESSION['reset'] === '1'){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="../../../assets/img/icon.png"  sizes="16x16">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="../../../assets/bootstrap/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../../../assets/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../../style.css" />
    <link rel="stylesheet" type="text/css" href="../../../assets/styles/styles.css">
    <link rel="stylesheet" href="../../../assets/styles/form.css" />

    <title>Tutor Quest - Reset Password</title>
</head>
<body>

<header>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark py-3 fixed-top">
	<!-- <img class="logo"src="../../assets/img/logo" href="#" alt="logo" height="50"    > -->
	<a class="nav-link text-white" href="#"><h4>Tutor <span class="text-warning">Quest</span></h4></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
    <ul class="navbar-nav  >
      <li class="nav-item">
        <a class="nav-link " href="../../../index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../../index.php#aboutus">About us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link "href="../../../index.php#contactus">Contact us</a>
      </li>	
	  <li class="nav-item">
		<a class="nav-link "href="../../../index.php#account">
		  Account
		</a>
	  </li>  
    </ul>
  </div>  
	</nav>
</header>
 
	<div class="container">
			</br>
            </br>
		  <div class="row justify-content-center">
              <div class="col-md-5">
                <h1>Reset Password</h1>
                <?php if (isset($_GET['error'])) { ?>
                    <p class="text-danger"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <?php if (isset($_GET['success'])) { ?>
                        <p class="text-success"><?php echo $_GET['success']; ?></p>
                <?php } ?>
                <form action="passwordFun.php" method="post">
                    <hr/>
                        <label for="password"><strong>Password</strong></label>
                        <input type="text" class="form-control" id="password" placeholder="Enter Password" name="password" required>
                </br>
                        <label for="re_password"><strong>Confirm Password</strong></label>
                        <input type="text" class="form-control" id="re_password" placeholder="Enter Confirm Password" name="re_password" required>
                    <button type="submit" class="btn1" >Reset</button>
                </form>
                </div>
          </div>
    </div>
	 
    <?php include "../footer.php"; ?> 
</body>
</html>
<?php }else{ 
    header("Location: studentReset.php?error=unknown error occured");
}?>
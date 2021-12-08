<?php 
session_start();
include "../../../db_connection.php";

if (isset($_SESSION['id']) && isset($_SESSION['uname']) && $_SESSION['Accstatus'] === '2') {
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

    <title>Tutor Quest - Upload Documents</title>
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
      <?php 
			if (isset($_SESSION['id']) && isset($_SESSION['uname']) && isset($_SESSION['role'])) {
				?>
				<?php if($_SESSION['role']=== 'student'){ ?>
				 <li class="nav-item">
					<a class="nav-link text-sucess active" href="../studentHome.php">Dashboard</a>
				</li>
				<?php }?>
				<li class="nav-item">
					<a class="nav-link text-danger" href="../../../logout.php">Logout</a>
				</li>
			<?php }else{

			 ?>		
	  <li class="nav-item">
		<a class="nav-link "href="../../../index.php#account">
		  Account
		</a>
	  </li>
      <?php } ?>
			  
    </ul>
  </div>  
	</nav>
</header>
 
	<div class="container">
			</br>
            </br>
          <div class="row justify-content-center">
               <h3><u>Hello, <?php echo ucfirst($_SESSION['name']); ?></u>&#128512</h3>
          </div>
		  </br>
          <?php if($_SESSION['reason'] !== NULL && $_SESSION['reason'] !== '' ) {?>
            <div>
                <p class="text-danger text-center">Account Rejected </br> Reason : <?php echo ucfirst($_SESSION['reason']); ?> </p> 
            </div>
            <?php } ?>
		  <div class="row justify-content-center">
              <div class="col-md-5">
                <h1>Upload Documents</h1>
                <?php if (isset($_GET['error'])) { ?>
                    <p class="text-danger"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                
                <?php if (isset($_GET['success'])) { ?>
                        <p class="text-success"><?php echo $_GET['success']; ?></p>
                <?php } ?>

                <form action="studentDocFun.php" method="post" enctype="multipart/form-data">
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

                <button type="submit" class="btn1">Update</button>
                </form>
                    </br>
                </div>
          </div>
    </div>
	 
    <?php include "../footer.php"; ?> 
</body>
</html>
<?php 
}
else{
     header("Location: ../../../index.php");
     exit();
}
 ?>
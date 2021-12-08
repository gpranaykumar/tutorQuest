<?php 
session_start();
include "../../../db_connection.php";

if (isset($_SESSION['id']) && isset($_SESSION['uname']) && $_SESSION['Accstatus'] === '4') {
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

    <title>Tutor Quest - Otp Verification</title>
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
				<?php if($_SESSION['role']=== 'teacher'){ ?>
				 <li class="nav-item">
					<a class="nav-link text-sucess active" href="../teacherHome.php">Dashboard</a>
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
		  <div class="row justify-content-center">
              <div class="col-md-5">
                <h1>OTP Verification</h1>
                <?php if (isset($_GET['error'])) { ?>
                    <p class="text-danger"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                
                <?php if (isset($_GET['success'])) { ?>
                        <p class="text-success"><?php echo $_GET['success']; ?></p>
                <?php } ?>
                <form action="verification.php">
                    <hr/>
                        <label for="uname"><strong>Contact Number</strong></label>
                        <input type="text" class="form-control" id="number" placeholder="Enter contact number" value='<?php echo $_SESSION['number']?>' name="uname" required disabled>
                    
                    <div id="recaptcha-container"></div>
                </br>
                    <button type="button" class="btn1" onclick="phoneAuth();">Send Otp</button>
                </form>

                    </br>

                    <form >
                        <hr/>
                        <input type="text"class="form-control" id="verificationCode" placeholder="Enter OTP:">
                          </br>
                        <button type="button" class="btn1" onclick="codeverify();">Verify code</button>

                    </form>
                </br>
                </div>
          </div>
    </div>
	 
    <?php include "../footer.php"; ?> 
    <script src="https://www.gstatic.com/firebasejs/8.3.1/firebase.js"></script>
    <script >
        //9.5.0
  const firebaseConfig = {
    apiKey: "AIzaSyAyKbU_Vu6NwG-lozllIIRAoWGSnPBN9rQ",
    authDomain: "tutor-quest-otp.firebaseapp.com",
    projectId: "tutor-quest-otp",
    storageBucket: "tutor-quest-otp.appspot.com",
    messagingSenderId: "87241196492",
    appId: "1:87241196492:web:7ca2d070c28affdc66d369",
    measurementId: "G-4LJ581YB95"
  };

  // Initialize Firebase
  const app = firebase.initializeApp(firebaseConfig);
</script>
<script src="firebase.js" type="text/javascript"></script>
</body>
</html>
<?php 
}
else{
     header("Location: ../../../index.php");
     exit();
}
 ?>
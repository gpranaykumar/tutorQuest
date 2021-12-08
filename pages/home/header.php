<nav class="navbar navbar-expand-sm bg-dark navbar-dark py-3 fixed-top">
	<!-- <img class="logo"src="../../assets/img/logo" href="#" alt="logo" height="50"    > -->
	<a class="nav-link text-white" href="#"><h4>Tutor <span class="text-warning">Quest</span></h4></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
    <ul class="navbar-nav  >
      <li class="nav-item">
        <a class="nav-link " href="../../index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../index.php#aboutus">About us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link "href="../../index.php#contactus">Contact us</a>
      </li>	
      <?php 
			if (isset($_SESSION['id']) && isset($_SESSION['uname']) && isset($_SESSION['role'])) {
				?>
				<?php if($_SESSION['role']=== 'student'){ ?>
				 <li class="nav-item">
					<a class="nav-link text-sucess <?php if($base=="studentHome"){ echo "active";} ?>" href="studentHome.php">Dashboard</a>
				</li>
				<?php }else if($_SESSION['role']=== 'teacher'){ ?>
				 <li class="nav-item">
					<a class="nav-link text-sucess <?php if($base=="teacherHome"){ echo "active";} ?>" href="teacherHome.php">Dashboard</a>
				</li>
				<?php }else if($_SESSION['role']=== 'organisation'){ ?>
				 <li class="nav-item">
					<a class="nav-link text-sucess <?php if($base=="organisationHome"){ echo "active";} ?>" href="organisationHome.php">Dashboard</a>
				</li>
				<?php } ?>
				<li class="nav-item">
					<a class="nav-link text-danger" href="../../logout.php">Logout</a>
				</li>
			<?php }else{

			 ?>		
	  <li class="nav-item">
		<a class="nav-link "href="../../index.php#account">
		  Account
		</a>
	  </li>
      <?php } ?>
			  
    </ul>
  </div>  
	</nav>
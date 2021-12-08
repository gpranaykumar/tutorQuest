<!DOCTYPE html>
<html lang="en">
  <head>
  <?php include "head.php"; ?>
    <title>Tutor Quest</title>
	
  </head>
  <body>
	<header>
    <?php $base='home'; include "header.php";  ?>
	</header>
    <section
      class="bg-dark text-light p-5 p-lg-0 pt-lg-5 text-center text-sm-start"
    >
      <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between">
          <div>
            <h1>Looking for <span class="text-warning"> Tutor</span></h1>
            <p class="lead my-4">
              Here is the solution</br>Sign up and select your tutor
            </p>
           
          </div>
          <img
            class="img-fluid w-50 d-none d-sm-block"
            src="assets/img/home_teacher.svg"
            alt=""
          />
        </div>
      </div>
    </section>
    <section class="bg-primary text-light p-3" id="account">
      <div class="container">
        <div class="d-md-flex justify-content-center align-items-center">
          <h3 class="mb-1 mb-md-0">  </h3>
        </div>
      </div>
    </section>

    <!-- Boxes -->
    <section class="p-5" >
      <?php include "category.php" ?>
    </section>

    <!-- About us Section -->
    <section id="aboutus" class="p-5">
      <div class="container">
        <div class="row align-items-center justify-content-between">
          <div class="col-md">
            <img src="assets/img/teacher.png" class="img-fluid" alt="" />
          </div>
          <div class="col-md p-5">
            <h2>About Us</h2>
            <p class="lead">
              
            </p>
            <p style="text-align:justify">
            We are a team of 3 members bearing roll numbers 
            ( 19H51A05F6, 19H51A05F7, 19H51A05F8). Tutorquest is a platform where we help 
            students and teachers to find each other and is built as our Mini project-1.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section id="learn" class="p-5 bg-dark text-light">
      <div class="container">
        <div class="row align-items-center justify-content-between">
          <div class="col-md p-5">
            <h2>Details</h2>
            <p class="lead">
            </p>
            <p style="text-align:justify"> Tutorquest is a platform provided for students and organisations to find tutors as per their requirements and people who want to teach with relevant skills.
            </p>
            
          </div>
          <div class="col-md">
            <img src="assets/img/student.png" class="img-fluid" alt="" />
          </div>
        </div>
      </div>
    </section>

    <section id="Team" class="p-5 bg-primary">
    <?php include "team.php"; ?>
    </section>

    <!-- Contact  -->
    <section class="p-5" id="contactus">
      <div class="container">
      <h1>Contact Us</h1>
        <div class="row p-2 d-flex flex-column justify-content-center">
          <div class="col-12 col-md-6 justify-content-center">
            <h6 > <span class="font-weight-bold"> Email:</span> pranaykumar.1905f8 @gmail.com</h6>
            <h6> <span class="font-weight-bold">Contact No:</span> +91 9059 265 235 </h6>
          </div>
        </div>
      </div>
    </section>
    <!-- Footer -->
    <footer class="p-4 bg-dark text-white text-center position-relative">
      <div class="container">
        <p class="lead">Copyright &copy; 2021 | Mini Project B54 | CMRCET</p>
      </div>
    </footer>
  </body>
</html>

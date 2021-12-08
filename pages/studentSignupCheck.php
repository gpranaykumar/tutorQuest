<?php 
session_start(); 
include "../db_connection.php";

if (isset($_POST['uname']) && isset($_POST['email']) && isset($_POST['password'])
    && isset($_POST['name']) && isset($_POST['re_password']) && isset($_POST['gender'])
	 && isset($_POST['grade'])&& isset($_POST['number']) && isset($_POST['pnumber']) && 
	 isset($_POST['state']) && isset($_POST['city']) && isset($_POST['board']) 
	 && isset($_POST['aadhar_no']) ) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	$name = validate($_POST['name']);
	$uname = validate($_POST['uname']);
	$email = strtolower($_POST['email']);
	$gender = validate($_POST['gender']);
	$pass = validate($_POST['password']);
	$re_pass = validate($_POST['re_password']);
	$grade = ($_POST['grade']);
	$number = ($_POST['number']);

	$pnumber = $_POST['pnumber'];
	$board = $_POST['board'];
	$state = $_POST['state'];
	$city = $_POST['city'];
	$aadhar_no = $_POST['aadhar_no'];

	$aadhar_front = $_FILES['aadhar_front']['name'];
	$aadhar_back = $_FILES['aadhar_back']['name'];
	$student_id = $_FILES['student_id']['name'];


	

	$user_data = 'uname='. $uname. '&name='. $name. '&email='.$email. '&gender='.$gender. '&grade='.$grade. 
					'&number='.$number. '&pnumber='.$pnumber. '&board='.$board. '&state='.$state. '&city='.$city .'&aadhar_no='.$aadhar_no;


	if (empty($uname)) {
		header("Location: studentSignup.php?error=User Name is required&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: studentSignup.php?error=Password is required&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: studentSignup.php?error=Re Password is required&$user_data");
	    exit();
	}
	else if(empty($name)){
        header("Location: studentSignup.php?error=Name is required&$user_data");
	    exit();
	}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		header("Location: studentSignup.php?error=Email is not valid&$user_data");
	    exit();
	}
	else if(empty($gender)){
        header("Location: studentSignup.php?error=Gender is required&$user_data");
	    exit();
	}
	else if(empty($grade)){
        header("Location: studentSignup.php?error=Grade is required&$user_data");
	    exit();
	}
	else if(empty($board)){
        header("Location: studentSignup.php?error=Board is required&$user_data");
	    exit();
	}
	else if(empty($number)){
        header("Location: studentSignup.php?error=Student number is required&$user_data");
	    exit();
	}
	else if(empty($pnumber)){
        header("Location: studentSignup.php?error=Parent number is required&$user_data");
	    exit();
	}
	else if(empty($state)){
        header("Location: studentSignup.php?error=State is required&$user_data");
	    exit();
	}
	else if(empty($city)){
        header("Location: studentSignup.php?error=City is required&$user_data");
	    exit();
	}
	else if(empty($aadhar_no)){
		
        header("Location: studentSignup.php?error=Aadhar Number is required&$user_data");
	    exit();

	}else if(strlen($aadhar_no) !== 12 ){
		header("Location: studentSignup.php?error=Invalid Aadhar Number&$user_data");
	    exit();
	}
	else if($aadhar_front === ""){
		header("Location: studentSignup.php?error=Aadhar Front image is required&$user_data");
	    exit();
	}
	else if($aadhar_back === ""){
		header("Location: studentSignup.php?error=Aadhar Back image is required&$user_data");
	    exit();
	}
	else if($student_id === ""){
		header("Location: studentSignup.php?error=Student ID image is required&$user_data");
	    exit();
	}
	else if(strlen($pass)<4){
        header("Location: studentSignup.php?error=Length of Password should be > 4&$user_data");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: studentSignup.php?error=The confirmation password  does not match&$user_data");
	    exit();
	}

	else{

		// hashing the password
        //$pass = md5($pass);
		//$pass = $pass;
	    $sql = "SELECT * FROM student_data WHERE uname='$uname' or email='$email'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: studentSignup.php?error=The username or email is taken try another&$user_data");
	        exit();
		}else {

			$gender1=0;
			if(strtolower($gender)[0] === "m"){
				$gender1=1;
			}

			/*
			$file = $_FILES['my_file']['name'];
			$path = pathinfo($file);
			$filename = $path['filename'];
			$ext = $path['extension'];
			$temp_name = $_FILES['my_file']['tmp_name'];
			$path_filename_ext = $target_dir.$filename.".".$ext;
			*/
			
           $sql2 = "INSERT INTO student_data(name, uname, email, gender, password, grade, board, number, pnumber, state, city, aadhar_no, role, status) VALUES('$name','$uname', '$email', '$gender1','$pass', '$grade', '$board', '$number', '$pnumber', '$state', '$city', '$aadhar_no', 'student', '4')";#0
		   //$sql2 = "INSERT INTO student_data(name, uname, email, gender, password, pnumber, role, status) VALUES('$name','$uname', '$email', '$gender1','$pass', '$pnumber', 'student', '0')";

			/*
				status: 0 - Not Activated
						1 - Verified
						2 - Rejected
						3 - Blocked by Admin
						4 - otp verification
			*/
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
				$target_dir = "assets/student_data/". $uname ."/";
				if(!is_dir($target_dir)) {
					mkdir($target_dir);
				}
				move_uploaded_file($_FILES["aadhar_front"]["tmp_name"], $target_dir. 'aadhar_front'. '.' .pathinfo($aadhar_front)['extension']);
				move_uploaded_file($_FILES["aadhar_back"]["tmp_name"], $target_dir. 'aadhar_back'. '.' .pathinfo($aadhar_back)['extension']);
				move_uploaded_file($_FILES["student_id"]["tmp_name"], $target_dir. 'student_id'. '.' .pathinfo($student_id)['extension']);
           	 	header("Location: studentSignup.php?success=Your account has been created successfully");
	         	exit();
           }else {
			   $errormsql = mysqli_error($conn);
	           	header("Location: studentSignup.php?error=unknown error occurred&$errormsql&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: studentSignup.php?error=Fill All Details");
	exit();
}
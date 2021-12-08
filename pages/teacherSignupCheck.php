<?php 
session_start(); 
include "../db_connection.php";

if (isset($_POST['uname']) && isset($_POST['password'])
    && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['re_password']) 
	&& isset($_POST['gender']) && isset($_POST['subject'])  && isset($_POST['experience'])
	&& isset($_POST['skill']) && isset($_POST['price']) 
	&& isset($_POST['priceOrg']) && isset($_POST['number']) && isset($_POST['aadhar_no']) ) {
#priceOrg
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
	
	$subject = ($_POST['subject']);
	$experience = ($_POST['experience']);
	$skill = $_POST['skill'];
	$price = ($_POST['price']);
	$priceOrg = ($_POST['priceOrg']);
	$number = ($_POST['number']);
	$aadhar_no = $_POST['aadhar_no'];
	
	$aadhar_front = $_FILES['aadhar_front']['name'];
	$aadhar_back = $_FILES['aadhar_back']['name'];
	$proof_doc = $_FILES['proof_doc']['name'];

	$user_data = 'uname='. $uname. '&name='. $name. '&email='. $email.
	'&gender='.$email.'&subject='.$subject.'&experience='.$experience.'&skill='.$skill.'&price='.$price.
	'&number='.$number.'&aadhar_no='.$aadhar_no;


	if (empty($uname)) {
		header("Location: teacherSignup.php?error=User Name is required&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: teacherSignup.php?error=Password is required&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: teacherSignup.php?error=Re Password is required&$user_data");
	    exit();
	}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		header("Location: teacherSignup.php?error=Email is not valid&$user_data");
	    exit();
	}
	else if(empty($name)){
        header("Location: teacherSignup.php?error=Name is required&$user_data");
	    exit();
	}
	else if(empty($gender)){
        header("Location: teacherSignup.php?error=gender is required&$user_data");
	    exit();
	}
	else if(empty($subject)){
        header("Location: teacherSignup.php?error=subject is required&$user_data");
	    exit();
	}
	else if(empty($experience)){
        header("Location: teacherSignup.php?error=experience is required&$user_data");
	    exit();
	}
	else if(empty($skill)){
        header("Location: teacherSignup.php?error=skills is required&$user_data");
	    exit();
	}
	else if(empty($price)){
        header("Location: teacherSignup.php?error=price per hour for students is required&$user_data");
	    exit();
	}
	else if(empty($priceOrg)){
        header("Location: teacherSignup.php?error=price per month for organisation is required&$user_data");
	    exit();
	}
	else if(empty($number)){
        header("Location: teacherSignup.php?error=number is required&$user_data");
	    exit();
	}
	else if(empty($aadhar_no)){
        header("Location: teacherSignup.php?error=aadhar_no is required&$user_data");
	    exit();
	}
	else if(strlen($aadhar_no)!==12){
        header("Location: teacherSignup.php?error=Invalid Aadhar Number&$user_data");
	    exit();
	}
	else if($aadhar_front === ""){
		header("Location: teacherSignup.php?error=Aadhar Front image is required&$user_data");
	    exit();
	}
	else if($aadhar_back === ""){
		header("Location: teacherSignup.php?error=Aadhar Back image is required&$user_data");
	    exit();
	}
	else if($proof_doc === ""){
		header("Location: teacherSignup.php?error=Experience Proof (or) Highest Qulification image is required&$user_data");
	    exit();
	}
	else if(strlen($pass)<4){
        header("Location: teacherSignup.php?error=Length of Password should be > 4&$user_data");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: teacherSignup.php?error=The confirmation password  does not match&$user_data");
	    exit();
	}

	else{

		// hashing the password
        //$pass = md5($pass);
		//$pass = $pass;
	    $sql = "SELECT * FROM teacher_data WHERE uname='$uname' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: teacherSignup.php?error=The username is taken try another&$user_data");
	        exit();
		}else {

			$gender1=0;
			if(strtolower($gender)[0] === "m"){
				$gender1=1;
			}
           $sql2 = "INSERT INTO teacher_data(name, uname, email, gender, password, subject, experience, skills, price, priceOrg , number, aadhar_no,role, status) VALUES('$name','$uname','$email','$gender1','$pass', '$subject', '$experience','$skill', '$price', '$priceOrg', '$number','$aadhar_no','teacher', '4')";#0
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
				$target_dir = "assets/teacher_data/". $uname ."/";
				if(!is_dir($target_dir)) {
					mkdir($target_dir);
				}
				move_uploaded_file($_FILES["aadhar_front"]["tmp_name"], $target_dir. 'aadhar_front'. '.' .pathinfo($aadhar_front)['extension']);
				move_uploaded_file($_FILES["aadhar_back"]["tmp_name"], $target_dir. 'aadhar_back'. '.' .pathinfo($aadhar_back)['extension']);
				move_uploaded_file($_FILES["proof_doc"]["tmp_name"], $target_dir. 'proof_doc'. '.' .pathinfo($proof_doc)['extension']);
				header("Location: teacherLogin.php?success=Your account has been created successfully");
	         exit();
           }else {
				$errormsql = mysqli_error($conn);
	           	header("Location: teacherSignup.php?error=unknown error occurred&$errormsql&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: teacherSignup.php");
	exit();
}
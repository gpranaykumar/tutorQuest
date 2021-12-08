<?php 
session_start(); 
include "../db_connection.php";

if (isset($_POST['uname']) && isset($_POST['password'])
    && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['re_password'])
	 && isset($_POST['number']) && isset($_POST['state']) && isset($_POST['city']) && isset($_POST['address']) 
	 ) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	$name = validate($_POST['name']);
	$uname = validate($_POST['uname']);
	$email = ($_POST['email']);
	$pass = validate($_POST['password']);
	$re_pass = validate($_POST['re_password']);
	$number = ($_POST['number']);
	$state = ($_POST['state']);
	$city = ($_POST['city']);
	$address = ($_POST['address']);
	
	$proof_doc = $_FILES['proof_doc']['name'];

	$user_data = 'uname='. $uname. '&name='. $name. '&email='.$email. '&number='.$number. '&state='.$state. '&city='.$city. '&address='.$address;


	if (empty($uname)) {
		header("Location: organisationSignup.php?error=User Name is required&$user_data");
	    exit();
	}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		header("Location: organisationSignup.php?error=Email is not valid&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: organisationSignup.php?error=Password is required&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: organisationSignup.php?error=Re Password is required&$user_data");
	    exit();
	}

	else if(empty($name)){
        header("Location: organisationSignup.php?error=Name is required&$user_data");
	    exit();
	}
	else if(empty($number)){
        header("Location: organisationSignup.php?error=number is required&$user_data");
	    exit();
	}
	else if(empty($state)){
        header("Location: organisationSignup.php?error=state is required&$user_data");
	    exit();
	}
	else if(empty($city)){
        header("Location: organisationSignup.php?error=city is required&$user_data");
	    exit();
	}
	else if(empty($address)){
        header("Location: organisationSignup.php?error=address is required&$user_data");
	    exit();
	}
	else if(strlen($pass)<4){
        header("Location: organisationSignup.php?error=Length of Password should be > 4&$user_data");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: organisationSignup.php?error=The confirmation password  does not match&$user_data");
	    exit();
	}

	else{

		// hashing the password
        //$pass = md5($pass);
		//$pass = $pass;
	    $sql = "SELECT * FROM organisation_data WHERE uname='$uname' or email='$email'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: organisationSignup.php?error=The username or email is taken try another&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO organisation_data(name, uname, email, password, state, city, address, number, role, status) VALUES('$name','$uname', '$email','$pass', '$state', '$city', '$address', '$number','organisation', '4')";#0
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
			$target_dir = "assets/organisation_data/". $uname ."/";
				if(!is_dir($target_dir)) {
					mkdir($target_dir);
				}
				move_uploaded_file($_FILES["proof_doc"]["tmp_name"], $target_dir. 'proof_doc'. '.' .pathinfo($proof_doc)['extension']);
           	 header("Location: organisationSignup.php?success=Your account has been created successfully");
	         exit();
           }else {
				$errormsql = mysqli_error($conn);
	           	header("Location: organisationSignup.php?error=unknown error occurred&$errormsql&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: organisationSignup.php");
	exit();
}
<?php
session_start();
include "config.php";
$role= "admin";
if (isset($_POST['uname'])  && isset($_POST['email']) && isset($_POST['number']) && isset($_POST['password'] )
    && isset($_POST['name']) && isset($_POST['re_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);
    $num =validate($_POST['number']);
	$email = validate( $_POST['email']);
	$re_pass = validate($_POST['re_password']);
	$name = validate($_POST['name']);


    $user_data = 'uname='. $uname. '&name='. $name;
    $numb = preg_match('@[0-9]@', $num);
	$number = preg_match('@[0-9]@', $pass);
	$uppercase = preg_match('@[A-Z]@', $pass);
	$lowercase = preg_match('@[a-z]@', $pass);
	$specialChars = preg_match('@[^\w]@', $pass);
	if (empty($uname)) {
		header("Location: code.php?error=Username is required&$user_data");
	    exit();
	}

	if (empty($email)) {

		header("Location: code.php?error=Email is required&$user_data");
	    exit();
	   }
    else if(empty($num)){
        header("Location: code.php?error= Number is required&$numb");
        exit();
    }
	else if(empty($re_pass)){
        header("Location: code.php?error=Password is required&$user_data");
	    exit();
	}

	else if(empty($name)){
        header("Location: code.php?error=Name is required&$user_data");
	    exit();
	}
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("Location: code.php?error=Email is not valid&$user_data");
		exit();
	  }


	if(strlen($pass) < 8 ) {
	header("Location: code.php?error=Password must be at least 8 characters in length.&$user_data");
	exit();
	}

	if(strlen($pass) < 8 || !$uppercase ) {
		header("Location: code.php?error=Password one upper case letter.&$user_data");
		exit();
		}
		else if(strlen($pass) < 8 || !$lowercase ) {
			header("Location: code.php?error=Password must be one lower case letter.&$user_data");
			exit();
			}

	else if($pass !== $re_pass){
        header("Location: code.php?error=The confirmation password does not match&$user_data");
	    exit();
	}

	else{

		// hashing the password
        $pass = md5($pass);
		$user_check = "SELECT * FROM users WHERE  user_name ='$uname'  OR email ='$email'  ";
		
		$result = mysqli_query($conn,$user_check );
     $user = mysqli_fetch_assoc($result);
		
     if ($user) {
       if ($user['user_name'] === $uname) {
        header("Location: code.php?error=The username is already taken&$user_data");
      }

      if ($user['email'] === $email) {
        header("Location: code.php?error=Email is already taken &$user_data");
      }

     }



		else{
           $sql2 = "INSERT INTO users(user_name, email, number, password, name, role) VALUES('$uname', '$email', '$num', '$pass', '$name', '$role')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: code.php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: code.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}


}else{
	header("Location:register.php");
	exit();
}

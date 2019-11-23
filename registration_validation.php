<?php

include_once "dbconnect.php";
$error = false;

function sanitizeInput($input) {
	$elem = trim($input);
	$elem = strip_tags($elem);
	$elem = htmlspecialchars($elem);
	return $elem;
} 

if ( isset($_POST['btn-signup']) ) {
	// sanitize input to prevent sql injection
	$name = sanitizeInput($_POST['name']);
	$email = sanitizeInput($_POST['email']);
	$pass = sanitizeInput($_POST['pass']);

	// Basic name validation
	if ( empty($name) )	{
		$error = true;
		$nameError = "Please enter your full name.";
	} else if ( strlen($name) < 3) {
		$error = true;
		$nameError = "Name must have at least 3 characters.";
	} else if ( !preg_match("/^[a-zA-Z]+$/", $name) ) {
		$error = true;
		$nameError = "Name must contain alphabet and spaces only.";
	}

	$errors = array();
	// Basic email validation
	if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
		$error = true;
		$emailError = "Please enter a valid email address.";
	} else {
		$query = "SELECT email FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $query);
		$count = mysqli_num_rows($result);
		if ( $count != 0 ) {
			$error = true;
			$emailError = "Provided email address is already in use.";
		}
	}

	// Password validation
	// could also do: '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.* )(?=.*[^a-zA-Z0-9]).{8,16}$/m';
	
	if ( empty($pass) ) {
		$error = true;
		/*$passError = "Please enter a password.";*/
		$errors[] = "Please enter a password.";
	} 
	if ( strlen($pass) < 6 ) {
		$error = true;
		/*$passError = "Password must have at least 6 characters.";*/
		$errors[] = "Password must have at least 6 characters.";
	} 
	if ( !preg_match("/\d/", $pass) ) {
		$error = true;
		/*$passError = "Password must contain at least 1 digit.";*/
		$errors[] = "Password must have at least 1 digit.";
	} 
	if ( !preg_match("/[A-Z]/", $pass) ) {
		$error = true;
		/*$passError = "Password must contain at least 1 capital letter.";*/
		$errors[] = "Password must contain at least 1 capital letter.";
	} 
	if ( !preg_match("/[a-z]/", $pass) ) {
		$error = true;
		/*$passError = "Password must contain at least 1 small letter.";*/
		$errors[] = "Password must contain at least 1 small letter.";
	} 
	if ( !preg_match("/\W/", $pass) ) {
		$error = true;
		/*$passError = "Password must contain at least 1 special character.";*/
		$errors[] = "Password must contain at least 1 special character.";
	} 
	if ( preg_match("/\s/", $pass) ) {
		$error = true;
		/*$passError = "Password must not contain any white spaces.";*/
		$errors[] = "Password must not contain any white spaces.";
	}

	// Password validation
	$password = hash('sha256', $pass);

	// if no error continue signup 
	if ( !($error) ) {
		$query = "INSERT INTO users(name, email, pass) 
					VALUES ('$name', '$email', '$password')";
		$result = mysqli_query($conn, $query);

		if ( $result ) {
			$errType = "success";
			$errMsg = "Succesfully registered. You may login now.";
			unset($name);
			unset($email);
			unset($pass);
		} else {
			$errType = "danger";
			$errMsg = "Something went wrong. Please try again  later.";
		}
	}
}

?>
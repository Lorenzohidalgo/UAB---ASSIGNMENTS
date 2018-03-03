<?php
	require('../model/db_functions.php');

	// CHECKS FOR SESSION AND STARTS ONE IF NECESSARY
	if (session_status() == PHP_SESSION_NONE){
		session_start();
	}

	$error = 0;

	// VALIDATES USERNAME
  	if (empty($_POST["username"])) {
    	$error		= 1;
		$message 	= "You need to fill all input fields in order to register.";
  	} else {
	    $username 	= test_input($_POST["username"]);

	    // CHECKS IF THE USERNAME ONLY CONTAINS LETTERS AND NUMBERS
	    if (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
	    	$error 		= 1;
	    	$message 	= "The Username you entered is not valid, please try again correcting it.";
	    }
  	}

	//	VALIDATES PASSWORD
  	if (empty($_POST["password"])) {
    	$error 		= 1;
		$message 	= "You need to fill all input fields in order to register.";
  	} else {

  		// CONVERTS PASSWORD TO HASH
	    $password 	= test_input($_POST["password"]);
		$password_hashed = password_hash($password, PASSWORD_DEFAULT);

	    // CHECKS IF THE PASSWORD ONLY CONTAINS LETTERS AND NUMBERS
	    if (!preg_match("/^[a-zA-Z0-9]*$/",$password)) {
	    	$error 		= 1;
	    	$message 	= "The Password you entered is not valid, please try again correcting it.";
	    }
  	}

  	// GETS THE USER INFORMATION OF THE USERNAME FOR FURTHER VALIDATION
  	$user = get_user($username);
  	$user = $user->fetch();

  	// CHECKS IF AN ERROR OCURRED
	if($error == 1){

		// RETURNS ERROR MESSAGE
		require('./login_error.php');
	}elseif (password_verify ( $password, $user["password"] ) ) {

		// SETS THE SESSION VARIABLES WITH THE USER INFORMATION
		$_SESSION['id'] 		= $user['id'];
		$_SESSION['username'] 	= $user['username'];
		$_SESSION['firstname'] 	= $user['firstname'];
		$_SESSION['lastname']	= $user['lastname'];
		$_SESSION['is_admin'] 	= $user['is_admin'];
		echo 1;

	}else{

		// RETURNS ERROR MESSAGE
		$message 		= "  Either the Username, the Password or both are wrong please, try again.";
		require('./login_error.php');
	}
?>
<?php
	require('../model/db_functions.php');

	$error = 0;
	
	// VALIDATES THE FIRSTNAME
	if (empty($_POST["firstname"])) {

		// SETS ERROR MESSAGE
    	$error 		= 1;
		$message 	= "You need to fill all input fields in order to register.";
  	} else {

  		// CHECKS IF THE FIRSTNAME CONTAINS ONLY LETTERS AND WHITESPACES
	    $firstname 	= test_input($_POST["firstname"]);
	    if (!preg_match("/^[a-zA-ZáàÁÀéèÉÈíÍóòÓÒúüÚÜçÇ'· ]*$/",$firstname)) {

	    	// SETS ERROR MESSAGE
	    	$error 		= 1;
	    	$message 	= "The First Name you entered is not valid, please try again correcting it.";
	    }
  	}

	// VALIDATES THE LASTNAME
  	if (empty($_POST["lastname"])) {

  		// SETS ERROR MESSAGE
    	$error 		= 1;
		$message 	= "You need to fill all input fields in order to register.";
  	} else {
	    $lastname 	= test_input($_POST["lastname"]);
	    
	    // CHECKS IF THE LASTNAME CONTAINS ONLY LETTERS AND WHITESPACES
	    if (!preg_match("/^[a-zA-ZáàÁÀéèÉÈíÍóòÓÒúüÚÜçÇ'· ]*$/",$lastname)) {

	    	// SETS ERROR MESSAGE
	    	$error 		= 1;
	    	$message 	= "The Last Name you entered is not valid, please try again correcting it.";
	    }
  	}

  	// VALIDATES THE BIRTHDAY
  	if (empty($_POST["birthday"])) {

  		// SETS ERROR MESSAGE
    	$error 		= 1;
		$message 	= "You need to fill all input fields in order to register.";
  	} else {

  		// SETS SPECIFIC DATE RANGE
	    $birthday 			= test_input($_POST["birthday"]);
	    list($y, $m, $d) 	= explode('-', $birthday);
	    $min = 1920;
	    $max = 1998;

	    // CHECKS IF ITS A VALID DATE
	    if(!checkdate($m, $d, $y)) {

	    	// SETS ERROR MESSAGE
	    	$error 		= 1;
	    	$message 	= "The Birthday you entered is not valid, please try again correcting it.";

	    // CHECKS IF THE DATE IS IN THE SPECIFIED RANGE
	    }elseif (!(($min <= $y) && ($y <= $max))) {

	    	// SETS ERROR MESSAGE
	    	$error 		= 1;
	    	$message 	= "The Birtday you entered is not valid, please try again correcting it.";
	    }
  	}

  	// VALIDATES THE ADDRESS
  	if (empty($_POST["address"])) {

  		// SETS ERROR MESSAGE
    	$error 		= 1;
		$message 	= "You need to fill all input fields in order to register.";
  	} else {

	    $address 	= test_input($_POST["address"]);

	    // CHECKS IF THE ADDRESS CONTAINS ONLY LETTERS, NUMBERS AND WHITESPACES
	    if (!preg_match("/^[a-zA-Z0-9áàÁÀéèÉÈíÍóòÓÒúüÚÜçÇ'·,ºª .]{1,32}$/",$address)) {

	    	// SETS ERROR MESSAGE
	    	$error 		= 1;
	    	$message 	= "The Address you entered is not valid, please try again correcting it.";
	    }
  	}

  	// VALIDATES THE TOWN
  	if (empty($_POST["town"])) {

  		// SETS ERROR MESSAGE
    	$error 		= 1;
		$message 	= "You need to fill all input fields in order to register.";
  	} else {
	    $town 		= test_input($_POST["town"]);


	    // CHECKS IF THE TOWN CONTAINS ONLY LETTERS AND WHITESPACES
	    if (!preg_match("/^[a-zA-ZáàÁÀéèÉÈíÍóòÓÒúüÚÜ'çÇ· ]{1,32}$/",$town)) {

	    	// SETS ERROR MESSAGE
	    	$error 		= 1;
	    	$message 	= "The Town you entered is not valid, please try again correcting it.";
	    }
  	}

  	// VALIDATES THE POSTAL CODE
  	if (empty($_POST["postal_code"])) {

  		// SETS ERROR MESSAGE
    	$error 		= 1;
		$message 	= "You need to fill all input fields in order to register.";
  	} else {
	    $postal_code 	= test_input($_POST["postal_code"]);

	    // CHECKS IF THE POSTAL CODE CONTAINS A 5 DIGIT NUMBER
	    if (!preg_match("/^[0-9]{5}$/",$postal_code)) {

	    	// SETS ERROR MESSAGE
	    	$error 		= 1;
	    	$message 	= "The Postal Code you entered is not valid, please try again correcting it.";
	    }
  	}

  	// VALIDATES THE TELEPHONE NUMBER
  	if (empty($_POST["telephone"])) {

  		// SETS ERROR MESSAGE
    	$error 		= 1;
		$message 	= "You need to fill all input fields in order to register.";
  	} else {
	    $telephone 	= test_input($_POST["telephone"]);

	    // CHECKS IF THE TELEPHONE NUMBER CONTAINS A 9 DIGIT NUMBER
	    if (!preg_match("/^[0-9]{9}$/",$telephone)) {

	    	// SETS ERROR MESSAGE
	    	$error 		= 1;	    	
	    	$message 	= "The Telephone Number you entered is not valid, please try again correcting it.";
	    }
  	}

  	// VALIDATES THE EMAIL ADDRESS
	if (empty($_POST["email"])) {

		// SETS ERROR MESSAGE
    	$error 		= 1;
		$message 	= "You need to fill all input fields in order to register.";
  	} else {
	    $email 		= test_input($_POST["email"]);

	    // CHECKS IF ITS A VALID EMAIL ADDRESS
	    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

	    	// SETS ERROR MESSAGE
	    	$error 		= 1;
	    	$message 	= "The Email Address you entered is not valid, please try again correcting it.";
	    }
  	}

  	// VALIDATES THE CREDIT CARD NUMBER
  	if (empty($_POST["credit_card"])) {

  		// SETS ERROR MESSAGE
		$error 		= 1;
		$message 	= "You need to fill all input fields in order to register.";
  	} else {
	    $credit_card 	= test_input($_POST["credit_card"]);

	    // CHECKS IF THE CREDIT CARD CONTAINS A 16 DIGIT NUMBER
	    if (!preg_match("/^[0-9]{16}$/",$credit_card)) {

	    	// SETS ERROR MESSAGE
	    	$error 		= 1;
	    	$message 	= "The Credit Card Number you entered is not valid, please try again correcting it.";
	    }
  	}

	// VALIDATES THE USERNAME
  	if (empty($_POST["username"])) {

  		// SETS ERROR MESSAGE
    	$error		= 1;
		$message 	= "You need to fill all input fields in order to register.";
  	} else {
	    $username 	= test_input($_POST["username"]);

	    // CHECKS IF THE USERNAM CONTAINS ONLY LETTERS AND NUMBERS
	    if (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {

	    	// SETS ERROR MESSAGE
	    	$error 		= 1;
	    	$message 	= "The Username you entered is not valid, please try again correcting it.";
	    }
  	}

	// VALIDATES THE PASSWORD
  	if (empty($_POST["password"])) {

  		// SETS ERROR MESSAGE
    	$error 		= 1;
		$message 	= "You need to fill all input fields in order to register.";
  	} else {
	    $password 	= test_input($_POST["password"]);
		$password_hashed = password_hash($password, PASSWORD_DEFAULT);

	    // CHECKS IF THE PASSWORD CONTAINS ONLY LETTERS AND NUMBERS
	    if (!preg_match("/^[a-zA-Z0-9]*$/",$password)) {

	    	// SETS ERROR MESSAGE
	    	$error 		= 1;
	    	$message 	= "The Password you entered is not valid, please try again correcting it.";
	    }
  	}

  	// CHECKS IF AN ERROR OCURRED
	if($error == 1){

		// SETS ERROR MESSAGE
		require('./registration_error.php');
	}elseif (unique_user($username, $email)) {

		// REGISTERS USER AND RETURNS SUCCESS MESSAGE
		register($firstname, $lastname, $birthday, $address, $town, $postal_code, $telephone, $email, $credit_card, $username, $password_hashed);
		require('./registration_success.php');
	}else{

		// SETS ERROR MESSAGE
		$message 		= "Either the Username or the Email address you entered is already in use, please try again correcting it.";
		require('./registration_error.php');
	}
?>
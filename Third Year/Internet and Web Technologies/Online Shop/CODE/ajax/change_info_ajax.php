<?php
	require('../model/db_functions.php');

	$error = 0;
	
	// VALIDATES THE FIRSTNAME
	if (empty($_POST["firstname"])) {

		// SETS ERROR MESSAGE
    	$error 		= 1;
		$message 	= "You need to fill all input fields in order to register.";

  	} else {

	    $firstname 	= test_input($_POST["firstname"]);

	    // CHECKS IF THE FIRSTNAME CONTAINS ONLY WHITESPACES AND LETTERS
	    if (!preg_match("/^[a-zA-ZáàÁÀéèÉÈíÍóòÓÒúüÚÜçÇ'· ]*$/",$firstname)) {

	    	// SETS ERROR MESSAGE
	    	$error 		= 1;
	    	$message 	= "The First Name you entered is not valid, please try again correcting it.";

	    }
  	}

	// VALIDATES THE
  	if (empty($_POST["lastname"])) {

  		// SETS ERROR MESSAGE
    	$error 		= 1;
		$message 	= "You need to fill all input fields in order to register.";

  	} else {

	    $lastname 	= test_input($_POST["lastname"]);

	    // CHECKS IF THE LASTNAME CONTAINS ONLY WHITESPACES AND LETTERS
	    if (!preg_match("/^[a-zA-ZáàÁÀéèÉÈíÍóòÓÒúüÚÜçÇ'· ]*$/",$lastname)) {

	    	// SETS ERROR MESSAGE
	    	$error 		= 1;
	    	$message 	= "The Last Name you entered is not valid, please try again correcting it.";

	    }
  	}

  	// VALIDATES THE
  	if (empty($_POST["birthday"])) {

  		// SETS ERROR MESSAGE
    	$error 		= 1;
		$message 	= "You need to fill all input fields in order to register.";

  	} else {

  		// SETS SPECIFIED DATE RANGE
	    $birthday 			= test_input($_POST["birthday"]);
	    list($y, $m, $d) 	= explode('-', $birthday);
	    $min = 1920;
	    $max = 1998;

	    // CHECKS IF ITS A VLAID DATE
	    if(!checkdate($m, $d, $y)) {

	    	// SETS ERROR MESSAGE
	    	$error 		= 1;
	    	$message 	= "The Birtday you entered is not valid, please try again correcting it.";

	    // CHECKS IF THE DATE IS IN THE SPECIFIED RANGE
	    }elseif (!(($min <= $y) && ($y <= $max))) {

	    	// SETS ERROR MESSAGE
	    	$error 		= 1;
	    	$message 	= "The Birtday you entered is not valid, please try again correcting it.";

	    }
  	}

  	// VALIDATES THE
  	if (empty($_POST["address"])) {

  		// SETS ERROR MESSAGE
    	$error 		= 1;
		$message 	= "You need to fill all input fields in order to register.";

  	} else {

	    $address 	= test_input($_POST["address"]);

	    // CHECKS IF THE ADDRESS CONTAINS ONLY NUMBERS, WHITESPACES AND LETTERS
	    if (!preg_match("/^[a-zA-Z0-9áàÁÀéèÉÈíÍóòÓÒúüÚÜçÇ'·,ºª .]{1,32}$/",$address)) {

	    	// SETS ERROR MESSAGE
	    	$error 		= 1;
	    	$message 	= "The Address you entered is not valid, please try again correcting it.";

	    }
  	}

  	// VALIDATES THE
  	if (empty($_POST["town"])) {

  		// SETS ERROR MESSAGE
    	$error 		= 1;
		$message 	= "You need to fill all input fields in order to register.";

  	} else {

	    $town 		= test_input($_POST["town"]);

	    // CHECKS IF THE TOWN CONTAINS ONLY WHITESPACES AND LETTERS
	    if (!preg_match("/^[a-zA-ZáàÁÀéèÉÈíÍóòÓÒúüÚÜ'çÇ· ]{1,32}$/",$town)) {

	    	// SETS ERROR MESSAGE
	    	$error 		= 1;
	    	$message 	= "The Town you entered is not valid, please try again correcting it.";

	    }
  	}

  	// VALIDATES THE
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

  	// VALIDATES THE
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

  	// VALIDATES THE
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

	// VALIDATES THE
  	if (empty($_POST["password"])) {

    	$emptypas 		= 1;

  	} else {

	    $password 	= test_input($_POST["password"]);
		$password_hashed = password_hash($password, PASSWORD_DEFAULT);

	    // CHECKS IF THE PASSWORD CONTAINS ONLY NUMBERS AND LETTERS
	    if (!preg_match("/^[a-zA-Z0-9]*$/",$password)) {

	    	// SETS ERROR MESSAGE
	    	$error 		= 1;
	    	$message 	= "The Password you entered is not valid, please try again correcting it.";

	    }
  	}


  	if (session_status() == PHP_SESSION_NONE){
		session_start();
	}

  	$username = $_SESSION['username'];

  	//Checks if the previous controls returned an error and if the user is unique
  	//Creates the user and/or redirect to error message
	if($error == 1){
	}elseif ($emptypas 	= 1) {
		modify_exceptPassword($firstname, $lastname, $birthday, $address, $town, $postal_code, $telephone, $credit_card, $username);
	}else{
		modify_all($firstname, $lastname, $birthday, $address, $town, $postal_code, $telephone, $credit_card, $password, $username);
	}

	header("Location: http://deic-dc0.uab.cat/~tdiw-r4/index.php?user_info");
?>
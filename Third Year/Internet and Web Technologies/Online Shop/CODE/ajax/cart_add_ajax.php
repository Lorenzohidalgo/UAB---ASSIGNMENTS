<?php
require_once('../model/db_functions.php');

if(session_status() == PHP_SESSION_NONE){
	session_start();
}

if(isset($_GET['amount']) && isset($_GET['product'])){
	$error = 0;

	//CHECKS IF RECIEVED AMOUNT IS VALID
	if(isset($_GET['amount']) && $_GET['amount'] > 0){

		$amount = $_GET['amount'];

	}else{

		$error 	= 1;

	}

	//CHECKS IF RECIEVED PRODCUT ID IS VALID
	if(isset($_GET['product'])){

		$id 	= $_GET['product'];

	}else{

		$error 	= 1;

	}

	// CHECKS IF AN ERROR OCURRED
	if(!$error){

		// GETS PRODUCT INFO BY PRODUCT ID
		$result = getProductbyId($id);
		$product    = $result->fetch();

		// LOADING PRODUCT INFO INTO TEMP "MATRIX"
		$add_product['product_id'] 			= $product['id'];
		$add_product['product_name'] 		= $product['name'];
		$add_product['product_price'] 		= $product['price'];
		$add_product['product_amount'] 		= $amount;
		$add_product['product_description'] = $product['description'];

		// CHECKS IF THE SESSION VARIABLE ALREADY EXISTS
		if(isset($_SESSION['products'])){ 

			// CHECKS IF ITEM ALREADY EXISTS
			if (isset($_SESSION['products'][$add_product['product_id']])) { 

				// DELETES OLD ITEM
				unset($_SESSION['products'][$add_product['product_id']]); 
				
			}
		}

		// ADDS PRODUCT TO CART "MATRIX"
		$_SESSION['products'][$add_product['product_id']] = $add_product;

	}
}else{
	// DELETES ITEM
	$id 	= $_GET['product'];

	// CHECKS IF THE SESSION VARIABLE ALREADY EXISTS
	if(isset($_SESSION['products'])){

		// CHECKS IF ITEM ALREADY EXISTS 
		if (isset($_SESSION['products'][$id])) { 

			// DELETES ITEM
			unset($_SESSION['products'][$id]); 

		}
	}
}

if (isset($_SESSION['products'])) {

	// COUNTS AND RETURNS THE PRODUCT NUMBER
	echo count($_SESSION['products']);
	
}else{

	echo 'error';

}

?>

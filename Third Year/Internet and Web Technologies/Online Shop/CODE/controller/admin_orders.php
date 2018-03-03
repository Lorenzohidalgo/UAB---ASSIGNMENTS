<?php
require_once('/moixero-home/tdiw/tdiw-r4/public_html/model/db_functions.php');

if(session_status() == PHP_SESSION_NONE){
	session_start();
}

//CHECKS IF THE ADMIN IS SEARCHING FOR A SPECIFIC ORDER
if(isset($_GET['order_id']) && $_GET['order_id'] != ""){

	// GETS THE ORDER BY THE ORDER ID
	$result		= getOrderbyId($_GET['order_id']);
	$order	= $result -> fetch();

	// GETS USER BY THE USER ID
	$result				= getUserbyId($order['user_id']);
	$user				= $result -> fetch();

	// CONCATENATES FIRSTNAME AND LASTNAME INTO ONE STRING
	$order['user_name'] = $user['firstname'].' '.$user['lastname'];

	// GETS ALL PRODUCTS FROM THE SPECIFIED ORDER
	$result = getOrderProducts($_GET['order_id']);

	// TURNS TABLE INTO MATRIX
	while ($row=$result->fetch()) {

		$products[] = $row;

	}

	// CHECKS IF THERE ARE ANY PRODUCTS
	if (isset($products)) {

		require("/moixero-home/tdiw/tdiw-r4/public_html/view/admin_orders_product_view.php");

	}else{

		// SETS ERROR MESSAGE
		echo "<div class='registration_page'><div style='text-align: center'><i class='fa fa-exclamation-triangle fa-5x' aria-hidden='true' style='color: red'></i><p style='font-weight: bold'>It looks like we don't find what you're looking for, please try again later</p></div></div>";

	}
	

}else{

	// GETS ALL ORDERS
	$result = getAllOrders();

	// TURNS TABLE INTO "MATRIX"
	while ($row=$result->fetch()) {

		$UserOrders[] = $row;

	}

	// LOOP THAT ADDS THE CLIENT FULL NAME TO THE ORDER "MATRIX"
	foreach ($UserOrders as $order) {

		// GETS USER BY ID
		$result				= getUserbyId($order['user_id']);
		$user				= $result -> fetch();

		// CONCATENATES FIRSTNAME AND LASTNAME INTO ONE STRING
		$order['user_name'] = $user['firstname'].' '.$user['lastname'];

		// CREATES NEW "MATRIX" WITH THE CLIENT NAMES
		$OrdersWithName[] 	= $order;

	}

	// CHECKS IF THERE IS ANY ORDER TO SHOW
	if (isset($OrdersWithName)) {

		require("/moixero-home/tdiw/tdiw-r4/public_html/view/admin_orders_view.php");

	}else{

		// SETS ERROR MESSAGE
		echo "<div class='registration_page'><div style='text-align: center'><i class='fa fa-exclamation-triangle fa-5x' aria-hidden='true' style='color: red'></i><p style='font-weight: bold'>It looks like your clients haven't placed an order yet...</p></div></div>";
		
	}
}
	

<?php
require_once('../model/db_functions.php');

if(session_status() == PHP_SESSION_NONE){
	session_start();
}

if(isset($_GET['shipping_address']) && isset($_GET['total_price'])){

	$shipping_address 	= $_GET['shipping_address'];
	$total_price		= $_GET['total_price'];

	$user_id 			= $_SESSION['id'];

	$now 				= new DateTime();
	$order_date 		= $now->format('Y-m-d H:i:s');

	// CREATES SALE AND GETS SALE ID
	createSale($user_id, $shipping_address, $order_date, $total_price);

	$result 			= getOrderID($user_id, $order_date);
	$result     		= $result->fetch();
	$order_id 			= $result['id'];

	// ADDS BOUGHT PRODUCTS TO THE DB AND UPDATES STOCK
	foreach ($_SESSION['products'] as $product) {
		$product_id 			= $product['product_id'];
		$product_price 			= $product['product_price'];
		$product_amount 		= $product['product_amount'];
		$product_name 			= $product['product_name'];
		$product_description	= $product['product_description'];
		
		productToSale($product_id, $order_id, $product_price, $product_amount, $product_name, $product_description);
	}

	// DELETES THE SESSION VARIABLE, NO ITEMS IN CART
	unset($_SESSION['products']);

	// SUCCESS MESSAGE
	echo '<div class="registration_page"><div style="text-align: center"><i class="fa fa-check fa-5x" aria-hidden="true" style="color: green"></i><p style="font-weight: bold"> Order placed correctly, you will recieve the recieve the bill via email shortly.</p></div></div>';
}

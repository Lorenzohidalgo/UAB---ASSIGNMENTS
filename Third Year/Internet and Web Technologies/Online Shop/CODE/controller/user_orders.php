<?php
require_once('/moixero-home/tdiw/tdiw-r4/public_html/model/db_functions.php');

if(session_status() == PHP_SESSION_NONE){
	session_start();
}

// CHECKS IF THE USER IS LOGGED IN
if(isset($_SESSION['id'])){

	// CHECKS IF THE CLIENT IS LOOCKING FOR A SPECIFIC ORDER
	if(isset($_GET['order_id']) && $_GET['order_id'] != ""){

		// GETS THE ORDER BY THE ID
		$result		= getOrderbyId($_GET['order_id']);
		$order	= $result -> fetch();

		// GETS THE PRODUCTS OF THE SPECIFIED ORDER
		$result = getOrderProducts($_GET['order_id']);

		// TURNS PRODUCT TABLE INTO MATRIX
		while ($row=$result->fetch()) {
			$products[] = $row;
		}

		// CHECKS IF THERE ARE PRODUCTS TO SHOW
		if (isset($products)) {

			// SHOWS PRODUCTS
			require("/moixero-home/tdiw/tdiw-r4/public_html/view/user_orders_product_view.php");

		}else{

			// SETS ERROR MESSAGE
			echo "<div class='registration_page'><div style='text-align: center'><i class='fa fa-exclamation-triangle fa-5x' aria-hidden='true' style='color: red'></i><p style='font-weight: bold'>It looks like we don't find what you're looking for, please try again later</p></div></div>";

		}
		
	// DEFAULT
	}else{

		// GETS ALL ORDERS BY THE USER ID
		$result = getOrders($_SESSION['id']);

		// TURNS ORDER TABLE INTO MATRIX
		while ($row=$result->fetch()) {

			$UserOrders[] = $row;

		}

		// CHECKS IF THERE IS ORDERS TO SHOW
		if (isset($UserOrders)) {

			// SHOWS ORDERS
			require("/moixero-home/tdiw/tdiw-r4/public_html/view/user_orders_view.php");

		}else{

			// SETS ERROR MESSAGE
			echo "<div class='registration_page'><div style='text-align: center'><i class='fa fa-exclamation-triangle fa-5x' aria-hidden='true' style='color: red'></i><p style='font-weight: bold'>It looks like you haven't placed an order yet...</p></div></div>";
			
		}
	}
	


}
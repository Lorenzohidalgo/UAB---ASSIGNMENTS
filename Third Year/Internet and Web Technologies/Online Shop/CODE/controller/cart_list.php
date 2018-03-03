<?php
	require_once("/moixero-home/tdiw/tdiw-r4/public_html/model/db_functions.php");

if(session_status() == PHP_SESSION_NONE){
	session_start();
}

// CHECKS IF THE CLIENT IS LOGGED IN
if (isset($_SESSION['id'])) {

	//RETRIEVES CLIETN DATA BY ID TO SHOW SHIPPING ADDRESS
	$user = get_user($_SESSION['username']);
  	$user = $user->fetch();

}

// CHECKS IF THERE IS ANY ITEM IN THE CART
if(isset($_SESSION['products']) && count($_SESSION['products'])>0){

	// SHOWS THE ITEMS IN THE CART
	require("/moixero-home/tdiw/tdiw-r4/public_html/view/cart_list_view.php");

}else{

	// SETS ERROR MESSAGE
	echo "<div class='registration_page'><div style='text-align: center'><i class='fa fa-exclamation-triangle fa-5x' aria-hidden='true' style='color: red'></i><p style='font-weight: bold'>It looks like your shopping cart is empty.</p></div></div>";
}

?>
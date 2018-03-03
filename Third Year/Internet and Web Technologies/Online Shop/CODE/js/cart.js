/*			HEADER 			*/

// AJAX SHOWS CART 
$('a.cart').on('click', function(){

	// CALLS THE CONTROLLER
	$.get('./controller/cart_list.php', function(data){
		
		// CHANGES INNER HTML TO SHOW THE CONTROLLERS ANSWER
		$('section#catalog').html(data);

	})

	// CLEARS SEARCH BAR VALUE
	$('input.search_input').val("");

	// CHANGES URL TO ENABLE BOOCKMARKING
	history.replaceState(null, null, "index.php?cart");

	// RETURNS FALSE TO AVOID DEFAULT EVENT
	return false;

})


/*			CATALOG 			*/

// AJAX DETECTS CLICK + ADDS PRODUCT
$(document).on('click', 'button.btn-addcart', function() {
	
	// DETECTS AND GETS PROD ID
	var prod_id = $(this).data("id");

	// DETECTS AND GETS PROD AMOUNT
	var prod_amount = $('input#amount_'+prod_id).val();

	// CALLS THE CONTROLLER AND SEND BY GET THE PRODUCT ID AND THE AMOUNT
	$.get('./ajax/cart_add_ajax.php', {product: prod_id, amount: prod_amount}, function(data){

		// CHANGES INNER HTML TO SHOW THE CONTROLLERS ANSWER
		$('span#cart_badge').html(data);

	})

	// RESTORES AMOUNT VALUE SHOWN TO 1
	$('input#amount_'+prod_id).val("1");

	// RETURNS FALSE TO AVOID DEFAULT EVENT
	return false;

})


/*			CART VIEW 			*/

// AJAX DETECTS CLICK + MODIFYS PRODUCT AMOUNT
$(document).on('change', 'input#modify_product', function() {
	
	// DETECTS AND GETS PROD ID
	var prod_id = $(this).data("id");

	// DETECTS AND GETS PROD AMOUNT
	var prod_amount = $(this).val();

	// CALLS THE CONTROLLER AND SEND BY GET THE PRODUCT ID AND THE AMOUNT
	$.get('./ajax/cart_add_ajax.php', {product: prod_id, amount: prod_amount}, function(data){

		// CHANGES INNER HTML TO SHOW THE CONTROLLERS ANSWER
		$('span#cart_badge').html(data);

	})

	// UPDATES THE SHOWN PRODUCT AMOUNT
	$('td#prod_amount_'+prod_id).html(prod_amount+' units');

	// RETURNS FALSE TO AVOID DEFAULT EVENT
	return false;

})

// AJAX DETECTS CLICK + DELETES PRODUCT
$(document).on('click', 'a.cart_delete', function() {
	
	// DETECTS AND GETS PROD ID
	var prod_id = $(this).data("id");

	// CALLS THE CONTROLLER AND SEND BY GET THE PRODUCT ID
	$.get('./ajax/cart_add_ajax.php', {product: prod_id}, function(data){

		// CHANGES INNER HTML TO SHOW THE CONTROLLERS ANSWER
		$('span#cart_badge').html(data);

	})

	// CALLS THE CONTROLLER
	$.get('./controller/cart_list.php', function(data){

		// CHANGES INNER HTML TO SHOW THE CONTROLLERS ANSWER
		$('section#catalog').html(data);

	})

	// RETURNS FALSE TO AVOID DEFAULT EVENT
	return false;

})

// AJAX DETECTS CLICK + PROCESSES THE ORDER
$(document).on('click', 'input.cart_buy', function() {
	
	// DETECTS AND GETS TOTAL PRICE AND SHIPPING ADDRESS
	var total_price = $(this).data("price");
	var spacer 		= ", ";
	var address 	= $('input#address').val();
	var town 		= $('input#town').val();
	var postal_code = $('input#postal_code').val();

	// CONCATENATES ADDRESS, TOWN AND POSTAL CODE TO A SINGLE STRING
	var shipping_address = address.concat(spacer, town, spacer, postal_code);

	// UPDATES INNER HTML OF THE CART BADGE
	$('span#cart_badge').html(0);
	
	
	// CALLS THE CONTROLLER AND SEND BY GET THE TOTAL PRICE AND SHIPPING ADDRESS
	$.get('./ajax/cart_create_order_ajax.php', {total_price: total_price, shipping_address: shipping_address}, function(data){
		
		// CHANGES INNER HTML TO SHOW THE CONTROLLERS ANSWER
		$('section#catalog').html(data);

	})

	// RETURNS FALSE TO AVOID DEFAULT EVENT
	return false;

})
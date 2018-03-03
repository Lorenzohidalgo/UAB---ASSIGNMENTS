
// 			CLIENT

// AJAX CHANGES INNER HTML TO SHOW THE PRODUCTS OF THE ORDER *CLIENT*
$(document).on('click', 'a.order_check_products', function(){
	
	// GETS THE ORDER ID
	var order_id = $(this).data("id");

	// CALLS THE CONTROLLER AND SEND BY GET THE ORDER ID
	$.get('./controller/user_orders.php', {order_id: order_id}, function(data){

		// CHANGES INNER HTML TO SHOW THE CONTROLLERS ANSWER
		$('section#catalog').html(data);

	})

	// CLEARS SEARCH INPUT
	$('input.search_input').val("");

	// CHANGES URL TO ENABLE BOOCKMARKING
	history.replaceState(null, null, "index.php?user_orders&order_id="+order_id);

	// RETURNS FALSE TO AVOID DEFAULT EVENT
	return false;
})

// AJAX CHANGES INNER HTML TO SHOW ORDERS ONLY *CLIENT*
$(document).on('click', 'a.order_go_back', function(){
	
	// CALLS THE CONTROLLER
	$.get('./controller/user_orders.php', function(data){

		// CHANGES INNER HTML TO SHOW THE CONTROLLERS ANSWER
		$('section#catalog').html(data);

	})

	// CLEARS SEARCH INPUT
	$('input.search_input').val("");

	// CHANGES URL TO ENABLE BOOCKMARKING
	history.replaceState(null, null, "index.php?user_orders");

	// RETURNS FALSE TO AVOID DEFAULT EVENT
	return false;
})


// 			ADMIN

// AJAX CHANGES INNER HTML TO SHOW THE PRODUCTS OF THE ORDER *ADMIN*
$(document).on('click', 'a.admin_check_products', function(){
	
	// GETS THE ORDER ID
	var order_id = $(this).data("id");

	// CALLS THE CONTROLLER AND SEND BY GET THE ORDER ID
	$.get('./controller/admin_orders.php', {order_id: order_id}, function(data){

		// CHANGES INNER HTML TO SHOW THE CONTROLLERS ANSWER
		$('section#catalog').html(data);

	})

	// CLEARS SEARCH INPUT
	$('input.search_input').val("");

	// CHANGES URL TO ENABLE BOOCKMARKING
	history.replaceState(null, null, "Administration.php?orders&order_id="+order_id);

	// RETURNS FALSE TO AVOID DEFAULT EVENT
	return false;
})

// AJAX CHANGES INNER HTML TO SHOW ORDERS ONLY *ADMIN*
$(document).on('click', 'a.admin_go_back', function(){
	
	// CALLS THE CONTROLLER 
	$.get('./controller/admin_orders.php', function(data){

		// CHANGES INNER HTML TO SHOW THE CONTROLLERS ANSWER
		$('section#catalog').html(data);

	})

	// // CLEARS SEARCH INPUT
	$('input.search_input').val("");

	// CHANGES URL TO ENABLE BOOCKMARKING
	history.replaceState(null, null, "Administration.php?orders");

	// RETURNS FALSE TO AVOID DEFAULT EVENT
	return false;
})
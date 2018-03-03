// AJAX CHANGES INNER HTML TO SHOW ALL PRODUCTS ON THE ADMIN PAGE
$(document).on('click', 'a.admin_category_current', function(){

	// CALLS THE CONTROLLER
	$.get('./controller/admin_products.php', function(data){

		// CHANGES INNER HTML TO SHOW THE CONTROLLERS ANSWER
		$('section#catalog').html(data);

	})

	// CHANGES URL TO ENABLE BOOCKMARKING
	history.replaceState(null, null, "Administration.php");

	// RETURNS FALSE TO AVOID DEFAULT EVENT
	return false;
})

// AJAX CHANGES INNER HTML TO SHOW THE FORM TO CREATE A NEW PRODUCT
$(document).on('click', 'a.admin_category_add', function(){
	
	// CALLS THE CONTROLLER
	$.get('./controller/admin_new_product.php', function(data){

		// CHANGES INNER HTML TO SHOW THE CONTROLLERS ANSWER
		$('section#catalog').html(data);

	})

	// CHANGES URL TO ENABLE BOOCKMARKING
	history.replaceState(null, null, "Administration.php?new_product");

	// RETURNS FALSE TO AVOID DEFAULT EVENT
	return false;
})

// AJAX CHANGES INNER HTML TO SHOW ALL ORDERS ON THE ADMIN PAGE
$(document).on('click', 'a.admin_category_order', function(){
	
	// CALLS THE CONTROLLER
	$.get('./controller/admin_orders.php', function(data){

		// CHANGES INNER HTML TO SHOW THE CONTROLLERS ANSWER
		$('section#catalog').html(data);

	})

	// CHANGES URL TO ENABLE BOOCKMARKING
	history.replaceState(null, null, "Administration.php?orders");

	// RETURNS FALSE TO AVOID DEFAULT EVENT
	return false;
})
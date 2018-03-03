
// ADMINISTRATION SITE PRODUCT LISTING

// AJAX CHANGES THE INNER HTML TO ONLY SHOW THE CATEGORY SELECTED WITH THE 'SELECT'
$(document).on('change', 'select.category_select', function(){

	// GETS THE CATEGORY ID
	var cat_id = $(this).val();

	// CALLS THE CONTROLLER AND SENDS BY GET THE CATEGORY ID
	$.get('./controller/admin_products_table.php', {category: cat_id}, function(data){

		// CHANGES INNER HTML TO SHOW THE CONTROLLERS ANSWER
		$('div.product_list').html(data);

	})

	// CHANGES URL TO ENABLE BOOCKMARKING
	history.replaceState(null, null, "Administration.php?category="+cat_id);

	// RETURNS FALSE TO AVOID DEFAULT EVENT
	return false;

})

// AJAX EDIT BUTTON CLICK CHANGES INNER HTML TO SHOW THE DETAILED PRODUCT
$(document).on('click', 'a.product_detail', function(){
	
	// GETS THE PRODUCT ID
	var prod_id = $(this).data('id');
	
	// CALLS THE CONTROLLER AND SENDS BY GET THE PRODUCT ID
	$.get('./controller/admin_products_table.php', {product: prod_id}, function(data){

		// CHANGES INNER HTML TO SHOW THE CONTROLLERS ANSWER
		$('div.product_list').html(data);
	})

	// CHANGES URL TO ENABLE BOOCKMARKING
	history.replaceState(null, null, "Administration.php?product="+prod_id);

	// RETURNS FALSE TO AVOID DEFAULT EVENT
	return false; 

})


//AJAX DELETE BUTTON CLICK DELETES THE PRODUCT AND CHANGES THE INNER HTML TO REFRESH THE CONTENT
$(document).on('click', 'a.product_delete', function(){
	
	// GETS THE CATEGORY ID
	var prod_id = $(this).data('id');

	// CALLS THE CONTROLLER AND SEND BY GET THE PRODUCT ID TO DELETE IR
	$.get('./ajax/admin_products_delete_ajax.php', {product: prod_id})

	// CALLS THE CONTROLLER
	$.get('./controller/admin_products_table.php', function(data){

		// CHANGES INNER HTML TO SHOW THE CONTROLLERS ANSWER
		$('div.product_list').html(data);

	})

	// CHANGES URL TO ENABLE BOOCKMARKING
	history.replaceState(null, null, "Administration.php");

	// RETURNS FALSE TO AVOID DEFAULT EVENT
	return false; 

})
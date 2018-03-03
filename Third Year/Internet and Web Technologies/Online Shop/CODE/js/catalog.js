
// 			HEADER

// AJAX CHANGES INNER HTML TO SHOW PRODUCTS BY CATEGORY
$('li.category').on('click', function(){

	// GETS CATEGORY ID
	var cat_id = $(this).data("id");
	
	// CALLS THE CONTROLLER AND SEND BY GET THE CATEGORY ID
	$.get('./controller/catalog.php', {category: cat_id}, function(data){

		// CHANGES INNER HTML TO SHOW THE CONTROLLERS ANSWER
		$('section#catalog').html(data);

	})

	// CLEARS THE SEARCH BAR
	$('input.search_input').val("");

	// CHANGES URL TO ENABLE BOOCKMARKING
	history.replaceState(null, null, "index.php?category="+cat_id);

	// RETURNS FALSE TO AVOID DEFAULT EVENT
	return false;
})

// AJAX ENABLES THE ENTER TRIGGER IN THE SEARCH BAR
$('input.search_input').on('keydown', function(event) {
    if (event.which == 13) {

    	// PREVENTS DEFAULT EVENT
    	event.preventDefault();

        // RETRIEVES TRIMMED VALUE OF THE SEARCH BAR
// CHECKS IF THE TRIMMED VALUE IS VOID
		var text = $.trim($('input.search_input').val());


		// RETRIEVES TRIMMED VALUE OF THE SEARCH BAR
// CHECKS IF THE TRIMMED VALUE IS VOID
		if (text != '') {
			
			// CALLS THE CONTROLLER AND SENDS BY GET THE SEARCH STRING
			$.get('./controller/catalog.php', {search: text}, function(data){

				// CHANGES INNER HTML TO SHOW THE CONTROLLERS ANSWER
				$('section#catalog').html(data);

			})

			// CHANGES URL TO ENABLE BOOCKMARKING
			history.replaceState(null, null, "index.php?search="+text);

		}else{

			// CLEARS THE SEARCH BAR
			$('input.search_input').val("");

		}
    }
})

// AJAX SEARCH BUTTON TRIGGERS THE SEARCH
$('button.btn_search').on('click', function(){

	// RETRIEVES TRIMMED VALUE OF THE SEARCH BAR
	var text = $.trim($('input.search_input').val());

	// CHECKS IF THE TRIMMED VALUE IS VOID
	if (text != '') {

		// CALLS THE CONTROLLER AND SENDS BY GET THE SEARCH STRING
		$.get('./controller/catalog.php', {search: text}, function(data){

			// CHANGES INNER HTML TO SHOW THE CONTROLLERS ANSWER
			$('section#catalog').html(data);

		})

		// CHANGES URL TO ENABLE BOOCKMARKING
		history.replaceState(null, null, "index.php?search="+text);

	}else{

		// CLEARS THE SEARCH BAR
		$('input.search_input').val("");

	}

	// RETURNS FALSE TO AVOID DEFAULT EVENT
	return false;
})

// AJAX CLICKING THE LOGO CHANGES THE INNER HTML TO SHOW ALL PRODUCTS
$('div.logo').on('click', function(){

	// CALLS THE CONTROLLER TO SHOW ALL PRODUCTS
	$.get('./controller/catalog.php', function(data){

		// CHANGES INNER HTML TO SHOW THE CONTROLLERS ANSWER
		$('section#catalog').html(data);

	})

	// CLEARS THE SEARCH BAR
	$('input.search_input').val("");

	// CHANGES URL TO ENABLE BOOCKMARKING
	history.replaceState(null, null, "index.php");

	// RETURNS FALSE TO AVOID DEFAULT EVENT
	return false;
})


// 			CATALOG

// AJAX CHANGES INNER HTML TO SHOW SPECIFIC PRODUCT
$(document).on('click', 'a.product', function(){

	// GETS PRODUCT ID
	var prod_id = $(this).data("id");

	// CALLS THE CONTROLLER AND SEND BY GET THE PRODUCT ID
	$.get('./controller/catalog.php', {product: prod_id}, function(data){

		// CHANGES INNER HTML TO SHOW THE CONTROLLERS ANSWER
		$('section#catalog').html(data);

	})

	// CLEARS THE SEARCH BAR
	$('input.search_input').val("");

	// CHANGES URL TO ENABLE BOOCKMARKING
	history.replaceState(null, null, "index.php?product="+prod_id);

	// RETURNS FALSE TO AVOID DEFAULT EVENT
	return false;
})
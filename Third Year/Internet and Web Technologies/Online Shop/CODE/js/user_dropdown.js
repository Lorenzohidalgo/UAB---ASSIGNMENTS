
// 			HEADER

// WAITS FOR THE DOCUMENT TO BE READY
$(document).ready(function () {

	// DETECTS HOVERING OVER THE CLIENT NAME
	$("div#logged_in").hover(function(){

		// SHOWS THE DROPDOWN MENU
		$("div#user_dropdown").find("ul").stop().slideToggle();

	});
})


// AJAX CLICKING WILL CHANGE THE INNER HTML TO SHOW THE CLIENT INFORMATION
$(document).on('click', 'li.user_info', function(){
	
	// CALLS THE CONTROLLER
	$.get('./controller/user_info.php', function(data){

		// CHANGES INNER HTML TO SHOW THE CONTROLLERS ANSWER
		$('section#catalog').html(data);

	})

	// CLEARS SEARCH INPUT
	$('input.search_input').val("");
	
	// CHANGES URL TO ENABLE BOOCKMARKING
	history.replaceState(null, null, "index.php?user_info");

	// RETURNS FALSE TO AVOID DEFAULT EVENT
	return false;
})

// Ajax Catalog by Product
$(document).on('click', 'li.user_orders', function(){
	
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
/*			REGISTER 			*/

// AJAX CHANGES INNER HTML TO SHOW REGISTER FORM
$(document).on('click', 'a.header_registration', function(){
	
	// CALLS THE CONTROLLER AND SEND BY GET THE CATEGORY ID
	$.get('./view/registration_view.php', function(data){

		// CHANGES INNER HTML TO SHOW THE CONTROLLERS ANSWER
		$('section#catalog').html(data);

	})

	// CLEARS SEARCH INPUT
	$('input.search_input').val("");

	// CHANGES URL TO ENABLE BOOCKMARKING
	history.replaceState(null, null, "index.php?register");

	// RETURNS FALSE TO AVOID DEFAULT EVENT
	return false;
})

// AJAX SUBMITS REGISTER FORM
$(document).on('submit', 'form.register', function(){
	
	// SETS INNER HTML TO VOID TO CLEAR PREVIOUS MISSAGES
	$('div.handling_errors').html("").fadeOut();

	// GETS THE ACTION AND METHOD OF THE FORM
	var registration 	= $(this),
		url 			= registration.attr('action'),
		type 			= registration.attr('method'),
		data 			= {};

	// FINDS ALL INPUTS IN THE FORM WITH THE NAME VALUE AND STORES THEM
	registration.find('[name]').each(function(index, value){

		// SAVES THE FOUND VALUES
		var input_field = $(this),
			name		= input_field.attr('name'),
			value		= input_field.val();

		// SAVES THE VALUES RELATION IN A MATRIX
		data[name] 		= value;
	});

	// AJAX CALL TO SEND THE FORM VALUES TO THE CONTROLLER
	$.ajax({

		url: 	url,
		type: 	type,
		data: 	data,

		// HANDLES THE RESPONSE FROM THE PHP FILE
		success: function(response){

			// SHOWS CONTROLLERS ANSWER
			$('div.handling_errors').html(response).fadeIn();
		}
	});

	// RETURNS FALSE TO AVOID DEFAULT EVENT
	return false;
})


/*			LOG IN 			*/

// AJAX CHANGES INNER HTML TO SHOW LOG IN FORM
$(document).on('click', 'a.header_login', function(){
	
	// CALLS THE CONTROLLER AND SEND BY GET THE CATEGORY ID
	$.get('./view/login_view.php', function(data){

		// CHANGES INNER HTML TO SHOW THE CONTROLLERS ANSWER
		$('section#catalog').html(data);

	})

	// CLEARS SEARCH INPUT
	$('input.search_input').val("");

	// CHANGES URL TO ENABLE BOOCKMARKING
	history.replaceState(null, null, "index.php?login");

	// RETURNS FALSE TO AVOID DEFAULT EVENT
	return false;
})

// AJAX SUBMITS THE LOG IN FORM
$(document).on('submit','form.login', function(){
	
	// SETS INNER HTML TO VOID TO CLEAR PREVIOUS MISSAGES
	$('div.handling_errors').html("").fadeOut();

	// GETS THE ACTION AND METHOD OF THE FORM
	var registration 	= $(this),
		url 			= registration.attr('action'),
		type 			= registration.attr('method'),
		data 			= {};

	// FINDS ALL INPUTS IN THE FORM WITH THE NAME VALUE AND STORES THEM
	registration.find('[name]').each(function(index, value){

		// SAVES THE FOUND VALUES
		var input_field = $(this),
			name		= input_field.attr('name'),
			value		= input_field.val();

		// SAVES THE VALUES RELATION IN A MATRIX
		data[name] 		= value;
	});

	// AJAX CALL TO SEND THE FORM VALUES TO THE CONTROLLER
	$.ajax({

		url: 	url,
		type: 	type,
		data: 	data,

		// HANDLES THE RESPONSE GIVEN FROM THE PHP FILE
		success: function(response){

			// CHECKS IF THE ANSWER IS ERROR
			if (response != 1) {

				// SHOWS ERROR MESSAGE
				$('div.handling_errors').html(response).fadeIn();

			// IF SUCCESS
			}else{

				// SENDS THE USER TO THE INDEX
				$(location).attr('href', './index.php');
			}
			
		}
	});

	// RETURNS FALSE TO AVOID DEFAULT EVENT
	return false;
})
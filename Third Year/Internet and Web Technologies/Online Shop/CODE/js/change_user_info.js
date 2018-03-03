// SUBMITS THE USER INFORMATION
$(document).on('submit', 'form.change_info', function(event){
	
	// SETS INNER HTML TO "" TO DELETE LAS ERROR MESSAGE
	$('div.h_errors').html("").fadeOut();

	// PREVENTS DEFAULT EVENT
	event.preventDefault();
	
	// GETS THE ACTION AND METHOD FROM THE FORM
	var registration 	= $(this),
		url 			= registration.attr('action'),
		type 			= registration.attr('method'),
		data 			= {};

	// FINDS ALL INPUT FIELDS IN THE FORM WITH THE NAME ATRIBUTE AND SAVES THEM IN A "MATRIX"
	registration.find('[name]').each(function(index, value){
		
		// SAVES THE VALUES
		var input_field = $(this),
			name		= input_field.attr('name'),
			value		= input_field.val();

		// SAVES THE DATA RELATION IN THE "MATRIX"
		data[name] 		= value;
	});

	// AJAX CALL TO SEND THE DATA TO THE CONTROLLER
	$.ajax({

		url: 	url,
		type: 	type,
		data: 	data,

		// HANDLES THE RESPONSE
		success: function(response){

			// CHANGES INNER HTML TO SHOW THE CONTROLLERS ANSWER
			$('div.h_errors').html(response).fadeIn();

		}
	});

	// RETURNS FALSE TO AVOID DEFAULT EVENT
	return false;
})
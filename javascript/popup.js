/* Helper Functions */

function $(id){
	var element = document.getElementById(id);
	
	if( element == null )
		alert( 'Programmer error: ' + id + ' does not exist.' );
	return element;
}

/* Modal */

// Warning for quantity
function testValidQuantity(id) {
	return ( (isNaN($(id).value) || $(id).value < 1 || $(id).value > 100) && $(id).value.length > 0 );
}

function warnInvalidQuantity(id) {
	$(id).style.border = "";
	$('errQuantity').innerHTML = "";	
	
	if ( testValidQuantity(id) ) {
		$('errQuantity').innerHTML = "Quantity must be between 1-100 (inclusive).";
		$(id).style.border = "1px solid red";
	}
}

// Validates submission
function validPopUp(id) {
	
	// Resets all borders
	$(id).style.border = "";	

	// Checks for missing fields
	if ( $(id).value.length < 1 ) {
		$('errQuantity').innerHTML = "Please fill in all required fields.";
		$(id).style.border = "1px solid red";
		$(id).focus();
		return false;
	}
	
	// Checks for a valid quantity
	if ( testValidQuantity(id) ) {
		warnInvalidQuantity(id);
		return false;
	}
	
}
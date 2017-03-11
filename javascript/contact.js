/* Helper Functions */

function $(id){
	var element = document.getElementById(id);
	
	if( element == null )
		alert( 'Programmer error: ' + id + ' does not exist.' );
	return element;
}


/* Contact Us Form */


// Warning for name field
function warnInvalidName(id){
	$(id).style.border = "";
	$('errFullName').innerHTML = ""
	
	if ( /[^a-zA-Z ]+/.test( $(id).value ) ) {
		$(id).style.border = "1px solid red";
		
		if ( id == "txtFullName" ){
			$('errFullName').innerHTML = " Valid names contain only alphabetical characters.";
		}

	}
}

// Warning for email field
function testValidEmail(id) {
	var str = $(id).value;
	
	return ( str.length > 0 
		&& (/[a-zA-Z\d_]+\@[a-zA-z]+\.[a-zA-z]{2,3}/.test( $(id).value ))
		&& str.substring(str.length-4) == ".com" 
		|| str.substring(str.length-4) == ".org" 
		|| str.substring(str.length-3) == ".ca" );
}

function warnInvalidEmail(id) {
	$(id).style.border = "";
	$('errEmail').innerHTML = "";
	
	if ( !testValidEmail(id) ){
		$('errEmail').innerHTML = " Valid emails contain an @ symbol and end with .com, .ca, or .org.";
		$(id).style.border = "1px solid red";
	}
}

// Validate submission
function validFeedback() {
	var feedbackInfo = ['txtFullName', 'txtEmail', 'txtFeedback'];
		
	// Resets all borders
	for ( var j = 0; j < feedbackInfo.length; j++ ) {
		$(feedbackInfo[j]).style.border = "";	
	}
	
	for ( var i = 0; i < feedbackInfo.length; i++ ) {
		
		// Checks for missing fields
		if ( $(feedbackInfo[i]).value.length < 1 ) {
			$('errFeedback').innerHTML = " Please fill in all required fields.";
			$(feedbackInfo[i]).style.border = "1px solid red";
			$(feedbackInfo[i]).focus();
			return false;
		}
		
		// Checks for an invalid name
		if ( i == 0 ) {
			if ( /[^a-zA-Z ]+/.test( $('txtFullName').value ) ) {
				warnInvalidName(feedbackInfo[i]);
				return false;
			}
		}
		
		// Checks for a invalid email
		if ( i == 1 ) {
			if ( !testValidEmail(feedbackInfo[i]) ) {
				warnInvalidEmail(feedbackInfo[i]);
				return false;
			}
		}
		
	}
	
}
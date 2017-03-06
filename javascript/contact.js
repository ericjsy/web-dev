/* Helper Functions */

function $(id){
	var element = document.getElementById(id);
	
	if( element == null )
		alert( 'Programmer error: ' + id + ' does not exist.' );
	return element;
}

/* Contact Us Form */

function testValidEmail(id) {
	var str = $(id).value;
	
	return ( str.length > 0 && str.substring(str.length-4) == ".com" || str.substring(str.length-4) == ".org" || str.substring(str.length-3) == ".ca" );
}

function warnInvalidEmail(id) {
	if ( !testValidEmail(id) )
		$('feedbackError').innerHTML = " Valid emails end in .com, .ca, or .org";
}

function validFeedback() {
	var feedbackInfo = [$('fname'), $('email'), $('feedback')];
	var errorMessage = ["full name", "email", "feedback"];
		
	// Resets all borders
	for ( var j = 0; j < feedbackInfo.length; j++ ) {
		feedbackInfo[j].style.border = "";	
	}
	
	// Indicates missing field and prints out appropriate error message
	for (i = 0; i < feedbackInfo.length; i++) {
		
		if ( feedbackInfo[i].value.length < 1 ) {
			$('feedbackError').innerHTML = " Please provide your " + errorMessage[i] + ".";
			feedbackInfo[i].style.border = "1px solid red";
			feedbackInfo[i].focus();
			return false;
		}	
		
	}
	
	if ( !testValidEmail(id) ) {
		return false;
	}
	
}
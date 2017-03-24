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
	$('errName').innerHTML = ""
	
	if ( /[^a-zA-Z ]+/.test( $(id).value ) ) {
		$(id).style.border = "1px solid red";
		
		if ( id == "txtName" ){
			$('errName').innerHTML = " Valid names contain only alphabetical characters.";
		}

	}
}

// Warning for email field
function testValidEmail(id) {
	var str = $(id).value;
	
	return ( (/^[a-zA-Z\d_]+\@[a-zA-Z]+\.[a-zA-Z]{2,3}/.test( $(id).value ))
		&& str.substring(str.length-4) == ".com" 
		|| str.substring(str.length-4) == ".org" 
		|| str.substring(str.length-3) == ".ca" );
}

function warnInvalidEmail(id) {
	$(id).style.border = "";
	$('errEmail').innerHTML = "";
	
	if ( !testValidEmail(id) && $(id).value.length > 0 ){
		$('errEmail').innerHTML = "Valid emails require an '@' and a domain name. They cannot include spaces and must end in .com, .ca, or .org";
		$(id).style.border = "1px solid red";
	}
}

// Validates submission
function validFeedback() {
	var feedbackInfo = ['txtName', 'txtEmail', 'taFeedback'];
		
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
			if ( /[^a-zA-Z ]+/.test( $(feedbackInfo[i]).value ) ) {
				warnInvalidName(feedbackInfo[i]);
				return false;
			}
		}
		
		// Checks for an invalid email
		if ( i == 1 ) {
			if ( !testValidEmail(feedbackInfo[i]) ) {
				warnInvalidEmail(feedbackInfo[i]);
				return false;
			}
		}
		
	}
	
}
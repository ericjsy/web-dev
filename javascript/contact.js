/* Helper Functions */

function $(id){
	var element = document.getElementById(id);
	
	if( element == null )
		alert( 'Programmer error: ' + id + ' does not exist.' );
	return element;
}

/* Contact Us Form */

// Validate name
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

// Validate Email
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
		$('errEmail').innerHTML = " Valid emails require an '@' and must end in .com, .ca, or .org";
		$(id).style.border = "1px solid red";
	}
}

function validFeedback() {
	var feedbackInfo = ['txtFullName', 'txtEmail', 'txtFeedback'];
		
	// Resets all borders
	for ( var j = 0; j < feedbackInfo.length; j++ ) {
		$(feedbackInfo[j]).style.border = "";	
	}
	
	// Indicates missing field and prints out error message
	for (i = 0; i < feedbackInfo.length; i++) {
		
		if ( $(feedbackInfo[i]).value.length < 1 ) {
			$('errFeedback').innerHTML = " Please fill in all required fields.";
			$(feedbackInfo[i]).style.border = "1px solid red";
			$(feedbackInfo[i]).focus();
			return false;
		}	
		
	}
	
}
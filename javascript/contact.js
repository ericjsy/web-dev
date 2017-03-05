// Helper Functions

function $(id){
	var element = document.getElementById(id);
	
	if( element == null )
		alert( 'Programmer error: ' + id + ' does not exist.' );
	return element;
}

// Contact Us Form

function testValidEmail(id) {
	var str = $(id).value;
	
	return ( str.length > 0 && str.substring(str.length-4) == ".com" || str.substring(str.length-4) == ".org" || str.substring(str.length-3) == ".ca" );
}

function warnInvalidEmail(id) {
	if ( !testValidEmail(id) )
		$('feedbackError').innerHTML = " Valid emails end in .com, .ca, or .org";
}

function validFeedback() {
	var x = document.forms["contact"]["fname"];
	var y = document.forms["contact"]["email"];
	var z = document.forms["contact"]["feedback"];

	if ( x.value.length < 1 ) {
		$('feedbackError').innerHTML = " Please provide your full name.";
		x.style.border = "1px solid red";
		y.style.border = "";
		z.style.border = "";
		x.focus();
		return false;
	}
	
	if ( y.value.length < 1 ) {
		$('feedbackError').innerHTML = " Please provide your email.";
		x.style.border = "";
		y.style.border = "1px solid red";
		z.style.border = "";
		y.focus();
		return false;
	}
		
	if ( z.value.length < 1 ) {
		$('feedbackError').innerHTML = " Please provide feedback.";
		x.style.border = "";
		y.style.border = "";
		z.style.border = "1px solid red";
		z.focus();
		return false;
	}
	
	if ( !testValidEmail(id) ) {
		return false;
	}
	
}
/* Helper functions */

function $(id){
	var element = document.getElementById(id);

	if( element == null )
		alert( 'Programmer error: ' + id + ' does not exist.' );
	return element;
}

/* Catering Form */

function validCatering() {

	var cateringInfo = [ 
		{ field: $('txtFirstName'), error: $('errFirstName'), message: "a first name" },
		{ field: $('txtLastName'), error: $('errLastName'), message: "a last name" },
		{ field: $('numPhone_0'), error: $('errPhone'), message: "a phone number" },
		{ field: $('numPhone_1'), error: $('errPhone'), message: "a phone number" },
		{ field: $('numPhone_2'), error: $('errPhone'), message: "a phone number" },
		{ field: $('txtEmail'), error: $('errEmail'), message: "an email address" },
		{ field: $('txtAddress'), error: $('errAddress'), message: "a physical address" },
		{ field: $('txtDate'), error: $('errCatering'), message: "a date" },
		{ field: $('txtStartTime'), error: $('errStartTime'), message: "a start time" },
		{ field: $('txtEndTime'), error: $('errEndTime'), message: "an end time" },
		{ field: $('lstFunction'), error: $('errFunction'), message: "a function or select one from the list" },
		{ field: $('numGuests'), error: $('errGuests'), message: "the number of guests" }
	];
	
	// Resets all borders
	for (j = 0; j < cateringInfo.length; j++) {
		cateringInfo[j].field.style.border = "";
	}
	
	// Indicates missing field and prints out appropriate error message
	for (i = 0; i < cateringInfo.length; i++) {
				
		if ( cateringInfo[i].field.value.length < 1 ) {
			$('errCatering').innerHTML = "Please fill in all required fields.";
			cateringInfo[i].error.innerHTML = "Please enter " + cateringInfo[i].message + ".";
			cateringInfo[i].field.style.border = "1px solid red";
			cateringInfo[i].field.focus();
			return false;
		}	
		
	}

}
	
// Validate name, type of function
function warnInvalidName(id){
	$(id).style.border = "";
	
	if ( id == "txtFirstName" ){
		$('errFirstName').innerHTML = "";
	} else if ( id == "txtLastName" ) {
		$('errLastName').innerHTML = "";
	} else if ( id == "lstFunction" ) {
		$('errFunction').innerHTML = "";
	}
	
	if ( /[^a-zA-Z]+/.test( $(id).value ) ) {
		$(id).style.border = "1px solid red";
		$(id).focus();
		
		if ( id == "txtFirstName" ){
			$('errFirstName').innerHTML = " Valid names contain only alphabetical characters.";
		} else if ( id == "txtLastName" ){
			$('errLastName').innerHTML = " Valid names contain only alphabetical characters.";
		} else if ( id == "lstFunction" ) {
			$('errFunction').innerHTML = " Valid function names contain only alphabetical characters.";
		}
	}
}

// Validate phone number
function warnInvalidPhone01(id){
	$(id).style.border = "";
	$('errPhone').innerHTML = "";
	
	if ( isNaN($(id).value) || $(id).value < 100 || $(id).value > 999 ) {
		$('errPhone').innerHTML = " Valid phone numbers are in the format ###-###-####.";
		$(id).style.border = "1px solid red";
		$(id).focus();
	} 
}

function warnInvalidPhone2(id) {
	$(id).style.border = "";
	$('errPhone').innerHTML = "";
		
	if ( isNaN($(id).value) || $(id).value < 1000 || $(id).value > 9999 ) {
		$('errPhone').innerHTML = " Valid phone numbers are in the format ###-###-####.";
		$(id).style.border = "1px solid red";
		$(id).focus();
	}
}

// Validate email
function testValidEmail(id) {
	var str = $(id).value;
	
	return ( str.length > 0 
		&& str.substring(str.length-4) == ".com" 
		|| str.substring(str.length-4) == ".org" 
		|| str.substring(str.length-3) == ".ca" );
}

function warnInvalidEmail(id) {
	$(id).style.border = "";
	$('errEmail').innerHTML = "";
	
	if ( !testValidEmail(id) ){
		$('errEmail').innerHTML = " Valid emails end in .com, .ca, or .org";
		$(id).style.border = "1px solid red";
		$(id).focus();
	}
}

// Validate address
function warnInvalidAddress(id){
	$(id).style.border = "";
	$('errAddress').innerHTML = "";
	
	if ( /[^0-9a-zA-Z ]+/.test( $(id).value) ){
		$('errAddress').innerHTML = " Valid addresses contain only alphanumeric characters.";
		$(id).style.border = "1px solid red";
		$(id).focus();
	}
}

function warnInvalidDate(id){
	var a = new Date( $(id).value );
	var b = new Date();
	b.setDate( b.getDate() + 13 );
	
	$(id).style.border = "";
	$('errDate').innerHTML = "";

	if ( isNaN( Date.parse(a) ) || a < b ){
		$('errDate').innerHTML = " The date of the function must be at least two weeks from the order date."
			+ " If a day, month, or year is not specified, it will default to 1 (eg, 2001, January, or 1st).";
		$(id).style.border = "1px solid red";
		$(id).focus();
	}
}	

// Validate number of guests
function warnInvalidGuests(id){
	$(id).style.border = "";
	$('errGuests').innerHTML = "";
	
	if ( isNaN($(id).value) || $(id).value < 50 ){
		$('errGuests').innerHTML = " A minimum of 50 guests is required.";
		$(id).style.border = "1px solid red";
		$(id).focus();
	}
}

// Clear warnings
function clearWarning(id){
	if ( $(id).value.length > 0 ){
		$(id).style.border = "";
		$('errDate').innerHTML = "";
		$('errStartTime').innerHTML = "";
		$('errEndTime').innerHTML = "";
	}
}
	
	
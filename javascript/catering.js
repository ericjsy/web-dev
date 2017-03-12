/* Helper functions */

function $(id){
	var element = document.getElementById(id);

	if( element == null )
		alert( 'Programmer error: ' + id + ' does not exist.' );
	return element;
}

/* Catering Form */
	
// Warning for name, type of function fields
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
		
		if ( id == "txtFirstName" ){
			$('errFirstName').innerHTML = " Valid names contain only alphabetical characters.";
		} else if ( id == "txtLastName" ){
			$('errLastName').innerHTML = " Valid names contain only alphabetical characters.";
		} else if ( id == "lstFunction" ) {
			$('errFunction').innerHTML = " Valid function names contain only alphabetical characters.";
		}
	}
}

// Warning for phone number field
function warnInvalidPhone01(id){
	$(id).style.border = "";
	$('errPhone').innerHTML = "";
	
	if ( isNaN($(id).value) || $(id).value < 100 || $(id).value > 999 ) {
		$('errPhone').innerHTML = " Valid phone numbers are in the format ###-###-####.";
		$(id).style.border = "1px solid red";
	} 
}

function warnInvalidPhone2(id) {
	$(id).style.border = "";
	$('errPhone').innerHTML = "";
		
	if ( isNaN($(id).value) || $(id).value < 1000 || $(id).value > 9999 ) {
		$('errPhone').innerHTML = " Valid phone numbers are in the format ###-###-####.";
		$(id).style.border = "1px solid red";
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
		$('errEmail').innerHTML = " Valid emails require an '@' and must end in .com, .ca, or .org";
		$(id).style.border = "1px solid red";
	}
}

// Warning for address field
function warnInvalidAddress(id){
	$(id).style.border = "";
	$('errAddress').innerHTML = "";
	
	if ( /[^0-9a-zA-Z ]+/.test( $(id).value) ){
		$('errAddress').innerHTML = " Valid addresses contain only alphanumeric characters.";
		$(id).style.border = "1px solid red";
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
		$(id).style.border = "1px solid red";
	}
}	

// Warning for number of guests
function warnInvalidGuests(id){
	$(id).style.border = "";
	$('errGuests').innerHTML = "";
	
	if ( isNaN($(id).value) || $(id).value < 50 ){
		$('errGuests').innerHTML = " A minimum of 50 guests is required.";
		$(id).style.border = "1px solid red";
	}
}

// Clears warnings
function clearWarning(id){
	if ( $(id).value.length > 0 ){
		$(id).style.border = "";
		$('errDate').innerHTML = "";
		$('errStartTime').innerHTML = "";
		$('errEndTime').innerHTML = "";
	}
}

// Validates submission
function validCatering() {

	var cateringInfo = [ 
		{ field: 'txtFirstName', error: $('errFirstName'), message: "a first name" },
		{ field: 'txtLastName', error: $('errLastName'), message: "a last name" },
		{ field: 'numPhone_0', error: $('errPhone'), message: "a phone number" },
		{ field: 'numPhone_1', error: $('errPhone'), message: "a phone number" },
		{ field: 'numPhone_2', error: $('errPhone'), message: "a phone number" },
		{ field: 'txtEmail', error: $('errEmail'), message: "an email address" },
		{ field: 'txtAddress', error: $('errAddress'), message: "a physical address" },
		{ field: 'txtDate', error: $('errDate'), message: "a date" },
		{ field: 'txtStartTime', error: $('errStartTime'), message: "a start time" },
		{ field: 'txtEndTime', error: $('errEndTime'), message: "an end time" },
		{ field: 'lstFunction', error: $('errFunction'), message: "a function or select one from the list" },
		{ field: 'numGuests', error: $('errGuests'), message: "the number of guests" }
	];
	
	// Resets all borders
	for (j = 0; j < cateringInfo.length; j++) {
		$(cateringInfo[j].field).style.border = "";
	}
	
	// Indicates missing field and prints out appropriate error message
	for (i = 0; i < cateringInfo.length; i++) {
		
		var helperField = $(cateringInfo[i].field);
		var idField = cateringInfo[i].field
		
		// Checks for missing fields
		if ( helperField.value.length < 1 ) {
			$('errCatering').innerHTML = " Please fill in all required fields.";
			cateringInfo[i].error.innerHTML = "Please enter " + cateringInfo[i].message + ".";
			helperField.style.border = "1px solid red";
			helperField.focus();
			return false;
		}	
		
		// Checks for an invalid first name, last name, or function
		if ( i == 0 || i == 1 || i == 10) {
			if ( /[^a-zA-Z]+/.test( helperField.value ) ) {
				warnInvalidName(idField);
				helperField.focus();
				return false;
			}
		}
		
		// Checks for an invalid 3 digit phone number
		if ( i == 2 || i == 3 ) {
			if ( isNaN(helperField.value) || helperField.value < 100 || helperField.value > 999 ) {
				warnInvalidPhone01(idField);
				helperField.focus();
				return false;
			}
		}
		
		// Checks for an invalid 4 digit phone number
		if ( i == 4 ) {
			if ( isNaN(helperField.value) || helperField.value < 1000 || helperField.value > 9999 ) {
				warnInvalidPhone01(idField);
				helperField.focus();
				return false;
			}
		}
		
		// Checks for an invalid email
		if ( i == 5 ) {
			if ( !testValidEmail(idField) ) {
				warnInvalidEmail(idField);
				helperField.focus();
				return false;
			}
		}
		
		// Checks for an invalid address
		if ( i == 6 ) {
			if ( /[^0-9a-zA-Z ]+/.test( helperField.value ) ) {
				warnInvalidAddress(idField);
				helperField.focus();
				return false;
			}
		}
		
		// Checks for an invalid date
		if ( i == 7 ) {
			var a = new Date( helperField.value );
			var b = new Date();
			b.setDate( b.getDate() + 13 );
			
			if ( isNaN( Date.parse(a) ) || a < b ) {
				warnInvalidDate(idField);
				helperField.focus();
				return false;
			}
		}
		
		// Checks for an invalid number of guests
		if ( i == 11 ) {
			if ( isNaN(helperField.value) || helperField.value < 50 ) {
				warnInvalidGuests(idField);
				helperField.focus();
				return false;
			}
		}
		
	}

}
	
	
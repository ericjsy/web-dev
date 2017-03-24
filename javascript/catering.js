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
function warnInvalidPhone(areaCode, threeDigit, fourDigit) {
	$(areaCode).style.border = "";
	$(threeDigit).style.border = "";
	$(fourDigit).style.border = "";
	$('errPhone').innerHTML = "";	
	
	if ( (isNaN($(areaCode).value) || $(areaCode).value < 100 || $(areaCode).value > 999) && $(areaCode).value.length > 0 ) {
		$(areaCode).style.border = "1px solid red";
		$('errPhone').innerHTML = "Valid phone numbers are in the format ###-###-####.";
	} else if ( (isNaN($(threeDigit).value) || $(threeDigit).value < 100 || $(threeDigit).value > 999) && $(threeDigit).value.length > 0 ) {
		$(threeDigit).style.border = "1px solid red";
		$('errPhone').innerHTML = "Valid phone numbers are in the format ###-###-####.";
	} else if ( (isNaN($(fourDigit).value) || $(fourDigit).value < 1000 || $(fourDigit).value > 9999) && $(fourDigit).value.length > 0 ) {
		$(fourDigit).style.border = "1px solid red";
		$('errPhone').innerHTML = "Valid phone numbers are in the format ###-###-####.";
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

// Warning for address field
function warnInvalidAddress(id){
	$(id).style.border = "";
	$('errAddress').innerHTML = "";
	
	if ( /[^0-9a-zA-Z ]+/.test( $(id).value) ){
		$('errAddress').innerHTML = " Valid addresses contain only alphanumeric characters.";
		$(id).style.border = "1px solid red";
	}
}

// Warning for date field
function warnInvalidDate(id){
	var a = new Date( $(id).value );
	var b = new Date();
	b.setDate( b.getDate() + 14 );
	
	var today = new Date();
	var day = today.getDate();
	var month = today.getMonth();
	var year = today.getFullYear(); 
	
	$(id).style.border = "";
	$('errDate').innerHTML = ""; 
	
	if ( a.getDate() == day && a.getMonth() == month && a.getFullYear() == year ) {
		$('errDate').innerHTML = "The date of the function must be at least two weeks from the order date."
		$(id).style.border = "1px solid red";
	} else if ( a < today ) {
		$('errDate').innerHTML = "The date cannot have passed already."
		$(id).style.border = "1px solid red";
	} else if ( isNaN( Date.parse(a) ) || a < b ) {
		$('errDate').innerHTML = "The date of the function must be at least two weeks from the order date."
		$(id).style.border = "1px solid red";
	}
}

// Warning for start time field
function warnInvalidStartTime(){
	var date = new Date( $('txtDate').value );
	var start = [$('txtStartTime').value.substr(0,2), $('txtStartTime').value.substr(-5,2), $('txtStartTime').value.substr(-2,2)];
	var startHours;
	
	$('errStartTime').innerHTML = "";
	var error = "";
	
	if ( start[2] == "PM" ) {
		startHours = parseInt( start[0] ) + 12;
	} else {
		startHours = parseInt( start[0] );
	}
	if ( date.getDay() == 0 || date.getDay() == 6 ) {
		if ( startHours < 10 ) {
			error = "Please enter a time after 10 am";
		} else if ( startHours > 15 || startHours == 15 && start[1] > 0 ) {
			error = "Please enter a time before 3 pm";
		}
	} else {
		if ( startHours < 8 ) {
			error = "Please enter a time after 8 am";
		} else if ( startHours > 16 || startHours == 16 && start[1] > 0) {
			error = "Please enter a time before 4 pm";
		}
	}
	$('errStartTime').innerHTML = error;
}	

// Warning for end time field
function warnInvalidEndTime(){
	var date = new Date( $('txtDate').value );
	var start = [$('txtStartTime').value.substr(0,2), $('txtStartTime').value.substr(-5,2), $('txtStartTime').value.substr(-2,2)];
	var end = [$('txtEndTime').value.substr(0,2), $('txtEndTime').value.substr(-5,2), $('txtEndTime').value.substr(-2,2)];
	var startHours;
	var endHours;
	
	$('errEndTime').innerHTML = "";
	var error = "";
	
	if ( start[2] == "PM" ) {
		startHours = parseInt( start[0] ) + 12;
	} else {
		startHours = parseInt( start[0] );
	}
	
	if ( end[2] == "PM" ) {
		endHours = parseInt( end[0] ) + 12;
	} else {
		endHours = parseInt( end[0] );
	}

	if ( startHours > endHours ) {
		error = "Please enter a time after your chosen start time";
	}
	
	if ( date.getDay() == 0 || date.getDay() == 6 ) {
		if ( endHours < 10 ) {
			error = "Please enter a time after 10 am";
		} else if ( endHours > 15 || endHours == 15 && end[1] > 0 ) {
			error = "Please enter a time before 3 pm";
		}
	} else {
		if ( endHours < 8 ) {
			error = "Please enter a time after 8 am";
		} else if ( endHours > 16 || endHours == 16 && end[1] > 0 ) {
			error = "Please enter a time before 4 pm";
		}
	}
	$('errEndTime').innerHTML = error;
}

// Warning for number of guests
function warnInvalidGuests(id){
	$(id).style.border = "";
	$('errGuests').innerHTML = "";
	
	if ( isNaN($(id).value) && $(id).value.length > 0) {
		$('errGuests').innerHTML = "Please enter numeric values only.";
		$(id).style.border = "1px solid red";
	} else if ( $(id).value < 50 && $(id).value.length > 0 ) {
		$('errGuests').innerHTML = "A minimum of 50 guests is required.";
		$(id).style.border = "1px solid red";
	} else if ( $(id).value > 250 ) {
		$('errGuests').innerHTML = "A maximum of 250 guests is allowed.";
		$(id).style.border = "1px solid red";
	}
}

// Validates submission
function validCatering() {

	var cateringInfo = [ 
		{ field: 'txtFirstName', error: $('errFirstName'), message: "a first name" },
		{ field: 'txtLastName', error: $('errLastName'), message: "a last name" },
		{ field: 'txtPhone_0', error: $('errPhone'), message: "a phone number" },
		{ field: 'txtPhone_1', error: $('errPhone'), message: "a phone number" },
		{ field: 'txtPhone_2', error: $('errPhone'), message: "a phone number" },
		{ field: 'txtEmail', error: $('errEmail'), message: "an email address" },
		{ field: 'txtAddress', error: $('errAddress'), message: "a physical address" },
		{ field: 'txtDate', error: $('errDate'), message: "a date" },
		{ field: 'txtStartTime', error: $('errStartTime'), message: "a start time" },
		{ field: 'txtEndTime', error: $('errEndTime'), message: "an end time" },
		{ field: 'lstFunction', error: $('errFunction'), message: "a function or select one from the list" },
		{ field: 'txtGuests', error: $('errGuests'), message: "the number of guests" }
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
				helperField.style.border = "1px solid red"
				$('errPhone').innerHTML = "Valid phone numbers are in the format ###-###-####.";
				helperField.focus();
				return false;
			}
		}
		
		// Checks for an invalid 4 digit phone number
		if ( i == 4 ) {
			if ( isNaN(helperField.value) || helperField.value < 1000 || helperField.value > 9999 ) {
				helperField.style.border = "1px solid red"
				$('errPhone').innerHTML = "Valid phone numbers are in the format ###-###-####.";
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
			if ( isNaN(helperField.value) || helperField.value < 50 || helperField.value > 250 ) {
				warnInvalidGuests(idField);
				helperField.focus();
				return false;
			}
		}
		
	}

}
	
	
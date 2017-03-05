// Helper functions
function $(id){
var element = document.getElementById(id);
if( element == null )
	alert( 'Programmer error: ' + id + ' does not exist.' );
return element;
}

// Validate Catering form
function validCatering() {
	var a = $('txtFirstName');
	var b = $('txtLastName');
	var c = $('numPhone_0');
	var d = $('numPhone_1');
	var e = $('numPhone_2');
	var f = $('txtEmail');
	var g = $('txtAddress');
	var h = $('txtDate');
	var i = $('txtStartTime');
	var j = $('txtEndTime');
	var k = $('lstFunction');
	var l = $('numGuests');
	
	a.style.border = "";
	b.style.border = "";
	c.style.border = "";
	d.style.border = "";
	e.style.border = "";
	f.style.border = "";
	g.style.border = "";
	h.style.border = "";
	i.style.border = "";
	j.style.border = "";
	k.style.border = "";
	l.style.border = "";
	
	if ( a.value.length < 1 ) {
		$('errCatering').innerHTML = "Please fill in all required fields.";
		$('errFirstName').innerHTML = "Please enter a first name.";
		a.style.border = "1px solid red";
		a.focus();
		return false;
	}
	
	if ( b.value.length < 1 ) {
		$('errCatering').innerHTML = "Please fill in all required fields.";
		$('errLastName').innerHTML = "Please enter a last name.";
		b.style.border = "1px solid red";
		b.focus();
		return false;
	}
	
	if ( c.value.length < 1 ) {
		$('errCatering').innerHTML = "Please fill in all required fields.";
		$('errPhone').innerHTML = "Please enter a phone number.";
		c.style.border = "1px solid red";
		c.focus();
		return false;
	}
	
	if ( d.value.length < 1 ) {
		$('errCatering').innerHTML = "Please fill in all required fields.";
		$('errPhone').innerHTML = "Please enter a phone number.";
		d.style.border = "1px solid red";
		d.focus();
		return false;
	}
	
	if ( e.value.length < 1 ) {
		$('errCatering').innerHTML = "Please fill in all required fields.";
		$('errPhone').innerHTML = "Please enter a phone number.";
		e.style.border = "1px solid red";
		e.focus();
		return false;
	}
	
	if ( f.value.length < 1 ) {
		$('errCatering').innerHTML = "Please fill in all required fields.";
		$('errEmail').innerHTML = "Please enter an email address.";
		f.style.border = "1px solid red";
		f.focus();
		return false;
	}
	
	if ( g.value.length < 1 ) {
		$('errCatering').innerHTML = "Please fill in all required fields.";
		$('errAddress').innerHTML = "Please enter a physical address.";
		g.style.border = "1px solid red";
		g.focus();
		return false;
	}
	
	if ( h.value.length < 1 ) {
		$('errCatering').innerHTML = "Please fill in all required fields.";
		$('errDate').innerHTML = "Please enter a date.";
		h.style.border = "1px solid red";
		h.focus();
		return false;
	}
	
	if ( i.value.length < 1 ) {
		$('errCatering').innerHTML = "Please fill in all required fields.";
		$('errStartTime').innerHTML = "Please enter a start time.";
		i.style.border = "1px solid red";
		i.focus();
		return false;
	}
	
	if ( j.value.length < 1 ) {
		$('errCatering').innerHTML = "Please fill in all required fields.";
		$('errEndTime').innerHTML = "Please enter an end time.";
		j.style.border = "1px solid red";
		j.focus();
		return false;
	}
	
	if ( k.value.length < 1 ) {
		$('errCatering').innerHTML = "Please fill in all required fields.";
		$('errFunction').innerHTML = "Please enter a function or select one from the list.";
		k.style.border = "1px solid red";
		k.focus();
		return false;
	}
	
	if ( l.value.length < 1 ) {
		$('errCatering').innerHTML = "Please fill in all required fields.";
		$('errGuests').innerHTML = "Please enter the number of guests.";
		l.style.border = "1px solid red";
		l.focus();
		return false;
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
	
	
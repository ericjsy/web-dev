/* Helper Functions */

function $(id){
	var element = document.getElementById(id);
	
	if( element == null )
		alert( 'Programmer error: ' + id + ' does not exist.' );
	return element;
}

/* Sign Up Form */

// Validate Log In
function validLogin(){
	var loginInfo = ['txtUsername', 'txtPassword'];
	
	// Resets all borders
	for ( var j = 0; j < loginInfo.length; j++ ) {
		$(loginInfo[j]).style.border = "";	
	}
	
	// Indicates missing field and prints out an error message
	for ( var i = 0; i < loginInfo.length; i++ ) {

		if ( $(loginInfo[i]).value.length < 1 ) {
			$('errLogin').innerHTML = "Please fill in all required fields.";
			$(loginInfo[i]).style.border = "1px solid red";
			$(loginInfo[i]).focus();
		return false;
		}	
		
	}

}

/* New Account Form */

// Warning for password field
function testMatchingPassword(id){
	var x = $(id).value;
	var y = $("txtNewPassword").value;
	
	return ( x != y && x.length > 0 );
}

function verifyPassword(id){
	$(id).style.border = "";
	$('errVerify').innerHTML = "";

	if ( testMatchingPassword(id) ) {
		$('errVerify').innerHTML = "You must re-enter the same password!";
		$(id).style.border = "1px solid red";
	}
}

// Warning for email field
function testValidEmail(id){
	var str = $(id).value;
	
	return ( (/^[a-zA-Z\d_]+\@[a-zA-z]+\.[a-zA-z]{2,3}/.test( $(id).value ))
		&& ( str.substring(str.length-4) == ".com" 
		|| str.substring(str.length-4) == ".org" 
		|| str.substring(str.length-3) == ".ca" ) );
}

function warnInvalidEmail(id){
	$(id).style.border = "";
	$('errEmail').innerHTML = "";
	
	if ( !testValidEmail(id) && $(id).value.length > 0 ){
		$('errEmail').innerHTML = "Valid emails require an '@' and a domain name. They cannot include spaces and must end in .com, .ca, or .org";
		$(id).style.border = "1px solid red";
	}
}

// Validates submission
function validSignup() {
	var signUpInfo = ['txtNewUser', 'txtNewPassword', 'txtVerify', 'txtEmail'];
	
	// Resets all borders
	for ( var j = 0; j < signUpInfo.length; j++ ) {
		$(signUpInfo[j]).style.border = "";	
	}
	
	for ( var i = 0; i < signUpInfo.length; i++ ) {

		// Checks for missing fields
		if ( $(signUpInfo[i]).value.length < 1 ) {
			$('errSignUp').innerHTML = "Please fill in all required fields.";
			$(signUpInfo[i]).style.border = "1px solid red";
			$(signUpInfo[i]).focus();
			return false;
		}
		
		// Checks for different passwords
		if ( i == 2 ) {
			if ( !testMatchingPassword(signUpInfo[i]) ) {
				verifyPassword(signUpInfo[i]);
				return false;
			}
		}
		
		// Checks for an invalid email
		if ( i == 3 ) {
			if ( !testValidEmail(signUpInfo[i]) ) {
				warnInvalidEmail(signUpInfo[i]);
				return false;
			}
		}
		
	}

}
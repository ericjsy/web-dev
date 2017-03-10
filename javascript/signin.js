/* Helper Functions */

function $(id){
	var element = document.getElementById(id);
	
	if( element == null )
		alert( 'Programmer error: ' + id + ' does not exist.' );
	return element;
}

/* Sign Up Form */

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

// Warnings
function testMatchingPassword(id){
	var x = $(id).value;
	var y = $("txtNewPassword").value;
	
	return ( x == y );
}

function verifyPassword(id){
	$(id).style.border = "";
	$('errVerify').innerHTML = "";

	if ( !testMatchingPassword(id) ) {
		$('errVerify').innerHTML = "You must re-enter the same password!";
		$(id).style.border = "1px solid red";
	}
}

// Validate email
function testValidEmail(id){
	var str = $(id).value;
	
	return ( str.length > 0 
		&& (/[a-zA-Z\d_]+\@[a-zA-z]+\.[a-zA-z]{2,3}/.test( $(id).value ))
		&& ( str.substring(str.length-4) == ".com" 
		|| str.substring(str.length-4) == ".org" 
		|| str.substring(str.length-3) == ".ca" ) );
}

function warnInvalidEmail(id){
	$(id).style.border = "";
	$('errEmail').innerHTML = "";
	
	if ( !testValidEmail(id) ){
		$('errEmail').innerHTML = "Valid emails require an '@' and must end in .com, .ca, or .org";
		$(id).style.border = "1px solid red";
	}
}

// Test submission
function validSignup() {
	var signUpInfo = ['txtNewUser', 'txtNewPassword', 'txtVerify', 'txtEmail'];
	
	// Resets all borders
	for ( var j = 0; j < signUpInfo.length; j++ ) {
		$(signUpInfo[j]).style.border = "";	
	}
	
	for ( var i = 0; i < signUpInfo.length; i++ ) {

		// Indicates missing field and prints out appropriate error message
		if ( $(signUpInfo[i]).value.length < 1 ) {
			$('errSignUp').innerHTML = "Please fill in all required fields.";
			$(signUpInfo[i]).style.border = "1px solid red";
			$(signUpInfo[i]).focus();
			return false;
		}
		
		if ( i == 2 ) {
			
			// Tests for verified password
			if ( !testMatchingPassword(signUpInfo[i]) ) {
				$('errVerify').innerHTML = " You must re-enter the same password!";
				$(signUpInfo[i]).style.border = "1px solid red";
				$(signUpInfo[i]).focus();
				return false;
			}
		}
		
		if ( i == 3 ) {
			
			// Tests for a valid email
			if ( !testValidEmail(signUpInfo[i]) ) {
				$('errEmail').innerHTML = " Valid emails contain an @ symbol and end with .com, .ca, or .org.";
				$(signUpInfo[i]).style.border = "1px solid red";
				$(signUpInfo[i]).focus();
				return false;
			}
		}
		
	}

}
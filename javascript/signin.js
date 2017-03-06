/* Helper Functions */

function $(id){
	var element = document.getElementById(id);
	
	if( element == null )
		alert( 'Programmer error: ' + id + ' does not exist.' );
	return element;
}

/* Sign Up Form */

function validLogin(){
	var loginInfo = [$('txtUsername'), $('txtPassword')];
	var errorMessage = ["username", "password"];
	
	// Resets all borders
	for ( var j = 0; j < loginInfo.length; j++ ) {
		loginInfo[j].style.border = "";	
	}
	
	// Indicates missing field and prints out appropriate error message
	for ( var i = 0; i < loginInfo.length; i++ ) {

		if ( loginInfo[i].value.length < 1 ) {
			$('loginError').innerHTML = "Please provide your " + errorMessage[i] + ".";
			loginInfo[i].style.border = "1px solid red";
			loginInfo[i].focus();
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
	$('signUpError').innerHTML = "";

	if ( !testMatchingPassword(id) ) {
		$('signUpError').innerHTML = "You must re-enter the same password!";
		$(id).style.border = "1px solid red";
		$(id).focus();
	}
}

// Validate email
function testValidEmail(id){
	var str = $(id).value;
	
	return ( str.length > 0 
		&& ( str.substring(str.length-4) == ".com" 
		|| str.substring(str.length-4) == ".org" 
		|| str.substring(str.length-3) == ".ca" ) );
}

function warnInvalidEmail(id){
	$(id).style.border = "";
	$('signUpError').innerHTML = "";
	
	if ( !testValidEmail(id) ){
		$('signUpError').innerHTML = " Please provide an email ending in .com, .ca, or .org";
		$(id).style.border = "1px solid red";
		$(id).focus();
	}
}

// Test submission
function validSignup() {
	var signUpInfo = ['txtNewUser', 'txtNewPassword', 'txtVerify', 'txtEmail'];
	var errorMessage = ["provide a username", "provide a password", "verify your password", "provide an email"];
	
	// Resets all borders
	for ( var j = 0; j < signUpInfo.length; j++ ) {
		$(signUpInfo[j]).style.border = "";	
	}
	
	for (var i = 0; i < signUpInfo.length; i++) {

		// Indicates missing field and prints out appropriate error message
		if ( $(signUpInfo[i]).value.length < 1 ) {
			$('signUpError').innerHTML = "Please " + errorMessage[i] + ".";
			$(signUpInfo[i]).style.border = "1px solid red";
			$(signUpInfo[i]).focus();
			return false;
		}
		
		if ( i == 2){
			
			// Tests for verified password
			if ( !testMatchingPassword(signUpInfo[i]) ){
				$('signUpError').innerHTML = " You must re-enter the same password!";
				$(signUpInfo[i]).style.border = "1px solid red";
				$(signUpInfo[i]).focus();
				return false;
			}
		}
		
		if ( i == 3 ){
			
			// Tests for a valid email
			if ( !testValidEmail(signUpInfo[i]) ){
				$('signUpError').innerHTML = " Valid emails contain an @ symbol and end with .com, .ca, or .org.";
				$(signUpInfo[i]).style.border = "1px solid red";
				$(signUpInfo[i]).focus();
				return false;
			}
		}
		
	}

}
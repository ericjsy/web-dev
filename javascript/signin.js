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
	
	var i = 0;
	var j = 0;
	
	for (i; i < loginInfo.length; i++) {
		
		// Resets all borders
		while (j < loginInfo.length) {
		loginInfo[j].style.border = "";	
		j++;
		}
		
		// Indicates missing field and prints out appropriate error message
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
function verifyPassword(id){
	var strX = $(id).value;
	var strY = document.getElementById("txtNewPassword").value;

	if ( strX.length != strY.length ) {
		$('signUpError').innerHTML = "You must re-enter the same password!";
	}
}

function testValidEmail(id) {
	var str = $(id).value;
	
	return ( str.length > 0 && str.substring(str.length-4) == ".com" || str.substring(str.length-4) == ".org" || str.substring(str.length-3) == ".ca" );
}

function warnInvalidEmail(id) {
	if ( !testValidEmail(id) )
		$('signUpError').innerHTML = " Valid emails end in .com, .ca, or .org";
}

// Test submission
function validSignup() {
	var signUpInfo = [$('txtNewUser'), $('txtNewPassword'), $('txtVerify'), $('txtEmail')];
	var errorMessage = ["provide a username", "provide a password", "verify your password", "provide an email"];
	
	var i = 0;
	var j = 0;
	
	for (i; i < signUpInfo.length; i++) {
		
		// Resets all borders
		while (j < signUpInfo.length) {
		signUpInfo[j].style.border = "";	
		j++;
		}
		
		// Indicates missing field and prints out appropriate error message
		if ( signUpInfo[i].value.length < 1 ) {
		$('signUpError').innerHTML = "Please " + errorMessage[i] + ".";
		signUpInfo[i].style.border = "1px solid red";
		signUpInfo[i].focus();
		return false;
		}	
		
	}

}
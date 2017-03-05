// Helper Functions

function $(id){
	var element = document.getElementById(id);
	
	if( element == null )
		alert( 'Programmer error: ' + id + ' does not exist.' );
	return element;
}

// Sign Up Form

function validLogin(){
	var x = document.forms["login"]["txtUsername"];
	var y = document.forms["login"]["txtPassword"];
	
	if ( x.value.length < 1 ) {
		$('loginError').innerHTML = "Please provide your username.";
		x.style.border = "1px solid red";
		y.style.border = "";
		x.focus();
		return false;
	}
	
	if ( y.value.length < 1 ) {
		$('loginError').innerHTML = "Please provide your password.";
		x.style.border = "";
		y.style.border = "1px solid red";
		y.focus();
		return false;
	}

}

// New Account Form

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

function validSignup() {
	var w = document.forms["signIn"]["txtNewUser"];
	var x = document.forms["signIn"]["txtNewPassword"];
	var y = document.forms["signIn"]["txtVerify"];
	var z = document.forms["signIn"]["txtEmail"];

	if ( w.value.length < 1 ) {
		$('signUpError').innerHTML = "Please provide a username.";
		w.style.border = "1px solid red";
		x.style.border = "";
		y.style.border = "";
		z.style.border = "";
		w.focus();
		return false;
	}
	
	if ( x.value.length < 1 ) {
		$('signUpError').innerHTML = "Please provide a password.";
		w.style.border = "";
		x.style.border = "1px solid red";
		y.style.border = "";
		z.style.border = "";
		x.focus();
		return false;
	}
	
	if ( y.value.length < 1 ) {
		$('signUpError').innerHTML = "Please verify your password.";
		w.style.border = "";
		x.style.border = "";
		y.style.border = "1px solid red";
		z.style.border = "";
		y.focus();
		return false;
	}
	
	if ( z.value.length < 1 ) {
		$('signUpError').innerHTML = "Please provide an email.";
		w.style.border = "";
		x.style.border = "";
		y.style.border = "";
		z.style.border = "1px solid red";
		z.focus();
		return false;
	}
}
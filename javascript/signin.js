function $(id){
var element = document.getElementById(id);
if( element == null )
	alert( 'Programmer error: ' + id + ' does not exist.' );
return element;
}

function validLogin(){
var x = document.forms["Login"]["txtUsername"].value;
var y = document.forms["Login"]["txtPassword"].value;
if ( x.length < 1 || y.length < 1 ){
	$("LoginError").innerHTML = "Both the name and email fields must be filled!";
	return false;
	}
}

function verifyPassword(id){
var strX = $(id).value;
var strY = document.getElementById("txtNewPassword").value;
if ( strX.length != strY.length ){
	$("SignUpError").innerHTML = "You must re-enter the same password!";
	}
}

function testValidEmail(id){
var str = $(id).value;
return ( str.length > 0 && str.substring(str.length-4) == ".com" || str.substring(str.length-4) == ".org" || str.substring(str.length-3) == ".ca" );
}
function warnInvalidEmail(id){
if ( !testValidEmail(id) )
	$("SignUpError").innerHTML = "You must enter an email address ending in .com, .ca, or .org";
}
function validSignup(){
var w = document.forms["Signup"]["txtNewUser"].value;
var x = document.forms["Signup"]["txtNewPassword"].value;
var y = document.forms["Signup"]["txtVerify"].value;
var z = document.forms["Signup"]["txtEmail"].value;
if ( w.length < 1 || x.length < 1 || y.length < 1 || z.length < 1 ){
	$("SignUpError").innerHTML = "All fields must be filled!";
	return false;
	}
}
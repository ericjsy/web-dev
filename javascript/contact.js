// Helper Functions

function $(cls) {
	var element = document.getElementsByClassName(cls);
	if ( element == null )
		alert( 'Programmer error: ' + cls + ' does not exist.');
	return element;
}

// Contact Us Form

function submitCheck() {
	var x = document.forms["contactForm"]["fname"];
	var y = document.forms["contactForm"]["email"];
	var z = document.forms["contactForm"]["feedback"];

	if (x.value.length < 1) {
		$('error')[0].innerHTML = " Please provide your full name.";
		x.style.border = "1px solid red";
		y.style.border = "";
		z.style.border = "";
		x.focus();
		return false;
	}
	
	if (y.value.length < 1) {
		$('error')[0].innerHTML = " Please provide your email.";
		x.style.border = "";
		y.style.border = "1px solid red";
		z.style.border = "";
		y.focus();
		return false;
	}
		
	if (z.value.length < 1) {
		$('error')[0].innerHTML = " Please provide feedback.";
		x.style.border = "";
		y.style.border = "";
		z.style.border = "1px solid red";
		z.focus();
		return false;
	}
}
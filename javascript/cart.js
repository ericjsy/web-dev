/* Helper functions */

function $(id){
	var element = document.getElementById(id);

	if( element == null )
		alert( 'Programmer error: ' + id + ' does not exist.' );
	return element;
}

// Call all onBlur functions
function onBlur() {
	validCart(txtQuantity1, txtQuantity2, txtQuantity3, txtQuantity4);
	calcPrice();
}

// Validates Submission
function validCart(txtQuantity1, txtQuantity2, txtQuantity3, txtQuantity4) {
	$('txtQuantity1').style.border = "";
	$('txtQuantity2').style.border = "";
	$('txtQuantity3').style.border = "";
	$('txtQuantity4').style.border = "";
	$('errCart').innerHTML = "";	
	
	if ( (isNaN($('txtQuantity1').value)) && $('txtQuantity1').value.length > 0 ) {
		$('txtQuantity1').style.border = "1px solid red";
		$('errCart').innerHTML = "Invalid quantity.";
		return false;
	} else if ( ($('txtQuantity1').value < 1 || $('txtQuantity1').value > 100) && $('txtQuantity1').value.length > 0 ) {
		$('txtQuantity1').style.border = "1px solid red";
		$('errCart').innerHTML = "Quantity must be between 1-100.";
		return false;
	} else if ( (isNaN($('txtQuantity2').value)) && $('txtQuantity2').value.length > 0 ) {
		$('txtQuantity2').style.border = "1px solid red";
		$('errCart').innerHTML = "Invalid quantity.";
		return false;
	} else if ( ($('txtQuantity2').value < 1 || $('txtQuantity2').value > 100) && $('txtQuantity2').value.length > 0 ) {
		$('txtQuantity2').style.border = "1px solid red";
		$('errCart').innerHTML = "Quantity must be between 1-100.";
		return false;
	} else if ( (isNaN($('txtQuantity3').value)) && $('txtQuantity3').value.length > 0 ) {
		$('txtQuantity3').style.border = "1px solid red";
		$('errCart').innerHTML = "Invalid quantity.";
		return false;
	} else if ( ($('txtQuantity3').value < 1 || $('txtQuantity3').value > 100) && $('txtQuantity3').value.length > 0 ) {
		$('txtQuantity3').style.border = "1px solid red";
		$('errCart').innerHTML = "Quantity must be between 1-100.";
		return false;
	} else if ( (isNaN($('txtQuantity4').value)) && $('txtQuantity4').value.length > 0 ) {
		$('txtQuantity4').style.border = "1px solid red";
		$('errCart').innerHTML = "Invalid quantity.";
		return false;
	} else if ( ($('txtQuantity4').value < 1 || $('txtQuantity4').value > 100) && $('txtQuantity4').value.length > 0 ) {
		$('txtQuantity4').style.border = "1px solid red";
		$('errCart').innerHTML = "Quantity must be between 1-100.";
		return false;
	} else if ( $('txtQuantity1').value.length == 0 ) {
		$('txtQuantity1').style.border = "1px solid red";
		$('errCart').innerHTML = "Please fill in all fields.";
		return false;
	} else if ( $('txtQuantity2').value.length == 0 ) {
		$('txtQuantity2').style.border = "1px solid red";
		$('errCart').innerHTML = "Please fill in all fields.";
		return false;
	} else if ( $('txtQuantity3').value.length == 0 ) {
		$('txtQuantity3').style.border = "1px solid red";
		$('errCart').innerHTML = "Please fill in all fields.";
		return false;
	} else if ( $('txtQuantity4').value.length == 0 ) {
		$('txtQuantity4').style.border = "1px solid red";
		$('errCart').innerHTML = "Please fill in all fields.";
		return false;
	} else $('errCart').innerHTML = "<br>";
}

/* Cart */
function calcPrice() {
	
	var items = [
		{ unitPrice: 1,  quantity: $('txtQuantity1'), subtotal: $('unitst1') },
		{ unitPrice: 2,  quantity: $('txtQuantity2'), subtotal: $('unitst2') },
		{ unitPrice: 5,  quantity: $('txtQuantity3'), subtotal: $('unitst3') },
		{ unitPrice: 10, quantity: $('txtQuantity4'), subtotal: $('unitst4') }
	];
	
	var csubtotal = 0;
	var tax = 0;
	var total = 0;
	
	for ( var i=0; i<items.length; i++ ) {
		
		var price = items[i].quantity.value * items[i].unitPrice;
		
		items[i].subtotal.innerHTML = "$" + price.toFixed(2);
		
		csubtotal += price;
		$('txtSubtotal').innerHTML = "$" + csubtotal.toFixed(2);
		
		tax = csubtotal * 0.05;
		$('txtTax').innerHTML = "$" + tax.toFixed(2);
		
		total = csubtotal + tax;
		$('txtTotal').innerHTML = "$" + total.toFixed(2);
		
	}
	
	var months = [
		"January", "February", "March", "April", "May", "June",
		"July", "August", "September", "October", "November", "December"
	];
	
	var pickup = new Date();
	
	pickup.setDate( pickup.getDate() + 3 );
	$('txtPickup').innerHTML = months[pickup.getMonth()] + " " + pickup.getDate() + ", " + pickup.getFullYear();
	
}


/* Helper functions */

function $(id){
	var element = document.getElementById(id);

	if( element == null )
		alert( 'Programmer error: ' + id + ' does not exist.' );
	return element;
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
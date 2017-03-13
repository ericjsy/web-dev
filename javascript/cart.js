/* Helper functions */

function $(id){
	var element = document.getElementById(id);

	if( element == null )
		alert( 'Programmer error: ' + id + ' does not exist.' );
	return element;
}

/* Cart */
function calculatePrice() {
	var items = [
		{ unitPrice: 1, quantity: $('selQ1'), total: $('price1') },
		{ unitPrice: 2, quantity: $('selQ2'), total: $('price2') },
		{ unitPrice: 1, quantity: $('selQ3'), total: $('price3') },
		{ unitPrice: 25, quantity: $('selQ4'), total: $('price4') }
	];
	
	var subtotal = 0;
	var tax = 0;
	var total = 0;
	
	var months = [
		"January", "February", "March", "April", "May", "June",
		"July", "August", "September", "October", "November", "December"
	];
	var pickup = new Date();
	pickup.setDate( pickup.getDate() + 3 );
	$('txtPickup').innerHTML = months[pickup.getMonth()] + " " + pickup.getDate() + " " + pickup.getFullYear();
	
	for ( var i=0; i<items.length; i++ ) {
		
		var price = items[i].quantity.selectedIndex * items[i].unitPrice;
		items[i].total.innerHTML = "$" + price.toFixed(2);
		
		subtotal += price;
		$('txtSubtotal').innerHTML = "$" + subtotal.toFixed(2);
		
		tax = subtotal * 0.05;
		$('txtTax').innerHTML = "$" + tax.toFixed(2);
		
		total = subtotal + tax;
		$('txtTotal').innerHTML = "$" + total.toFixed(2);
		
	}
}
var main = function() {

	jQuery('#goright').click(function() {
		jQuery('#slideshow > div:first')
		.fadeOut(1000)
		.next()
		.fadeIn(1000)
		.end()
		.appendTo('#slideshow');
	});
		
	jQuery('#goleft').click(function() {
		paused = true;
		jQuery('#slideshow > div:last')
		.fadeIn(1000)
		.prependTo('#slideshow')
		.next()
		.fadeOut(1000)
		.end();
	});   
	
};

jQuery(document).ready(main);
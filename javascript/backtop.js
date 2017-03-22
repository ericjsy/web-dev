jQuery(document).ready(function(){

// FadeIn

function fadein() 
{
	var yscroll = jQuery(document).scrollTop();
	var opacity = 0 + yscroll / 50;

	if (jQuery(this).scrollTop() <= 5) { // If page is scrolled more than 50px
        jQuery('.backup').hide(); // Fade in the arrow
    } 
	else {
        jQuery('.backup').show(); // Else fade out the arrow
    };
	
	jQuery('.backup').css("opacity", opacity);
}

function backtop() 
{
	jQuery('.backup').click(
	
	function () { //Also does animate despite 1 parameter
		jQuery("html, body").animate({scrollTop: 0}, 600);
		
		return false;
	});
}

// Scroll

jQuery(window).on('scroll', fadein);

backtop();

// jQuery(window).scroll(function() {

	// if(jQuery(this).scrollTop() < 20)
	// {
		// jQuery('header').fadeIn();
	// }
	// else
	// {
		// jQuery('header').fadeOut();
	// }
// });

});
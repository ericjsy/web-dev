$(document).ready(function(){

// FadeIn

function fadein() 
{
	var yscroll = $(document).scrollTop();
	var opacity = 0 + yscroll / 50;

	if ($(this).scrollTop() <= 5) { // If page is scrolled more than 50px
        $('.backup').hide(); // Fade in the arrow
    } 
	else {
        $('.backup').show(); // Else fade out the arrow
    };
	
	$('.backup').css("opacity", opacity);
}

$(window).on('scroll', fadein);

// Scroll

backtop();

function backtop() 
{
	$('.backup').click(
	
	function () { //Also does animate despite 1 parameter
		$("html, body").animate({scrollTop: 0}, 600);
		
		return false;
	});
}



$(window).scroll(function() {

	if($(this).scrollTop() < 20)
	{
		$('header').fadeIn();
	}
	else
	{
		$('header').fadeOut();
	}
});


});
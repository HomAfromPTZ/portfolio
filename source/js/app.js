(function($) {
	"use strict";

	// ==============================
	// Axis Parallax
	// ==============================
	$("#scene").parallax({
		scalarX: 3,
		scalarY: 3,
		frictionX: 0.5,
		frictionY: 0.5
	});


	// ==============================
	// Login card flip
	// ==============================
	$(".login-button").click(function() {
		$("body").addClass("card_flipped");
	});

	$("#unflip-card").click(function() {
		$("body").removeClass("card_flipped");
	});



	// ==============================
	// Main menu
	// ==============================
	$("#menu-toggle").click(function(){
		$(this).add(".main-menu").toggleClass("active");
	});

	$(".main-menu__item").each(function(index) {
		$(this).css("transition-delay", 0.3+0.1*index + "s");
	});



	// ==============================
	// Fake preloader
	// ==============================
	setTimeout(function(){
		$(".preloader")
			.fadeOut(400, function(){
				$(".flip-card").addClass("loaded");
			});
	}, 500);


	// ==============================
	// Testimonials section bg size
	// ==============================
	if( $(window).width()>1200){
		$(".talks, .contact-form__bg").css("background-size", $(window).width() + "px");
	}



	// ==============================
	// Contact form blur position
	// ==============================
/*	var talks_offset = $("section.talks").offset(),
		cform_offset = $(".contact-form__bg").offset();

	$(".contact-form__bg").css("background-position", "center -" + (cform_offset.top - talks_offset.top) +"px");
*/

	// ==============================
	// SCROLL EVENTS
	// ==============================
	// $(window).scroll(function() {
	// 	// var scrollPos = $(this).scrollTop();
	// });



	// ==============================
	// RESIZE EVENTS
	// ==============================
	$(window).resize(function() {

		// Testimonials section bg size
		if( $(window).width()>1200){
			$(".talks, .contact-form__bg").css("background-size", $(window).width() + "px");
		}


		// Contact form blur position
		/*talks_offset = $("section.talks").offset();
		cform_offset = $(".contact-form__bg").offset();
		$(".contact-form__bg").css("background-position", "center -" + (cform_offset.top - talks_offset.top) +"px");*/
	});
})(jQuery);
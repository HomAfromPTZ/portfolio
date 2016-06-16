(function($) {
	"use strict";

	$("#scene").parallax({
		scalarX: 3,
		scalarY: 3,
		frictionX: 0.5,
		frictionY: 0.5
	});

	$(".login-button").click(function() {
		$("body").addClass("card_flipped");
	});

	$("#unflip-card").click(function() {
		$("body").removeClass("card_flipped");
	});

	$("#menu-toggle").click(function(){
		$(this).add(".main-menu").toggleClass("active");
	});

	$(".main-menu__item").each(function(index) {
		$(this).css("transition-delay", 0.3+0.1*index + "s");
	});

	setTimeout(function(){
		$(".preloader")
			.fadeOut(400, function(){
				$(".flip-card").addClass("loaded");
			});
	}, 500);
})(jQuery);
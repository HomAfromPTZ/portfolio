(function($) {
	'use strict';

	$("#scene").parallax({
		scalarX: 3,
		scalarY: 3,
		frictionX: 0.5,
		frictionY: 0.5
	});

	$(".welcome-page .login-button").click(function() {
		$("body").addClass("welcome-page_flipped");
	});

	$(window).click(function(e) {
		$("body").removeClass("welcome-page_flipped");
	});

	$(".welcome-page .flip-card, .welcome-page .login-button").click(function(e){
		e.stopPropagation();
	});

	setTimeout(function(){
		$(".preloader")
			.fadeOut(400, function(){
				$(".flip-card").addClass("loaded");
			});
	}, 1000);
})(jQuery);
(function($) {
	"use strict";

	// ==============================
	// Animations
	// ==============================
	$.fn.animated = function(inEffect) {
		$(this).each(function() {
			var ths = $(this);
			ths.css("opacity", "0")
				.addClass("animated")
				.waypoint(function(dir) {
					if (dir === "down") {
						ths.addClass(inEffect).css("opacity", "1");
					}
				},
				{
					offset: "90%"
				});
		});
	};

	$("header .svg-heading, talks .svg-heading .testimonial, .portfolio-slider__module>div, .about-me__skills>div").animated("fadeInUp");



	// ==============================
	// Equal Heights
	// ==============================
	$.fn.equalHeights = function() {
		var maxHeight = 0,
			$this = $(this);
		$this.each( function() {
			var height = $(this).height();
			if ( height > maxHeight ) {
				maxHeight = height;
			}
		});

		return $this.css("height", maxHeight);
	};

	$(".about-me>div>div").equalHeights();

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
	// Buttons
	// ==============================
	$("button.go-down").click(function(){
		var go = $(this).data("link");
		$("html, body").stop().animate({
			scrollTop: $(go).offset().top
		}, 700, "swing");
	});

	$("button.go-up").click(function(){
		$("html, body").stop().animate({
			scrollTop: 0
		}, 700, "swing");
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

	// Page change
	$(document).on("click", "a", function(e) {
		var href = $(this).attr("href");
		e.preventDefault();

		return $(".preloader")
			.fadeIn(500, function(){
				return document.location = href != null ? href : "/";
			});
	});

	// ==============================
	// Testimonials section bg size
	// ==============================
	// if( $(window).width()>2000){
	// 	$(".talks, .contact-form__bg").css("background-size", $(window).width() + "px");
	// }



	// ==============================
	// Contact form blur position
	// ==============================
	// document.addEventListener("DOMContentLoaded", blurPosition);
	// function blurPosition(){
	// 	var talks_offset = $("section.talks").offset(),
	// 		cform_offset = $(".contact-form__bg").offset();

	// 	$(".contact-form__bg").css("background-position", "center -" + (cform_offset.top - talks_offset.top) +"px");
	// };

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
		if( $(window).width()>2000){
			$(".talks, .contact-form__bg").css("background-size", $(window).width() + "px");
		}

		$(".about-me>div>div").css("height","auto").equalHeights();

		// Contact form blur position
		// var talks_offset = $("section.talks").offset(),
		// 	cform_offset = $(".contact-form__bg").offset();
		// $(".contact-form__bg").css("background-position", "center -" + (cform_offset.top - talks_offset.top) +"px");
	});
})(jQuery);
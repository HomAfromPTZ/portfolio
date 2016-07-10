(function($) {
	"use strict";
	var preloader = require("./preloader.js"),
		helpers = require("./helpers.js"),
		verticalParallax = require("./verticalParallax.js"),
		forms = require("./forms.js"),
		slider = require("./slider.js"),
		blogNavigation = require("./blogNavigation.js"),
		map = require("./gmap.js");


	// ==============================
	// App global parameters object
	// ==============================
	window.hm = {};

	window.hm.scrollBarWidth = helpers.getScrollbarWidth();
	window.hm.mobileSize = 480 - window.hm.scrollBarWidth;
	window.hm.tabletSize = 768 - window.hm.scrollBarWidth;
	window.hm.resizeLimit = 2000 - window.hm.scrollBarWidth;


	// ==============================
	// Load map
	// ==============================
	if($("#map_wrapper").length){
		google.maps.event.addDomListener(window, "load", map.init("map_wrapper"));
	}

	// ==============================
	// Animation
	// ==============================
	helpers.fadePageOn("a.preload-link");

	$("header .svg-heading, .talks .svg-heading, .talks .testimonial").animated("fadeInUp");
	$(".about-me__skills>div").animated("fadeInUp");
	$(".article, .portfolio-slider__navigation-container, .portfolio-slider__preview-container").animated("fadeIn");
	$(".portfolio-slider__projects-container").animated("fadeIn");

	$(".piechart .piechart__fill").animatePies();



	// ==============================
	// Parallax
	// ==============================

	// Main page mouse parallax
	if($("#scene.axis").length){
		$("#scene.axis").parallax({
			scalarX: 3,
			scalarY: 3,
			frictionX: 0.5,
			frictionY: 0.5
		});
	}

	// Common vertical parallax for other pages
	if($("#scene.vertical").length){
		// 5 - mobile fallback layer number
		verticalParallax.createParallax("#scene.vertical", ".layer", 5);

		// IE scroll jump fix
		if(helpers.ieVersion()) {
			$(".layer").css({transition:"transform .15s linear"});
			$("#scene.vertical").css({transition:"opacity .15s linear"});

			$("body").on("mousewheel", function () {
				event.preventDefault(); 

				var wheelDelta = event.wheelDelta,
					currentScrollPosition = window.pageYOffset;

				window.scrollTo(0, currentScrollPosition - wheelDelta);
			});
		}
	}

	// ==============================
	// Login card flip
	// ==============================
	$(".login-button").click(function() {
		$("body").addClass("card_flipped");
	});

	$("#unflip-card").click(function(e) {
		e.preventDefault();
		$("body").removeClass("card_flipped");
	});



	// ==============================
	// Forms
	// ==============================
	if($("#contact").length){
		forms.contactForm("#contact", "#form-clear");
		forms.onAirCheck("#contact");


	}

	if($("#login").length){
		forms.authForm("#login", "#log-me", true, "shure");
		forms.onAirCheck("#login");
	}




	// ==============================
	// Main menu
	// ==============================
	$("#menu-toggle").click(function(){
		$(this).add(".main-menu, .header__top-row").toggleClass("active");
	});

	$(".main-menu__item").each(function(index) {
		$(this).css("transition-delay", 0.3+0.1*index + "s");
	});




	// ==============================
	// Scroll buttons
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
	// Slider
	// ==============================
	if($(".portfolio-slider").length){
		$(".portfolio-projects .project__title, .portfolio-projects .project__tech")
			.each(function() {
				slider.prepareTitles($(this), 700);
			});

		slider.createSlider(".portfolio-slider", 700);
	}





	// ==============================
	// Blog scroll events
	// ==============================
	if($(".blog-navigation").length){
		blogNavigation();
	}



	// ==============================
	// Contact form blur based on js
	// ==============================
	function set_bg(){
		var section = $(".talks"),
			form = section.find(".contact-form"),
			form_bg = form.find(".contact-form__bg"),
			bg_offset = section.offset().top - form_bg.offset().top;

		form_bg.css({
			"background-position" : "center " + bg_offset + "px"
		});

		// Upscale "testimonials" section background to fit its container
		if( $(window).width() > window.hm.resizeLimit){
			$(".talks, .contact-form__bg").css("background-size", $(window).width() + "px");
		}
	}

	if($(".talks").length){
		$(window).on("load", function() {
			set_bg();
		});

		$(window).resize(function() {
			set_bg();
		});
	}


	// ==============================
	// Admin Tabs
	// ==============================
	if($(".admin-page").length){
		$(".tabs-control__item").on("click", function(){
			var index = $(this).index(),
				content = $(".tabs-content__item");

			content.eq(index)
				.add(this)
				.addClass("active")
				.siblings()
				.removeClass("active");
		});

		$(".form__field_date").pickmeup({
			format  : "d.m.Y",
			hide_on_select : true,
			locale : {
				days: ["Воскресенье", "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота", "Воскресенье"],
				daysShort: ["Вс", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб", "Вс"],
				daysMin: ["Вс", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб", "Вс"],
				months: ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "December"],
				monthsShort: ["Янв", "Фев", "Мар", "Апр", "Май", "Июн", "Июл", "Авг", "Сен", "Окт", "Ноя", "Дек"]
			}
		});
	}


	preloader();

})(jQuery);
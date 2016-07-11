(function($) {
	"use strict";
	var preloader = require("./hm_modules/preloader.js"),
		helpers = require("./hm_modules/helpers.js"),
		verticalParallax = require("./hm_modules/verticalParallax.js"),
		forms = require("./hm_modules/forms.js"),
		slider = require("./hm_modules/slider.js"),
		blogNavigation = require("./hm_modules/blogNavigation.js"),
		map = require("./hm_modules/gmap.js"),
		adminTabs = require("./hm_modules/tabs.js"),
		tinyMceL10n = require("./hm_modules/tinymce_l10n.js"),
		pickMeUp = require("./hm_modules/pickMeUp.js");


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
	// TODO: ADMIN HANDLERS
	// ==============================
	if($(".admin-page").length){
		adminTabs(".tabs-control__item", ".tabs-content__item");
		pickMeUp(".form__field_date");
		tinymce.init({
			selector: ".tinymce-field",
			plugins: "link, image",
			min_height: 200,
			menubar: false,
			toolbar1: "undo redo | bold italic | link image",
			toolbar2: "alignleft aligncenter alignright"
		});

		tinyMceL10n();



		// Image preview
		$(".form__field_file").on("change", function(){
			var input = this,
				preview;

			if($("#image-src").length > 0){
				preview = $("#image-src");
			} else {
				preview = $("<img id='image-src'/>");
				$(".form__field_image-preview").append(preview);
			}

			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					preview.attr("src", e.target.result);
				}

				reader.readAsDataURL(input.files[0]);
			}
		});



		// Skills handlers
		$(".skills").on("click", function(e){
			var clicked = $(e.target);

			if(clicked.is(".skills__remove")){
				$(clicked)
					.closest(".skills__block")
					.fadeOut(500, function(){
						$(this).remove();
					});
			}

			if(clicked.is(".skill__remove")){
				$(clicked)
					.closest(".skill")
					.fadeOut(300, function(){
						$(this).remove();
					});
			}

			if(clicked.is(".skill__new")){
				var button = clicked,
					skill_wrap = $("<li class='skill'></li>"),
					skill_name = $("<input class='skill__name' type='text' placeholder='Технология'/>"),
					skill_perc = $("<input class='skill__percentage' type='number' min='0' max='100' step='0.5' value='0'/>"),
					skill_misc = $("<span class='skill__misc'><span class='skill__percent-sign'>%</span><span class='skill__remove fa fa-close'></span></span>");

				skill_wrap.append(skill_name, skill_perc, skill_misc);
				button.before(skill_wrap);
			}
		});



		$(".skills__block_new").on("click", function(){
			var empty_block = $(this),
				skills_wrap = $("<div class='skills__block'></div>"),
				skills_remove = $("<div class='skills__remove fa fa-close'></div>"),
				skills_heading = $("<input class='skills__heading' type='text' placeholder='Категория'/>"),
				skills_list = $("<ul class='skills__list'><li class='skill skill__new fa fa-plus'></li></ul>");

			skills_wrap.append(skills_remove, skills_heading, skills_list);
			empty_block.before(skills_wrap);

		});
	}


	preloader();

})(jQuery);
(function($) {
	"use strict";

	// ==============================
	// App global parameters object
	// ==============================
	window.hm = {}



	// ==============================
	// Check scrollbar width
	// ==============================
	function getScrollbarWidth(){
		var style = {"max-height":"100px", "overflow":"scroll", "position":"absolute"},
			wrapper = $("<div id='scroll_bar_check_A'></div>").css(style),
			inner = $("<div id='scroll_bar_check_B'></div>"),
			stretcher = $("<img src='/assets/img/force-scroll.png'/>"),
			scrollBarWidth = 0;

		wrapper.append(stretcher).append(inner);
		$("body").append(wrapper);

		scrollBarWidth = wrapper.width()-inner.width();
		wrapper.remove();

		return scrollBarWidth;
	};

	window.hm.scrollBarWidth = getScrollbarWidth();



	// ==============================
	// Check IE version
	// ==============================
	function detect_IE() {
		var ua = window.navigator.userAgent;

		var msie = ua.indexOf("MSIE ");
		if (msie > 0) {
			// IE 10 or older => return version number
			return parseInt(ua.substring(msie + 5, ua.indexOf(".", msie)), 10);
		}

		var trident = ua.indexOf("Trident/");
		if (trident > 0) {
			// IE 11 => return version number
			var rv = ua.indexOf("rv:");
			return parseInt(ua.substring(rv + 3, ua.indexOf(".", rv)), 10);
		}

		var edge = ua.indexOf("Edge/");
		if (edge > 0) {
			// Edge (IE 12+) => return version number
			return parseInt(ua.substring(edge + 5, ua.indexOf(".", edge)), 10);
		}

		// other browser
		return false;
	}



	// ==========================================
	// Preloader with percentage by image count
	// ==========================================
	function preloader() {
		var preloader_stat = $("#preloader-svg__percentage"),
			hasImageProperties = ["background", "backgroundImage", "listStyleImage", "borderImage", "borderCornerImage", "cursor"],
			hasImageAttributes = ["srcset"],
			match_url = /url\(\s*(['"]?)(.*?)\1\s*\)/g,
			all_images = [],
			total = 0,
			count = 0;

		var circle_o = $("#preloader-svg__img .bar__outer"),
			circle_c = $("#preloader-svg__img .bar__center"),
			circle_i = $("#preloader-svg__img .bar__inner"),
			length_o = Math.PI*(circle_o.attr("r") * 2),
			length_c = Math.PI*(circle_c.attr("r") * 2),
			length_i = Math.PI*(circle_i.attr("r") * 2);


		function img_loaded(){
			var percentage = Math.ceil( ++count / total * 100 );

			percentage = percentage > 100 ? 100 : percentage;

			// Draw offsets
			circle_o.css({strokeDashoffset: ((100-percentage)/100)*length_o });

			if(percentage > 50) {
				circle_c.css({strokeDashoffset: ((100-percentage)/100)*length_c });
			}

			if(percentage == 100) {
				circle_i.css({strokeDashoffset: ((100-percentage)/100)*length_i });
			}

			preloader_stat.html(percentage);

			if(count === total) return done_loading();
		}

		function done_loading(){
			$("#preloader").delay(700).fadeOut(700, function(){
				$("#preloader__progress").remove();

				if($(".flip-card").length){
					$(".flip-card").addClass("loaded");
				}
			});
		}

		function images_loop () {
			setTimeout(function () {
				var test_image = new Image();

				test_image.onload = img_loaded;
				test_image.onerror = img_loaded;

				// console.log("C: " + count, " T: " + total);

				if (count != total) {
					if (all_images[count].srcset) {
						test_image.srcset = all_images[count].srcset;
					}
					test_image.src = all_images[count].src;

					images_loop();
				}
			}, 50);
		}

		// Get all images
		$("*").each(function () {
			var element = $(this);

			if (element.is("img") && element.attr("src")) {
				all_images.push({
					src: element.attr("src"),
					element: element[0]
				});
			}

			$.each(hasImageProperties, function (i, property) {
				var propertyValue = element.css(property);
				var match;

				if (!propertyValue) {
					return true;
				}

				match = match_url.exec(propertyValue);
				
				if (match) {
					all_images.push({
						src: match[2],
						element: element[0]
					});
				}
			});

			$.each(hasImageAttributes, function (i, attribute) {
				var attributeValue = element.attr(attribute);

				if (!attributeValue) {
					return true;
				}

				all_images.push({
					src: element.attr("src"),
					srcset: element.attr("srcset"),
					element: element[0]
				});
			});
		});

		total = all_images.length;

		// Start preloader or exit
		if (total === 0) {
			done_loading();
		} else {
			preloader_stat.css({opacity: 1});
			images_loop();
		}

		// FOR version
		/*for(var i=0; i<total; i++){
			var test_image = new Image();


			test_image.onload = img_loaded;
			test_image.onerror = img_loaded;

			if (all_images[i].srcset) {
				test_image.srcset = all_images[i].srcset;
			}
			test_image.src = all_images[i].src;
		}*/
	}

	preloader();





	// ==============================
	// Page changer
	// ==============================
	$(document).on("click", "a.preload-link", function(e) {
		var href = $(this).attr("href");
		e.preventDefault();

		return $("#preloader")
			.fadeIn(300, function(){
				return document.location = href != null ? href : "/";
			});
	});




	// ==============================
	// Animations
	// ==============================
	$.fn.animated = function(inEffect) {
		$(this).each(function() {
			var ths = $(this);
			ths.css({opacity:0})
				.addClass("animated")
				.waypoint(function(dir) {
					if (dir === "down") {
						ths.addClass(inEffect).css({opacity:1});
					}
				},
				{
					offset: "90%"
				});
		});
	};

	$("header .svg-heading, .talks .svg-heading, .talks .testimonial").animated("fadeInUp");
	$(".about-me__skills>div").animated("fadeInUp");
	$(".article, .portfolio-slider__navigation-container, .portfolio-slider__preview-container").animated("fadeIn");
	$(".portfolio-slider__projects-container").animated("fadeIn");


	// ==============================
	// Piecharts animation
	// ==============================
	if($(".piechart").length){
		$(".piechart .piechart__fill").each(function(){
			var pie = $(this);
			pie.waypoint(function(dir) {
				if (dir === "down") {
					pie.css({strokeDashoffset:pie.data("percentage")});
				}
			},
				{
					offset: "90%"
				});
		});
	}


	// ==============================
	// Parallax
	// ==============================
	var is_this_ie = detect_IE();

	// IE scroll jump fix
	if(is_this_ie) {
		$(".layer").css({transition:"top .15s linear"});
		$("#scene.vertical").css({transition:"opacity .15s linear"});

		$("body").on("mousewheel", function () {
			event.preventDefault(); 

			var wheelDelta = event.wheelDelta,
				currentScrollPosition = window.pageYOffset;

			window.scrollTo(0, currentScrollPosition - wheelDelta);
		});
	}

	if($("#scene.axis").length){
		$("#scene.axis").parallax({
			scalarX: 3,
			scalarY: 3,
			frictionX: 0.5,
			frictionY: 0.5
		});
	}

	if($("#scene.vertical").length){
		$(window).scroll(function() {
			var scrollPos = $(this).scrollTop(),
				layers = $("#scene.vertical .layer");

			layers.css({"will-change":"transform"});

			layers.each(function(){
				var layer = $(this);

				if(layer.index() !=0 ) {
					layer.css({
						"transform" : "translate3d(0," + ( (scrollPos/(5 + 2*layer.index())) ) + "px,0)"
						// "top" : ( (scrollPos/(5 + 2*layer.index())) ) + "px"
					});
				}
			});
			$("#scene.vertical").css({
				"opacity" : 1-(scrollPos/720)
			});
		});
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
	// Contact form
	// ==============================
	if($("#contact").length){
		var c_form = $("#contact"),
			send_button = c_form.find("#form-submit"),
			clear_button = c_form.find("#form-clear");

		clear_button.on("click", function(e){
			e.preventDefault();
			c_form[0].reset();
		});

		send_button.on("click", function(e){
			e.preventDefault();
			// c_form[0].reset();
		});
	}

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
	// Slider
	// ==============================
	function prepare_title(title_container){
		var letters = $.trim(title_container.text()),
			new_title = "";

		title_container.html("");

		for(var i = 0; i < letters.length; i++){
			var css_delay = "style='animation-delay: " + (0.7/letters.length)*(i+1) + "s'",
				text = "<span class='letter' " + css_delay + ">" + letters[i] + "</span>";

			if(i==0){
				text = "<span class='word'>" + text;
			}
			if(letters[i] == " " || letters[i] == "&nbsp;"){
				text = "</span>\n<span class='word'>";
			}
			if(i == letters.length-1) {
				text = text + "</span>";
			}

			new_title += text;
		}

		title_container.append(new_title);
	}

	if($(".portfolio-slider").length){

		// console.time("Slider prepare");

		$(".portfolio-projects .project__title")
			.add(".portfolio-projects .project__tech")
			.each(function() {
				prepare_title($(this));
			});


		$(".portfolio-projects .active .project__title .letter")
			.add(".portfolio-projects .active .project__tech .letter")
			.addClass("show");


		var slider = $(".portfolio-slider"),
			previews = slider.find(".portfolio-preview"),
			projects = slider.find(".portfolio-projects .project");

		// console.timeEnd("Slider prepare");

		$(".portfolio-button").on("click", function(e){
			e.preventDefault();
			// console.time("Slider click");

			var this_button = $(this),
				this_thumbnails = this_button.next().find(".portfolio-thumbnails__thumbnail"),
				this_active_thumb = this_thumbnails.filter(".active"),
				this_next_index = this_thumbnails.index(this_active_thumb);

			var other_button = this_button.parent().siblings().find(".portfolio-button"),
				other_thumbnails = other_button.next().find(".portfolio-thumbnails__thumbnail"),
				other_active_thumb = other_thumbnails.filter(".active"),
				other_next_index = other_thumbnails.index(other_active_thumb);

			var active_preview = previews.filter(".active"),
				next_preview_index = previews.index(active_preview),
				active_project = projects.filter(".active"),
				next_project_index = projects.index(active_project);



			if(this_button.hasClass("portfolio-button_next")) {
				next_project_index = (next_project_index >= projects.length-1) ? 0 : next_project_index+1;
				this_next_index = this_next_index >= this_thumbnails.length-1 ? 0 : this_next_index+1;
				other_next_index = (other_next_index >= other_thumbnails.length-1) ? 0 : other_next_index+1;

				next_preview_index = (next_preview_index >= previews.length-1) ? 0 : next_preview_index+1;
			} else {
				next_project_index--;
				this_next_index--;
				other_next_index--;

				next_preview_index--;
			}

			function lock_buttons(){
				this_button.prop("disabled", true);
				other_button.prop("disabled", true);

				setTimeout(function(){
					this_button.prop("disabled", false);
					other_button.prop("disabled", false);
				}, 700);
			}

			function change_thumbs(){
				var this_next_thumb = this_thumbnails.eq(this_next_index),
					other_next_thumb = other_thumbnails.eq(other_next_index);

				this_next_thumb.removeClass("move-down").addClass("active move-up");
				this_active_thumb.removeClass("active move-down").addClass("move-up");

				other_next_thumb.removeClass("move-up").addClass("active move-down");
				other_active_thumb.removeClass("active move-up").addClass("move-down");
			}

			function change_preview(){
				var next_preview = previews.eq(next_preview_index);

				active_preview.removeClass("active");
				next_preview.addClass("active");
			}

			function change_project(){
				var next_project = projects.eq(next_project_index),
					title_letters = next_project.find(".project__title span.letter"),
					tech_letters = next_project.find(".project__tech span.letter");

				active_project
					.removeClass("active")
					.find("span.letter, span.letter")
					.removeClass("show");
				next_project.addClass("active");

				title_letters.addClass("show");
				tech_letters.addClass("show");
			}

			// console.timeEnd("Slider click");

			change_thumbs();
			change_project();
			change_preview();
			lock_buttons();
		});
	}



	// ==============================
	// Blog scroll events
	// ==============================
	if($(".blog-navigation").length){
		$(".blog-navigation__toggle").click(function(){
			$(".blog-navigation").toggleClass("active");
		});

		var lastId,
			menu = $(".blog-navigation"),
			menuItems = menu.find("li a"),
			scrollItems = menuItems.map(function(){
				var item = $($(this).attr("href"));
				if (item.length) return item;
			});

		menuItems.click(function(e){
			var href = $(this).attr("href"),
				offsetTop = (href === "#") ? 0 : $(href).offset().top-60;
			
			$("html, body").stop().animate({ 
				scrollTop: offsetTop
			}, 700, "swing");
			e.preventDefault();
		});

		$(window).scroll(function() {
			var fromTop = $(this).scrollTop(),
				blogNavOffset = $(".blog-navigation").offset().top,
				blogNavLimit = $(".footer__wrapper").offset().top - $(".blog-navigation__wrapper").outerHeight(),
				current = scrollItems.map(function(){
					if ($(this).offset().top < fromTop+144)
						return this;
				});

			current = current[current.length-1];
			var id = current && current.length ? current[0].id : "";

			if (lastId !== id) {
				lastId = id;
				menuItems.removeClass("active").filter("[href=#"+id+"]").addClass("active");
			}

			if(fromTop >= blogNavLimit && $(window).width() > (768 - window.hm.scrollBarWidth)) {
				$(".blog-navigation__wrapper").css({"position":"absolute", "top":blogNavLimit + "px"});
			} else if (fromTop >= blogNavOffset && $(window).width() > (768 - window.hm.scrollBarWidth)) {
				$(".blog-navigation__wrapper").css({"position":"fixed", "top":0});
				$(".blog-navigation__wrapper").addClass("nav-fixed");
			} else {
				$(".blog-navigation__wrapper").css({"position":"relative"});
				$(".blog-navigation__wrapper").removeClass("nav-fixed");
			}

		});

		$(window).resize(function() {
			if($(window).width() <= (768 - window.hm.scrollBarWidth)){
				$(".blog-navigation__wrapper").removeClass("nav-fixed");
				$(".blog-navigation__wrapper").css({"position":"relative"});
			} else {
				if($("body").scrollTop() >= $(".blog").offset().top){
					$(".blog-navigation__wrapper").css({"position":"fixed", "top":0});
					$(".blog-navigation__wrapper").addClass("nav-fixed");
				}
			}
		});
	}



	// ==============================
	// Talks blur based on js
	// ==============================
	function set_bg(){
		var section = $(".talks"),
			form = section.find(".contact-form"),
			form_bg = form.find(".contact-form__bg"),
			bg_offset = section.offset().top - form_bg.offset().top;

		form_bg.css({
			"background-position" : "center " + bg_offset + "px"
		});
	}

	if($(".talks").length){
		$(window).load(function() {
			set_bg();
		});

		$(window).resize(function() {
			set_bg();

			if( $(window).width()>2000 - window.hm.scrollBarWidth){
				$(".talks, .contact-form__bg").css("background-size", $(window).width() + "px");
			}
		});
	}

})(jQuery);
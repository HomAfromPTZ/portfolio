function blogNavigation() {
	$(".blog-navigation__toggle").click(function(){
		$(".blog-navigation").toggleClass("active");
	});

	var activeId,
		additionalOffset = 60,
		menu = $(".blog-navigation"),
		menuItems = menu.find("li a"),
		scrollItems = menuItems.map(function(){
			var item = $($(this).attr("href"));
			if (item.length) return item;
		});

	menuItems.click(function(e){
		var href = $(this).attr("href"),
			offsetTop = (href === "#") ? 0 : $(href).offset().top - additionalOffset;

		e.preventDefault();

		$("html, body").stop().animate({ 
			scrollTop: offsetTop
		}, 700, "swing");
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

		if (activeId !== id) {
			activeId = id;
			menuItems.removeClass("active").filter("[href=#"+id+"]").addClass("active");
		}

		if(fromTop >= blogNavLimit && $(window).width() > window.hm.tabletSize) {
			$(".blog-navigation__wrapper").css({"position":"absolute", "top":blogNavLimit + "px"});
		} else if (fromTop >= blogNavOffset && $(window).width() > window.hm.tabletSize) {
			$(".blog-navigation__wrapper").css({"position":"fixed", "top":0});
			$(".blog-navigation__wrapper").addClass("nav-fixed");
		} else {
			$(".blog-navigation__wrapper").css({"position":"relative"});
			$(".blog-navigation__wrapper").removeClass("nav-fixed");
		}

	});



	$(window).resize(function() {
		if($(window).width() <= window.hm.tabletSize){
			$(".blog-navigation__wrapper").removeClass("nav-fixed");
			$(".blog-navigation__wrapper").css({"position":"relative"});
		} else {
			if($("body").scrollTop() >= $(".blog").offset().top){
				$(".blog-navigation__wrapper").css({"position":"fixed", "top":0});
				$(".blog-navigation__wrapper").addClass("nav-fixed");
			}
		}
	});
};

module.exports = blogNavigation;
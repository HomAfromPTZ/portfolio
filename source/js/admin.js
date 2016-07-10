(function($) {
	"use strict";
	var forms = require("./forms.js");



	// ==============================
	// Tabs
	// ==============================
	$(".tabs-control__item").on("click", function(){
		var index = $(this).index,
			content = $("tabs-content__item");

		content.eq(index)
			.add(this)
			.addClass("active")
			.siblings()
			.removeClass("active");
	});


})(jQuery);
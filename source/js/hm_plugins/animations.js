// ==============================
// Scroll animation on waypoints
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

// ==============================
// Piecharts animation
// ==============================
$.fn.animatePies = function() {
	$(this).each(function(){
		var pie = $(this),
			pie_dasharray = 314.159265,
			pie_offset = ((100-pie.data("percentage"))/100)*pie_dasharray;

		pie.waypoint(function(dir) {
			if (dir === "down") {
				pie.css({strokeDashoffset:pie_offset});
			}
		},
			{
				offset: "90%"
			});
	});
}

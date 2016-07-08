var verticalParallax = function(container_selector, layer_selector, mobile_layer){
	var container_selector = container_selector || "#scene",
		layer_selector = layer_selector || ".layer",
		mobile_fallback = mobile_layer || 0,
		layers = $(container_selector).find(layer_selector);

	layers.css({"will-change":"transform"});

	$(window).scroll(function() {
		var scrollPos = $(this).scrollTop();

		if($(window).width() <= window.hm.tabletSize){

			layers.eq(mobile_fallback).css({
				"transform" : "translate3d(0," + ( (scrollPos/(5 + 2*mobile_fallback)) ) + "px,0)"
			})

		} else {

			layers.each(function(){
				var layer = $(this);

				if(layer.index() !=0 ) {
					layer.css({
						"transform" : "translate3d(0," + ( (scrollPos/(5 + 2*layer.index())) ) + "px,0)"
					});
				}
			});

			$(container_selector).css({
				"opacity" : 1-(scrollPos/720)
			});
		}

	});

};

module.exports = {
	createParallax : verticalParallax
}
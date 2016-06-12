'use strict';

var svg_config = {
	mode : {
		css : {
			render : {
				 css : true
			}
		}
	}
};

module.exports = function() {
	$.gulp.task('sprites_svg', function() {
		return $.gulp.src('./source/sprites/svg/*.svg')
				.pipe($.gp.svgSprite(svg_config))
				.pipe($.gulp.dest($.config.root + '/assets/img/sprites/svg'));
	});
};

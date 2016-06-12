'use strict';

module.exports = function() {
	$.gulp.task('copy_fonts', function() {
		return $.gulp.src(['./source/fonts/**/*', './bower_components/font-awesome/fonts/*'], { since: $.gulp.lastRun('copy.image') })
			.pipe($.gulp.dest($.config.root + '/assets/fonts'));
	});
};

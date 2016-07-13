'use strict';

module.exports = function() {
	$.gulp.task('copy_image', function() {
		return $.gulp.src('./source/images/**/*.*', { since: $.gulp.lastRun('copy_image') })
			.pipe($.gulp.dest($.config.root + '/assets/img'));
	});
};

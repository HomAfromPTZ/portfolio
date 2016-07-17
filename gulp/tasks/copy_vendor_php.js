'use strict';

module.exports = function() {
	$.gulp.task('copy_vendor_php', function() {
		return $.gulp.src('./vendor/**/*', { since: $.gulp.lastRun('copy_vendor_php') })
			.pipe($.gulp.dest($.config.root_php + '/app/vendor'));
	});
};

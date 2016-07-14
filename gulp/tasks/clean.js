'use strict';

module.exports = function() {
	$.gulp.task('clean', function(done) {
		return $.rimraf($.config.root, done);
	});
};

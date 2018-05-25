var gulp = require('gulp');
	sass = require('gulp-sass');
	browserSync = require('browser-sync');
	prefix = require('gulp-autoprefixer')

gulp.task('sass', function() {
	return gulp.src(['docs/sass/**/*.scss', 'docs/sass/**/*.sass'])
	.pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
	.pipe(prefix('last 2 versions'))
	.pipe(gulp.dest('docs/css'))
	.pipe(browserSync.reload({stream: true}))
});

gulp.task('browser-sync', function() {
	browserSync({
		server: {
			baseDir: 'docs'
		},
		notify: false
	});
});

gulp.task('watch', ['browser-sync', 'sass'], function() {
	gulp.watch('docs/sass/**/*.scss', ['sass']);
	gulp.watch('docs/*.html', browserSync.reload);
	gulp.watch('docs/js/**/*.js', browserSync.reload);

});

gulp.task('default', ['watch']);
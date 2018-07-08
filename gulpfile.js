var gulp = require('gulp');
	sass = require('gulp-sass');
	browserSync = require('browser-sync');
	prefix = require('gulp-autoprefixer')

gulp.task('sass', function() {
	return gulp.src(['sass/**/*.scss', 'sass/**/*.sass'])
	.pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
	.pipe(prefix('last 10 versions'))
	.pipe(gulp.dest('css'))
	.pipe(browserSync.reload({stream: true}))
});

gulp.task('browser-sync', function() {
	browserSync({
		server: {
			baseDir: ''
		},
		notify: false
	});
});

gulp.task('watch', ['browser-sync', 'sass'], function() {
	gulp.watch('sass/**/*.scss', ['sass']);
	gulp.watch(['*.html', '*.php'], browserSync.reload);
	gulp.watch('js/**/*.js', browserSync.reload);

});

gulp.task('default', ['watch']);
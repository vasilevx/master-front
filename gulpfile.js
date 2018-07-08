var gulp = require('gulp'),
	sass = require('gulp-sass'),
	livereload = require('gulp-livereload'),
	prefix = require('gulp-autoprefixer');

gulp.task('sass', function() {
	return gulp.src(['sass/**/*.scss', 'sass/**/*.sass'])
	.pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
	.pipe(prefix('last 10 versions'))
	.pipe(gulp.dest(''))
	.pipe(livereload());
});

gulp.task('html', function(){
  gulp.src(['*.php', '*/*.php', '*.html'])
      .pipe(livereload());
});

gulp.task('watch', function() {
  livereload.listen();
	gulp.watch('sass/**/*.scss', ['sass']);
	gulp.watch(['*.php', '*/*.php', '*.html'], ['html']);
	//gulp.watch('js/**/*.js', livereload());

});

gulp.task('default', ['watch']);
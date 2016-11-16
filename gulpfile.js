// Gulp config
var gulp            = require('gulp');
var sass            = require('gulp-sass');
var sourcemaps      = require('gulp-sourcemaps');
var autoprefixer    = require('gulp-autoprefixer');
var pixrem          = require('gulp-pixrem');
var cleanCSS        = require('gulp-clean-css');
var uglify          = require('gulp-uglify');
var rename          = require('gulp-rename');
var beepbeep        = require('beepbeep');
var minifycss       = require('gulp-minify-css');
var concat          = require('gulp-concat');
var plumber         = require('gulp-plumber');
var del             = require('del');
var browserSync     = require('browser-sync');
var reload          = browserSync.reload;

// Define paths for convenience
var proxyUrl        = 'localhost:8888/jf-kirby-framework/';
var scssMainPath    = 'assets/scss/*.scss';
var scssPartialPath = 'assets/scss/**/*.scss';
var jsPath          = 'assets/js/**/*.js';
var cssBuildPath    = 'assets/build/css';
var jsBuildPath     = 'assets/build/js';


// Error handling
function handleError(err) {
  console.log(err);
  this.emit('end');
  beepbeep();
}


// Flush the build folder and rebuild
gulp.task('clean', function() {
  return del([cssBuildPath, jsBuildPath]);
});


// Process js
gulp.task('scripts', function() {
  return gulp.src(jsPath)
  // concat files
  .pipe(concat('main.js')).on('error', handleError)
  // rename
  .pipe(rename({suffix: '.min'}))
  // minify
  .pipe(uglify())
  // set destination
  .pipe(gulp.dest(jsBuildPath));
});


// Process css
gulp.task('styles', function () {
  gulp.src(scssMainPath)

  // initiate sourcemaps
  .pipe(sourcemaps.init({}))
  // compile sass
  .pipe(sass()).on('error', handleError)
  // autoprefixer
  .pipe(autoprefixer({
    browsers: ['last 2 versions', '> 2%'],
    cascade: false,
    remove: false,
    supports: false,
    flexbox: 'no-2009'
  }))
  // rem fallback
  .pipe(pixrem('20px'))
  // rename the file
  .pipe(rename({suffix: '.min'}))
  // minify css
  .pipe(cleanCSS())
  // update sourcemaps
  .pipe(sourcemaps.write('.', {
    includeContent: false,
    sourceRoot: cssBuildPath
  }))
  // set destination
  .pipe(gulp.dest(cssBuildPath));
});


// Browsersync config
gulp.task('browser-sync', function() {
  browserSync.init([cssBuildPath + '/*.min.css', jsBuildPath + '/*.min.js'], {
    proxy: proxyUrl,
    port: 3000
  });
});


// Reload
gulp.task('bs-reload', function () {
  browserSync.reload();
});


// Watch scss, js and html files
gulp.task('default', ['clean', 'styles', 'scripts', 'browser-sync'], function() {
  // Watch scss, run the sass task on change
  gulp.watch([scssMainPath, scssPartialPath, 'site/patterns/**/*.scss'], ['styles']);
  // Watch js files, run the scripts task on change
  gulp.watch(jsPath, ['scripts']);
  // Watch php files, run the bs-reload task on change
  gulp.watch(['site/**/*.php', 'content/**/*.md'], ['bs-reload']).on('error', handleError);
});

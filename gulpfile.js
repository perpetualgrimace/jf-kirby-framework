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
var del             = require('del');
var browserSync     = require('browser-sync');
var reload          = browserSync.reload;

// Define paths for convenience
var proxyUrl        = 'localhost:8888/{{client-name}}/';
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


// Process js
gulp.task('scripts', function() {
  return del(jsBuildPath),
  gulp.src(jsPath).on('error', handleError)
  // concat files
  .pipe(concat('main.js'))
  // rename
  .pipe(rename({suffix: '.min'}))
  // minify
  .pipe(uglify())
  // set destination
  .pipe(gulp.dest(jsBuildPath));
});


// Process css for production
gulp.task('production-styles', function() {
  return del(cssBuildPath),
  gulp.src(scssMainPath).on('error', handleError)

    .pipe(sass({outputStyle: 'compressed'})).on('error', handleError)
    .pipe(autoprefixer({
      browsers: ['last 2 versions', '> 2%'],
      cascade: false,
      remove: false,
      supports: false,
      flexbox: 'no-2009'
    })).on('error', handleError)
    // minify css
    .pipe(cleanCSS()).on('error', handleError)
    .pipe(rename({suffix: '.production'}))
    // pixrem
    .pipe(pixrem('20px')).on('error', handleError)
    .pipe(gulp.dest(cssBuildPath));
});


// Process css for dev environment
gulp.task('dev-styles', function() {
  return del(cssBuildPath),
  gulp.src(scssMainPath).on('error', handleError)

    .pipe(sourcemaps.init())
      .pipe(sass({outputStyle: 'compressed'})).on('error', handleError)
      .pipe(rename({suffix: '.dev'}))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(cssBuildPath))
    .pipe(browserSync.stream());
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
gulp.task('default', ['dev-styles', 'production-styles', 'scripts', 'browser-sync'], function() {
  // Watch scss, run the styles task on change
  gulp.watch([scssMainPath, scssPartialPath], ['dev-styles', 'production-styles']);
  // Watch js files, run the scripts task on change
  gulp.watch(jsPath, ['scripts']);
  // Watch php files, run the bs-reload task on change
  gulp.watch(['site/**/*.php', 'content/**/*.md'], ['bs-reload']).on('error', handleError);
});

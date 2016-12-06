'use strict';

var gulp = require('gulp'),
    sass = require('gulp-sass'),
    sourcemaps = require('gulp-sourcemaps'),
    autoprefixer = require('gulp-autoprefixer'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    rename = require('gulp-rename'),
    clearDist = require('del'),
    styleInput = 'stylesheets/scss/**/*.scss',
    styleOutput = 'stylesheets/css',
    sassOptions = {outputStyle: 'compressed'},
    autoprefixerOptions = {
        browsers: ['last 2 versions', '> 5%', 'Firefox > 20']
    };

// Concatenate JS files & Add sourceMaps

gulp.task("concatScripts", function() {
    return gulp.src([
        'js/bootstrap-tab.js', 
        'js/ie10-viewport-bug-workaround.js', 
        'js/custom.js'])
        .pipe(sourcemaps.init())
        .pipe(concat("app.js"))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest("js"));
});

// Minify concatenated file

gulp.task('minifyScripts', ['concatScripts'], function() {
    return gulp.src('js/app.js')
        .pipe(uglify())
        .pipe(rename('app.min.js'))
        .pipe(gulp.dest("js"));
});


// Compile Sass, Add sourceMaps & Autoprefix Css

gulp.task('compileSass', function () {
    return gulp
    // Find All scss files in stylesheet/scss folder
        .src(styleInput)
    // initialize Source maps
        .pipe(sourcemaps.init())
    // Compile the sass files
        .pipe(sass(sassOptions).on('error', sass.logError))
    // Auto prefix styles
        .pipe(autoprefixer(autoprefixerOptions))
    // write to sourcemap files
        .pipe(sourcemaps.write('./'))
    // Write Results css to output folder
        .pipe(gulp.dest(styleOutput));
});

// Delete dist folder

gulp.task("clean", function() {
    clearDist(['dist', 'stylesheets/css/', 'js/app*.js*']);
})

// Watch For File Changes in Sass & JS and do the needful


gulp.task('watch', function() {
    gulp.watch(styleInput, ['compileSass']);
    gulp.watch('js/**/*.js', ['minifyScripts']);
})

// BUILD

gulp.task('build', ['compileSass', 'minifyScripts', 'watch' ]);


// Production
gulp.task('production', ['clean','build'], function() {
    return gulp.src([
        "*.html", 
        "js/app.min.js", 
        "img/**",
        "stylesheets/css/**",
        "stylesheets/fonts/**"], {base: './'})
        .pipe(gulp.dest('dist'));
});

// Default

gulp.task('default', function () {
    gulp.start('build');
})
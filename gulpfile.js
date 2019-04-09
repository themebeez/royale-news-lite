'use strict';


//— START Editing Project Variables. —//.

// Project related variables.
var translateFiles = './**/*.php'; // Path to all PHP files.

// Translation related variables.
var text_domain    = 'royale-news-lite'; // Your textdomain here.
var destFile       = 'royale-news-lite.pot'; // Name of the transalation file.
var packageName    = 'royale-news-lite'; // Package name.
var bugReport      = 'https://themebeez.com/support/'; // Where can users report bugs.
var lastTranslator = 'Themebeez <contact@themebeez.com>'; // Last translator Email ID.
var team           = 'Themebeez.com <contact@themebeez.com>'; // Team's Email ID.
var translatePath  = './languages/' // Where to save the translation files.

//— STOP Editing Project Variables. —//.



// include all necessary plugins in gulp file

var gulp = require('gulp');

var concat = require('gulp-concat');

var uglify = require('gulp-uglify');

var rename = require('gulp-rename');

var wpPot  = require( 'gulp-wp-pot' ); // For generating the .pot file.

var sort   = require( 'gulp-sort' ); // Recommended to prevent unnecessary changes in pot-file.

//var notify = require( 'gulp-notify' ); // Sends message notification to you

var cache = require('gulp-cache');





// Task defined for java scripts bundling and minifying

gulp.task('scripts', function() {


    return gulp.src([

            'assets/src/js/vendor/*.js',
            'assets/src/js/plugins/*.js',
            'assets/src/js/custom/*.js',
        ])

        .pipe(concat('bundle.js'))

        .pipe(rename({ suffix: '.min' }))

        .pipe(uglify())

        .pipe(gulp.dest('assets/dist/js/'));


});


gulp.task( 'translate', function () {
        return gulp.src( translateFiles )
            .pipe( sort() )
            .pipe( wpPot( {
                domain        : text_domain,
                destFile      : destFile,
                package       : packageName,
                bugReport     : bugReport,
                lastTranslator: lastTranslator,
                team          : team
            } ) )
            .pipe( gulp.dest( translatePath + '/' + destFile ) )
            .pipe( notify( { message: 'SUCCESS: Pot file generated! :) :)', onLast: true } ) )
 } );


// Task watch

gulp.task('watch', function() {

    // Watch .js files

    gulp.watch('assets/src/js/**/**.js', ['scripts']);
    gulp.watch('./**/*.php', ['translate']);


});


// declaring final task and command tasker

// just hit the command "gulp" it will run the following tasks...


gulp.task('default', ['watch', 'scripts', 'translate']);
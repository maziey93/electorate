var gulp = require('gulp');  
var concat = require('gulp-concat');  
var filter = require('gulp-filter');  
var mainBowerFiles = require('main-bower-files');

var filterByExtension = function(extension){  
    return filter(function(file){
        return file.path.match(new RegExp('.' + extension + '$'));
    }, {restore: true});
};

gulp.task('getBowerFiles', function(){  
    var mainFiles = mainBowerFiles({  paths: {
        bowerrc: './.bowerrc'
    }});

    if(!mainFiles.length){
        // No main files found. Skipping....
        return;
    }

    var jsFilter = filterByExtension('js');

    return gulp.src(mainFiles)
        .pipe(jsFilter)
        .pipe(gulp.dest('./vendor/js'))
        .pipe(jsFilter.restore)
        .pipe(filterByExtension('css'))
        .pipe(gulp.dest('./vendor/css'))
        .pipe(jsFilter.restore)
        //hack the process flow to get the fonts into the vendor folder inside a separate folder
        .pipe(filter('**/*.{eot,svg,ttf,woff,woff2}'))
        .pipe(gulp.dest('./vendor/fonts'));
})

gulp.task('default', ['getBowerFiles']);
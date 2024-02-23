import {deleteAsync} from 'del';
import gulp from 'gulp';

import browser_sync from 'browser-sync';
const browserSync = browser_sync.create();

//Import sass - Build scss to css
import dartSass from 'sass'
import gulpSass from 'gulp-sass'
const sass = gulpSass(dartSass)
import sourcemaps from 'gulp-sourcemaps';
import autoprefixer from 'gulp-autoprefixer';

//Import ejs - Build ejs to html
import ejs from 'gulp-ejs';
import rename from 'gulp-rename';

//var replace = require('gulp-replace');

import cachebust from 'gulp-cache-bust';

//dirname
const devDir = './cmscp/wp-content/themes/mymall';
const buildDir = './cmscp/wp-content/themes/mymall';

// Clean assets
function clean() {
    // return deleteAsync([buildDir+"/assets/"]);
}

//Compile scss to css
function style(){
    return gulp
        //1. Where is my scss file
        .src(devDir+'/scss/**/*.scss')

        //2. sourceMap scss
        .pipe(sourcemaps.init())

        //3. pass that file through sass compilier
        .pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))

        //4. auto prefix
        .pipe(autoprefixer({
            cascade: false
        }))

        //5. source map css
        .pipe(sourcemaps.write('.'))
        
        //6. Where do I save the compiled CSS?
        .pipe(gulp.dest(buildDir+'/css'))

        //7. stream changes to all browser
        // .pipe(browserSync.stream());
}

function watch(){
    // browserSync.init({
    //     server: {
    //         baseDir: buildDir
    //     },
    //     port: 8080
    // });
    gulp.watch(devDir+'/scss/**/*.scss', gulp.parallel(style));
    // gulp.watch(devDir+'/assets/js/**/*.js', gulp.parallel(scripts, ejsTemplate));
    // gulp.watch(devDir+'/assets/img/*', images);
    // gulp.watch(devDir+'/ejs/**/*.ejs',ejsTemplate);
    // gulp.watch(buildDir+'/*.html').on('change', browserSync.reload);
}

// function copyOutput() {
//     return gulp.src(buildDir+'/assets/**').pipe(gulp.dest('./assets/'))
// }

gulp.task('build',gulp.series(clean, gulp.parallel(style)));
gulp.task('watch',watch);




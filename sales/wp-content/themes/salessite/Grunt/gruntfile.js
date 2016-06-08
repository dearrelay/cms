 module.exports = function(grunt) {
     'use strict';
     grunt.initConfig({

         less: {
             development: {
                 options: {
                     paths: ["../less"],
                     yuicompress: true
                 },
                 files: {
                     "../css/style.css": "../less/style.less",
					 "../css/custom.css": "../less/custom.less"
                 }
             }       
         },
         uglify: {
             all: {
                 files: {
                     '../css/style.min.css': '../css/style.css'
                 }
             }
         },
         watch: {            
//            livereload: {
//              options: { livereload: true },
//              files: ["../css/style.css", "../less/*.less", "../Views/*.cshtml", "scripts/**/*.js"]
//            },
//            scripts: {
//                files: ['scripts/**/*'],
//                tasks: ["jshint"]
//            },
            less: {
                files: ["../less/*.less"],
                tasks: ["less"], 
                options: {
                    nospawn: true
                }
            }
         }
     });
     grunt.loadNpmTasks('grunt-contrib-less');
     grunt.loadNpmTasks('grunt-contrib-watch');
     grunt.registerTask('default', ['less']);
 };
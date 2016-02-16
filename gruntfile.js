// Grunt, to speed up parts of the dev process

module.exports = function(grunt) {
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-compass');
	grunt.loadNpmTasks('grunt-uncss');
    grunt.initConfig( {
        uglify: {
           my_target: {
                files: {
                   "_/js/script.js" : ["_/components/js/*.js"],
                } //    files
           } //     my_target
        }, //    uglify
        compass: {
            dev: {
                options: {
                    config: "config.rb"
                } //    options
            } //    dev
        }, //    compass
        watch: {
            options: { livereload: true },
            scripts: {
                files: ["_/components/js/*.js"],
                tasks: ["uglify"]
            }, //    scripts
            sass: {
                files: ["_/components/sass/*.scss", "_/components/sass/**/*.scss"],
                tasks: ["compass:dev"]
            },
            html: {
                 files: ["*.html"]
            }
        }, //    watch
		uncss: {
  			dist: {
    			src: ['about.html', 'contact.html', 'thanksalot.html', 'index.html', 'fvc.html', 'ccrc.html', 'mjs.html', 'visocast.html', 'other_projects.html'],
    			dest: 'dist/css/tidy.css',
    			options: {
      				report: 'min' // optional: include to report savings
    			}
  			}
		} //	uncss
    }) //   .initConfig
    grunt.registerTask("default", "watch");
} //    .exports
module.exports = function(grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		sass: {
			options: {
				includePaths: ['bower_components/foundation/scss']
			},
			dist: {
				options: {

				},
				files: {
					'../public/css/app.css': 'scss/app.scss'
				}
			}
		},

		watch: {
			options: {
				livereload: true
			},
			src: {
				files: ['lib/*.js', 'scss/**/*.scss', 'js/app.js'],
				tasks: ['default']
			}
		},

//		watch: {
//			grunt: { files: ['Gruntfile.js'] },
//
//			tasks: ['build'],
//
//			src: {
//				files: 'scss/**/*.scss',
//				tasks: ['sass']
//			},
//
//			javascript: {
//				files: 'js/app.js',
//				tasks: ['concat', 'uglify']
//			}
//		},

		concat: {
			dist: {
				src: [
					'js/amcharts.js',
					'js/serial.js',
					'js/app.js'					
				],
				dest: '../public/js/build/app.js'
			}
		},

		uglify: {
			build: {
				src: '../public/js/build/app.js',
				dest: '../public/js/build/app.min.js'
			}
		},

		cssmin: {
			minify: {
				expand: true,
				cwd: '../public/css',
				src: ['*.css', '!*.min.css'],
				dest: '../public/css',
				ext: '.min.css'
			}
		},

		copy: {
			freedivingninja: {
				files: [
//					{
//						expand: true,
//						flatten: true,
//						src:"bower_components/foundation-icon-fonts/foundation-icons.woff",
//						dest:"../public/bower_components/foundation-icon-fonts/"
//					},
//					{
//						expand: true,
//						flatten: true,
//						src:"bower_components/modernizr/modernizr.js",
//						dest:"../public/bower_components/modernizr/"
//					},
//					{
//						expand: true,
//						flatten: true,
//						src:"bower_components/prismjs/prism.css",
//						dest:"bower_components/prismjs/",
//						rename: function(dest, src) {
//							return dest + '_prism.scss';
//						}
//					}
				]
			}
		}

	});



	grunt.loadNpmTasks('grunt-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-copy');
	grunt.loadNpmTasks('grunt-contrib-cssmin');

	grunt.registerTask('build', ['copy', 'sass', 'concat','uglify', 'cssmin']);
	grunt.registerTask('default', ['build']);
}

module.exports = function(grunt){
	grunt.initConfig({
		pkg:grunt.file.readJSON('package.json'),
		less: {
			development:{
				options:{
					paths:['build/less/']
				},
				files:{
					"assets/css/bootstrap.css" : "node_modules/bootstrap/less/bootstrap.less",
					"assets/css/font-awesome.css" : "build/less/font-awesome/less/font-awesome.less",
					"assets/css/style.css" : "build/less/website/website.less",
					"assets/css/waadmin.css" : "build/less/AdminLTE/AdminLTE.less"
				}
			}
		},
		copy: {
		  main: {
		    files: [
		      {expand: true, cwd: 'node_modules/animate\.css/', src: ['animate.min.css'], dest: 'assets/css/'},
		      {expand: true, cwd: 'node_modules/wowjs/dist/', src: ['wow.min.js'], dest: 'assets/js/'},
		      {expand: true, cwd: 'node_modules/progressively/dist/', src: ['*'], dest: 'assets/plugins/progressively/'},
		      {expand: true, cwd: 'node_modules/@staaky/strip/dist/', src: ['*/*/*/*'], dest: 'assets/plugins/strip/'},
		      {expand: true, cwd: 'node_modules/moment/min/', src: ['*'], dest: 'assets/plugins/moment/'},
		      {expand: true, cwd: 'node_modules/bootstrap-datepicker/dist/', src: ['*/*'], dest: 'assets/plugins/bootstrap-datepicker/'},
		    ],
		  },
		},
		cssmin: {
			target: {
				files: [{
					expand: true,
					cwd: 'assets/css',
					src: ['style.css','font-awesome.css','bootstrap.css','waadmin.css'],
					dest: 'assets/css',
					ext: '.min.css'
				}]
			}
		},
		jshint: {
			all:['build/js/waadmin/*.js', 'build/js/website/*.js']
		},
		concat: {
			basic_and_extras: {
				files: {
					'assets/js/waadmin.js': ['build/js/waadmin/variables.js','build/js/waadmin/functions.js','build/js/waadmin/main.js'],
					'assets/js/website.js': ['build/js/website/variables.js','build/js/website/functions.js','build/js/website/app.js'],
				},
			},
		},
		uglify: {
			my_target: {
				files: {
					'assets/js/waadmin.min.js': ['assets/js/waadmin.js'],
					'assets/js/website.min.js': ['assets/js/website.js']
				}
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-less');
	grunt.loadNpmTasks('grunt-contrib-cssmin');

	grunt.loadNpmTasks('grunt-contrib-jshint'); //Valida javascript
	grunt.loadNpmTasks('grunt-contrib-concat'); //Une archivos javascript
	grunt.loadNpmTasks('grunt-contrib-uglify'); //Minifica archivos javascript

	grunt.loadNpmTasks('grunt-contrib-copy'); //Copiar archivos

	grunt.registerTask('default',['less','cssmin','jshint','concat','uglify', 'copy']);

}
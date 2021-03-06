module.exports = function(grunt) {
  grunt.initConfig({
    less: {
      development: {
        options: {
          compress: true,
          yuicompress: true,
          optimization: 2
        },
        files: {
          // target.css file: source.less file
          "assets/css/admin.css": "assets/less/main.less"
        }
      }
    },
    uglify: {
      site_js: {
        options: {
          mangle: true,
          sourceMap: false,
          compress: {
            drop_console: true,
            dead_code: true
          }
        },
        files: {
          'assets/js/app.min.js': ['assets/js/script.js']
        }
      }
    },
    watch: {
      layout: {
        files: ['application/views/**/*.php', 'assets/js/*.js'],
        options: {
          livereload: true
        }
      },
      styles: {
        // Which files to watch (all .less files recursively in the less directory)
        files: ['assets/less/*.less', 'assets/less/**/*.less',],
        tasks: ['less'],
        options: {
          nospawn: true,
          livereload: true
        }
      }
    }
  });

  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-contrib-watch');

  grunt.registerTask('default', ['watch']);
  grunt.registerTask('assets', ['uglify', 'less']);
};

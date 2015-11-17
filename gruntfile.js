module.exports = function(grunt) {

  grunt.initConfig({

    pkg: grunt.file.readJSON('package.json'),

    copy: {
      dist: {
        src: 'readme.txt',
        dest: 'README.md'
      }
    },

    // curl: {
    //     'google-fonts-source': {
    //         src: 'https://www.googleapis.com/webfonts/v1/webfonts?key=*******',
    //         dest: 'assets/vendor/google-fonts-source.json'
    //     }
    // },
    // makepot: {
    //     target: {
    //         options: {
    //             include: [
    //                 'path/to/some/file.php'
    //             ],
    //             type: 'wp-plugin' // or `wp-theme`
    //         }
    //     }
    // },
    jshint: {
      files: [
        'assets/js/*.js'
      ],
      options: {
        expr: true,
        globals: {
          jQuery: true,
          console: true,
          module: true,
          document: true
        }
      }
    },

    phpdocumentor: {
      dist: {
        options: {
          ignore: 'node_modules'
        }
      }
    },

    // SASS Assets
    sass: {
      dist: {
        options: {
          banner: '/*! <%= pkg.name %> <%= pkg.version %> filename.min.css <%= grunt.template.today("yyyy-mm-dd h:MM:ss TT") %> */\n',
          style: 'compressed'
        },
        files: [{
          expand: true,
          cwd: 'assets/scss',
          src: [
            'style.scss'
          ],
          dest: 'dist/css',
          ext: '.min.css'
        }]
      },
      dev: {
        options: {
          banner: '/*! <%= pkg.name %> <%= pkg.version %> filename.css <%= grunt.template.today("yyyy-mm-dd h:MM:ss TT") %> */\n',
          style: 'expanded'
        },
        files: [{
          expand: true,
          cwd: 'assets/scss',
          src: [
            'style.scss'
          ],
          dest: 'assets/css',
          ext: '.css'
        }]
      }
    },

    uglify: {
      dist: {
        options: {
          banner: '/*! <%= pkg.name %> <%= pkg.version %> filename.min.js <%= grunt.template.today("yyyy-mm-dd h:MM:ss TT") %> */\n',
          report: 'gzip'
        },
        files: {
          'dist/js/app.min.js' : [
            'assets/js/*.js'
          ]
        }
      },
      dev: {
        options: {
          banner: '/*! <%= pkg.name %> <%= pkg.version %> filename.js <%= grunt.template.today("yyyy-mm-dd h:MM:ss TT") %> */\n',
          beautify: true,
          compress: false,
          mangle: false
        },
        files: {
          'assets/js/app.js' : [
            'assets/js/*.js'
          ]
        }
      }
    },

    watch: {
      options: {
        livereload: true
      },
      css: {
        files: ['assets/scss/*.scss'],
        tasks: ['sass:dev']
      },
      html: {
        files: ['*.html']
      },
      php: {
        files: ['*.php']
      },
      js: {
        files: ['assets/js/*'],
        tasks: ['jshint', 'uglify:dev']
      },

    }
  }
);

grunt.loadNpmTasks('grunt-contrib-copy');
grunt.loadNpmTasks('grunt-contrib-jshint');
grunt.loadNpmTasks('grunt-contrib-sass');
grunt.loadNpmTasks('grunt-contrib-uglify');
grunt.loadNpmTasks('grunt-curl');
grunt.loadNpmTasks('grunt-phpdocumentor');
grunt.loadNpmTasks('grunt-wp-i18n');
grunt.loadNpmTasks('grunt-contrib-watch');

grunt.registerTask('default', ['watch']);

grunt.registerTask('build', ['uglify:dist', 'sass:dist', 'makepot', 'copy']);

grunt.registerTask('docs', [
  'phpdocumentor:dist'
]);

grunt.registerTask('googlefonts', [
  'curl:google-fonts-source'
]);

};

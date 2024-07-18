/*global module:false*/
module.exports = function(grunt) {

  'use strict';

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    meta : {
      banner : '/*!\n' +
      ' * GMaps.js v<%= pkg.version %>\n' +
      ' * <%= pkg.homepage %>\n' +
      ' *\n' +
      ' * Copyright <%= grunt.template.today("yyyy") %>, <%= pkg.author %>\n' +
      ' * Released under the <%= pkg.license %> License.\n' +
      ' */\n\n'
    },

    concat: {
      options: {
        banner: '<%= meta.banner %>'
      },
      dist: {
        src: [
          'libs/gmaps.core.js',
          'libs/gmaps.controls.js',
          'libs/gmaps.markers.js',
          'libs/gmaps.overlays.js',
          'libs/gmaps.geometry.js',
          'libs/gmaps.layers.js',
          'libs/gmaps.routes.js',
          'libs/gmaps.geofences.js',
          'libs/gmaps.static.js',
          'libs/gmaps.map_types.js',
          'libs/gmaps.styles.js',
          'libs/gmaps.streetview.js',
          'libs/gmaps.events.js',
          'libs/gmaps.utils.js',
          'libs/gmaps.native_extensions.js'
        ],
        dest: 'gmaps.js'
      }
    },

    jasmine: {
      options: {
        template: 'test/template/jasmine-gmaps.html',
        specs: 'test/spec/*Spec.js',
        vendor: ['https://maps.google.com/maps/api/js?sensor=true'],
        styles: 'test/style.css'
      },
      src: 'gmaps.js'
    },

    watch : {
      files : '<%= concat.dist.src %>',
      tasks : 'default'
    },

    jshint : {
      all : ['Gruntfile.js']
    },

    uglify : {
      options : {
        sourceMap : true
      },
      all : {
        files: {
           'gmaps.min.js': [ 'gmaps.js' ]
        }
      }
    },

    umd : {
      all : {
        src : 'gmaps.js',
        objectToExport : 'GMaps',
        globalAlias : 'GMaps',
        template : 'umd.hbs',
        deps: {
          amd: ['jquery', 'googlemaps!']
        }
      }
    }

  });

  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-jasmine');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-umd');

  grunt.registerTask('test', ['jshint', 'jasmine']);
  grunt.registerTask('default', ['test', 'concat', 'umd', 'uglify']);
};

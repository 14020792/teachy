'use strict';

/**
 * @ngdoc function
 * @name clientApp.controller:StatsCtrl
 * @description
 * # StatsCtrl
 * Controller of the clientApp
 */
angular.module('clientApp')
  .controller('StatsCtrl', function ($scope, headerService) {
    headerService.change('stats');
  });

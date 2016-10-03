'use strict';

/**
 * @ngdoc function
 * @name clientApp.controller:RatingCtrl
 * @description
 * # RatingCtrl
 * Controller of the clientApp
 */
angular.module('clientApp')
  .controller('RatingCtrl', function ($scope, headerService) {
    headerService.change('rating');
  });

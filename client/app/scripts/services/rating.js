'use strict';

/**
 * @ngdoc service
 * @name clientApp.rating
 * @description
 * # rating
 * Service in the clientApp.
 */
angular.module('clientApp')
  .factory('ratingService', ['$http', 'config', function ($http, config) {
    var ratingService = [];

    ratingService.load = function() {
      return $http.get(config.serverUrl + "/assessments")
        .then(function success(response) {
          return response.data;
        }, function error(response) {
          return response.data;
        });
    };

    ratingService.submit = function(rating) {
      return $http.post(config.serverUrl + "/assessments", rating)
        .then(function success(response) {
          return response.data;
        }, function error(response) {
          return response.data;
        });
    };

    return ratingService;
  }]);

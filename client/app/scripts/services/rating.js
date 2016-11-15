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
          return response.data.data;
        })
    };
    return ratingService;
  }]);

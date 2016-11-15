'use strict';

/**
 * @ngdoc service
 * @name clientApp.criteria
 * @description
 * # criteria
 * Service in the clientApp.
 */
angular.module('clientApp')
  .factory('criteriaService', ['$http', 'config', function ($http, config) {
    var criteriaService = {};
    criteriaService.load = function() {
      return $http.get(config.serverUrl + "/criteria")
        .then(function success(response) {
          return response.data.data;
        })
    };
    return criteriaService;
  }]);

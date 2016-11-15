'use strict';

/**
 * @ngdoc service
 * @name clientApp.subject
 * @description
 * # subject
 * Service in the clientApp.
 */
angular.module('clientApp')
  .factory('subjectService', ['$http', 'config', function ($http, config) {
    var subjectService = {};
    subjectService.load = function() {
      return $http.get(config.serverUrl + "/subjects")
        .then(function success(response) {
          return response.data;
        }, function error(response) {
          return response.data;
        });
    };
    subjectService.loadSubject = function(id) {
      return $http.get(config.serverUrl + "/subjects/" + id)
        .then(function success(response) {
          return response.data;
        }, function error(response) {
          return response.data;
        })
    };
    return subjectService;
  }]);

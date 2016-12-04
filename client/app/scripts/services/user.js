'use strict';

/**
 * @ngdoc service
 * @name clientApp.user
 * @description
 * # user
 * Service in the clientApp.
 */
angular.module('clientApp')
  .factory('userService', ['$http', 'config', function ($http, config) {
    var userService = {};

    userService.getProfile = function() {
      return $http.get(config.serverUrl + '/profile')
        .then(function success(response) {
          return response.data;
        }, function error(response) {
          return response.data;
        });
    };

    userService.updateProfile = function(profile) {
      return $http.put(config.serverUrl + '/update', profile)
        .then(function success(response) {
          return response.data;
        }, function error(response) {
          return response.data;
        });
    };

    return userService;
  }]);

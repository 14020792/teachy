'use strict';

/**
 * @ngdoc service
 * @name clientApp.user
 * @description
 * # user
 * Service in the clientApp.
 */
angular.module('clientApp')
  .factory('userService', ['jwtHelper', function (jwtHelper) {
    var token = localStorage.getItem('teachyToken');
    var user = {};
    if (token != null) {
      user = jwtHelper.decodeToken(localStorage.getItem('teachyToken')).user;
    }
    return user;
  }]);

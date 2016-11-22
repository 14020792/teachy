'use strict';

/**
 * @ngdoc function
 * @name clientApp.controller:MainCtrl
 * @description
 * # HeaderCtrl
 * Controller of the clientApp
 */
angular.module('clientApp')
  .controller('HeaderCtrl', function($uibModal, headerService, userService, $window) {
    this.info = headerService;
    this.user = userService;

    this.openLogin = function() {
      $uibModal.open({
        controller: 'ModalInstanceCtrl as ModalInstanceCtrl',
        templateUrl: 'views/login.html'
      });
    };

    this.logout = function() {
      localStorage.removeItem('teachyToken');
      $window.location.reload();
    }
  });


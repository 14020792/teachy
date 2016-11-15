'use strict';

/**
 * @ngdoc function
 * @name clientApp.controller:MainCtrl
 * @description
 * # HeaderCtrl
 * Controller of the clientApp
 */
angular.module('clientApp')
  .controller('HeaderCtrl', function($scope, $uibModal, headerService, userService, $window) {
    $scope.info = headerService;
    $scope.user = userService;

    $scope.open = function() {
      $uibModal.open({
        controller: 'ModalInstanceCtrl as modalInstance',
        templateUrl: 'views/login.html',
        scope: $scope
      });
    };

    $scope.logout = function() {
      localStorage.removeItem('teachyToken');
      $window.location.reload();
    }
  });


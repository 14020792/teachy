'use strict';

/**
 * @ngdoc function
 * @name clientApp.controller:MainCtrl
 * @description
 * # HeaderCtrl
 * Controller of the clientApp
 */
angular.module('clientApp')
  .controller('HeaderCtrl', function($scope, $uibModal, headerService) {
    $scope.info = headerService;
    $scope.open = function () {
      $uibModal.open({
        controller: 'ModalInstanceCtrl as modalInstance',
        templateUrl: 'views/login.html'
      });
    };
    $scope.message = "lol";
  });


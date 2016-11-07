'use strict';

/**
 * @ngdoc function
 * @name clientApp.controller:ModalInstanceCtrl
 * @description
 * # ModalInstanceCtrl
 * Controller of the clientApp
 */
angular.module('clientApp')
  .controller('ModalInstanceCtrl', ['$http', '$uibModalInstance', 'config', '$scope', '$window',
    function ($http, $uibModalInstance, config, $scope, $window) {
      $scope.username = "";
      $scope.password = "";
      $scope.errorMsg = null;

      $scope.login = function() {
        console.log($scope.errorMsg);
        $http.post(config.serverUrl + "/login",
          {
            username: $scope.username,
            password: $scope.password
          }
        ).then(function success(response) {
          localStorage.setItem('teachyToken', response.data.data.token)
          $scope.errorMsg = null;
          $uibModalInstance.dismiss();
          $window.location.reload();
        }, function error(response) {
          $scope.errorMsg = response.data.msg;
        })
      };

    }]);

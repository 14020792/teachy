'use strict';

/**
 * @ngdoc function
 * @name clientApp.controller:ModalInstanceCtrl
 * @description
 * # ModalInstanceCtrl
 * Controller of the clientApp
 */
angular.module('clientApp')
  .controller('ModalInstanceCtrl', function ($uibModalInstance) {
    this.cancel = function() {
      $uibModalInstance.dismiss();
    }
  });

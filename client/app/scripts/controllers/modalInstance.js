'use strict';

/**
 * @ngdoc function
 * @name clientApp.controller:ModalInstanceCtrl
 * @description
 * # ModalInstanceCtrl
 * Controller of the clientApp
 */
angular.module('clientApp')
  .controller('ModalInstanceCtrl', ['$http', '$uibModalInstance', '$uibModal', 'config', '$window',
    function ($http, $uibModalInstance, $uibModal, config, $window) {
      this.username = "";
      this.password = "";

      this.registerData = {
        username : "",
        password : "",
        password_confirmation : "",
        email : "",
        name : "",
        code : ""
      };

      this.errorMsg = null;
      this.notiMsg = null;
      this.errorData = null;

      this.openLogin = function() {
        $uibModalInstance.dismiss();
        $uibModal.open({
          controller: 'ModalInstanceCtrl as ModalInstanceCtrl',
          templateUrl: 'views/login.html'
        });
      };

      this.login = function() {
        $http.post(config.serverUrl + "/login",
          {
            username: this.username,
            password: this.password
          }
        ).then(function success(response) {
          localStorage.setItem('teachyToken', response.data.data.token)
          this.errorMsg = null;
          $uibModalInstance.dismiss();
          $window.location.reload();
        }.bind(this), function error(response) {
          this.errorMsg = response.data.msg;
        }.bind(this))
      }.bind(this);

      this.openRegister = function() {
        $uibModalInstance.dismiss();
        $uibModal.open({
          controller: 'ModalInstanceCtrl as ModalInstanceCtrl',
          templateUrl: 'views/register.html'
        });
      }.bind(this);

      this.register = function() {
        $http.post(config.serverUrl + "/register", this.registerData)
          .then(function success(response) {
            this.errorMsg = null;
            this.errorData = null;
            this.notiMsg = response.data.msg;
          }.bind(this), function error(response) {
            this.notiMsg = null;
            this.errorMsg = response.data.msg;
            this.errorData = response.data.data;
          }.bind(this))
      }.bind(this);

      this.showPassword = false;
    }]);

'use strict';

/**
 * @ngdoc function
 * @name clientApp.controller:MainCtrl
 * @description
 * # HeaderCtrl
 * Controller of the clientApp
 */
angular.module('clientApp')
  .controller('HeaderCtrl', function($uibModal, headerService, userService, $window, $rootScope) {
    this.info = headerService;
    this.loadProfile = function() {
      userService.getProfile().then(function(d) {
        if (d.status == 1) this.user = d.data;
        else {
          this.logout();
        }
      }.bind(this));
    }.bind(this);

    this.loadProfile();

    this.openLogin = function() {
      $uibModal.open({
        controller: 'ModalInstanceCtrl as ModalInstanceCtrl',
        templateUrl: 'views/login.html'
      });
    };

    this.logout = function() {
      localStorage.removeItem('teachyToken');
      $window.location.reload();
    };

    this.shortUsername = function() {
      var name = this.user.name;
      if (name.length <= 10) return name;
      name = name.substr(0, 10) + "...";
      return name;
    }.bind(this);

    $rootScope.$on('reloadHeader', function() {
      this.loadProfile();
    }.bind(this));
  });


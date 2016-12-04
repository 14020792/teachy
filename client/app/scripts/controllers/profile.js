'use strict';

/**
 * @ngdoc function
 * @name clientApp.controller:ProfileCtrl
 * @description
 * # ProfileCtrl
 * Controller of the clientApp
 */
angular.module('clientApp')
  .controller('ProfileCtrl', function ($timeout, headerService, userService, $scope) {
    headerService.change('profile');
    userService.getProfile().then(function(d) {
      this.user = d.data;
      this.originUser = JSON.parse(JSON.stringify(this.user));
    }.bind(this));

    this.fileReaderSupported = window.FileReader != null;
    this.errorMsg = null;
    this.errorData = null;
    this.notiMsg = null;

    $scope.photoChanged = function(files){
      if (files != null) {
        var file = files[0];
        if (this.fileReaderSupported && file.type.indexOf('image') > -1) {
          $timeout(function() {
            var fileReader = new FileReader();
            fileReader.readAsDataURL(file);
            fileReader.onload = function(e) {
              $timeout(function(){
                this.user.avatar = e.target.result;
              }.bind(this));
            }.bind(this)
          }.bind(this));
        }
      }
    }.bind(this);

    this.submit = function() {
      userService.updateProfile(this.user)
        .then(function(d) {
          if (d.status == 0) {
            this.errorMsg = d.msg;
            this.errorData = d.data;
            this.notiMsg = null;
          } else {
            this.errorMsg = null;
            this.errorData = null;
            this.notiMsg = d.msg;
            $scope.$emit('reloadHeader');
          }
        }.bind(this));
    }.bind(this);

    this.reset = function() {
      this.user = JSON.parse(JSON.stringify(this.originUser));
    }.bind(this);
  });

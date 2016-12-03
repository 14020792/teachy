'use strict';

/**
 * @ngdoc function
 * @name clientApp.controller:ProfileCtrl
 * @description
 * # ProfileCtrl
 * Controller of the clientApp
 */
angular.module('clientApp')
  .controller('ProfileCtrl', function ($scope, $timeout, headerService) {
    headerService.change('profile');

    this.details = {
      "Tên":"Dat",
      "Họ":"Chan",
      "Mã sinh viên":"14020801",
      "Email":"14020801@vnu.edu.vn",
      "Mật khẩu":"wipe1996",
      "Nhập lại mật khẩu":"wipe1996"
    }


    $scope.thumbnail = {
      dataUrl: 'default'
    };
    $scope.fileReaderSupported = window.FileReader != null;
    $scope.photoChanged = function(files){
      if (files != null) {
        var file = files[0];
        if ($scope.fileReaderSupported && file.type.indexOf('image') > -1) {
          $timeout(function() {
            var fileReader = new FileReader();
            fileReader.readAsDataURL(file);
            fileReader.onload = function(e) {
              $timeout(function(){
                $scope.thumbnail.dataUrl = e.target.result;
              });
            }
          });
        }
      }
    };

  });

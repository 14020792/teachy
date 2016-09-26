'use strict';

/**
 * @ngdoc service
 * @name clientApp.header
 * @description
 * # header
 * Factory in the clientApp.
 */

angular.module('clientApp')
  .factory('headerService', function (){
    var headerService ={};
    headerService.selectedTab = 'home';
    headerService.change = function(value){
      headerService.selectedTab = value;
    }
    return headerService;
  });

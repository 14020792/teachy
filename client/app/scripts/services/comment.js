'use strict';

/**
 * @ngdoc service
 * @name clientApp.comment
 * @description
 * # comment
 * Service in the clientApp.
 */
angular.module('clientApp')
  .factory('commentService', ['$http', 'config', function ($http, config) {
    var commentService = {};
    commentService.load = function(classId, lastId) {
      return $http.get(config.serverUrl + "/classes/" + classId + "/comments",
        {
          params: {last_id: lastId}
        })
        .then(function success(response) {
          return response.data.data;
        });
    };
    commentService.postComment = function(classId, content) {
      return $http.post(config.serverUrl + "/classes/" + classId + "/comments",
        {
          content: content
        })
        .then(function success(response) {
          return response.data;
        })
    };
    return commentService;
  }]);

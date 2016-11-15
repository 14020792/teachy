'use strict';

/**
 * @ngdoc function
 * @name clientApp.controller:StatsCtrl
 * @description
 * # StatsCtrl
 * Controller of the clientApp
 */
angular.module('clientApp')
  .controller('StatsCtrl', function ($scope, headerService, subjectService, criteriaService) {
    headerService.change('stats');

    $scope.selectedInstructor = -1;
    $scope.selectedSubject = -1;
    $scope.setInstructor = function(index){
      $scope.selectedInstructor = index;
    };

    $scope.errorMsg = null;
    subjectService.load().then(function(d) {
      $scope.subjects = d.data;
      if (d.status == 0) {
        $scope.errorMsg = d.msg;
      }
    });

    criteriaService.load().then(function(d) {
      $scope.criteria = d;
    });

    $scope.findCriterionValue = function(id) {
      if ($scope.subject != null && $scope.selectedInstructor != -1) {
        var assessments = $scope.subject.instructors[$scope.selectedInstructor].assessments;
        for (var k in assessments) {
          if (assessments[k].criterion_id == id) return assessments[k].value;
        }
      }
      return 0;
    };

    $scope.changeSubject = function() {
      $scope.selectedInstructor = -1;
      subjectService.loadSubject($scope.subjects[$scope.selectedSubject].id)
        .then(function(d) {
          $scope.subject = d.data;
          if (d.status == 0) {
            $scope.errorMsg = d.msg;
          }
        });
    };
  });

'use strict';

/**
 * @ngdoc function
 * @name clientApp.controller:RatingCtrl
 * @description
 * # RatingCtrl
 * Controller of the clientApp
 */
angular.module('clientApp')
  .controller('RatingCtrl', function ($http, $scope, headerService,
                                      subjectService, criteriaService, ratingService) {
    headerService.change('rating');

    $scope.selectedInstructor = -1;
    $scope.selectedSubject = -1;
    $scope.testVar = 3;
    $scope.setInstructor = function(index){
      $scope.selectedInstructor = index;
      $scope.rating = {
        assessments : [1,2,3]
      };
      //$scope.rating = {};
      //for (var ins_sub_id in $scope.assessments) {
      //  var assessment = $scope.assessments[ins_sub_id];
      //  if (assessment.subject_id == $scope.subject.id
      //    && assessment.instructor_id == $scope.subject.instructors[$scope.selectedInstructor].id) {
      //    $scope.rating.ins_sub_id = ins_sub_id;
      //    $scope.rating.assessments = [];
      //    for (var i in $scope.criteria) {
      //      var criterion = $scope.criteria[i];
      //      if (criterion.id in assessment.assessments)
      //        $scope.rating.assessments.push(assessment.assessments[criterion.id].value);
      //        //scope.rating.assessments[criterion.id] = assessment.assessments[criterion.id].value;
      //      else
      //        $scope.rating.assessments.push(0);
      //        //$scope.rating.assessments[criterion.id] = 0;
      //
      //    }
      //
      //
      //  }
      //}
      console.log($scope.rating);
    };

    $scope.errorMsg = null;
    subjectService.load().then(function(d) {
      $scope.subjects = d.data;
      if (d.status == 0) {
        $scope.errorMsg = d.msg;
      }
    });

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

    criteriaService.load().then(function(d) {
      $scope.criteria = d;
      ratingService.load().then(function(d) {
        $scope.assessments = d;
      });
    });



  });

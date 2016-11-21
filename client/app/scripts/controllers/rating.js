'use strict';

/**
 * @ngdoc function
 * @name clientApp.controller:RatingCtrl
 * @description
 * # RatingCtrl
 * Controller of the clientApp
 */
angular.module('clientApp')
  .controller('RatingCtrl', function ($http, headerService,
                                      subjectService, criteriaService, ratingService) {
    headerService.change('rating');
    this.selectedInstructor = -1;
    this.selectedSubject = -1;

    this.setInstructor = function(index){
      this.selectedInstructor = index;

      //Init values for rating
      this.rating = {
        ins_sub_id : this.subject.instructors[index].pivot.id,
        assessments : []
      };
      for (var i in this.criteria) {
        this.rating.assessments[this.criteria[i].id] = 0;
      }

      //Match values with current assessments
      for (var ins_sub_id in this.assessments) {
        var assessment = this.assessments[ins_sub_id];
        if (assessment.subject_id == this.subject.id
          && assessment.instructor_id == this.subject.instructors[this.selectedInstructor].id) {
          for (var i in this.criteria) {
            var criterion = this.criteria[i];
            if (criterion.id in assessment.assessments)
              this.rating.assessments[criterion.id] = assessment.assessments[criterion.id].value;
          }
          break;
        }
      }
    }.bind(this);

    this.errorMsg = null;
    subjectService.load().then(function(d) {
      this.subjects = d.data;
      if (d.status == 0) {
        this.errorMsg = d.msg;
      }
    }.bind(this));

    this.changeSubject = function() {
      this.selectedInstructor = -1;
      subjectService.loadSubject(this.subjects[this.selectedSubject].id)
        .then(function(d) {
          this.subject = d.data;
          if (d.status == 0) {
            this.errorMsg = d.msg;
          }
        }.bind(this));
    }.bind(this);

    criteriaService.load().then(function(d) {
      this.criteria = d;
      ratingService.load().then(function(d) {
        this.assessments = d;
      }.bind(this));
    }.bind(this));
  });

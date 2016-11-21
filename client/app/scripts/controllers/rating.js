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
    this.errorMsg = null;
    this.notiMsg = null;

    subjectService.load().then(function(d) {
      this.subjects = d.data;
      if (d.status == 0) {
        this.errorMsg = d.msg;
      }
    }.bind(this));

    criteriaService.load().then(function(d) {
      this.criteria = d;
      ratingService.load().then(function(d) {
        this.assessments = d.data;
        if (d.status == 0) {
          this.errorMsg = d.msg;
        }
      }.bind(this));
    }.bind(this));

    this.setInstructor = function(index){
      this.errorMsg = null;
      this.notiMsg = null;
      this.selectedInstructor = index;

      //Init values for rating
      this.rating = {
        ins_sub_id : this.subject.instructors[index].pivot.id,
        assessments : {}
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

    this.submit = function() {
      ratingService.submit(this.rating).then(function(d) {
        if (d.status == 0) {
          this.errorMsg = d.msg;
        } else {
          var ins_sub_id = this.subject.instructors[this.selectedInstructor].pivot.id;
          for (var i in this.criteria) {
            var criterion = this.criteria[i];
            this.assessments[ins_sub_id].assessments[criterion.id].value = this.rating.assessments[criterion.id];
          }
          this.notiMsg = d.msg;
        }
      }.bind(this));
    }.bind(this);

    this.changeSubject = function() {
      this.errorMsg = null;
      this.notiMsg = null;
      this.selectedInstructor = -1;
      subjectService.loadSubject(this.subjects[this.selectedSubject].id)
        .then(function(d) {
          this.subject = d.data;
          if (d.status == 0) {
            this.errorMsg = d.msg;
          }
        }.bind(this));
    }.bind(this);
  });

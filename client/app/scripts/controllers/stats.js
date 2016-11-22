'use strict';

/**
 * @ngdoc function
 * @name clientApp.controller:StatsCtrl
 * @description
 * # StatsCtrl
 * Controller of the clientApp
 */
angular.module('clientApp')
  .controller('StatsCtrl', function (headerService, subjectService, criteriaService) {
    headerService.change('stats');

    this.selectedInstructor = -1;
    this.selectedSubject = -1;
    this.errorMsg = null;

    subjectService.load().then(function(d) {
      this.subjects = d.data;
      if (d.status == 0) {
        this.errorMsg = d.msg;
      }
    }.bind(this));

    criteriaService.load().then(function(d) {
      this.criteria = d;
    }.bind(this));

    this.setInstructor = function(index){
      this.selectedInstructor = index;
    }.bind(this);

    this.findCriterionValue = function(id) {
      if (this.subject != null && this.selectedInstructor != -1) {
        var assessments = this.subject.instructors[this.selectedInstructor].assessments;
        for (var k in assessments) {
          if (assessments[k].criterion_id == id) return assessments[k].value;
        }
      }
      return 0;
    }.bind(this);

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

  });

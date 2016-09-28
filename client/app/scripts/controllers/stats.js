'use strict';

/**
 * @ngdoc function
 * @name clientApp.controller:StatsCtrl
 * @description
 * # StatsCtrl
 * Controller of the clientApp
 */
angular.module('clientApp')
  .controller('StatsCtrl', function ($scope, headerService) {
    headerService.change('stats');
    // Lay Json subjects tu dau - phia duoi la sample
    $scope.selectedInstructor = {id: -1}
    $scope.subjects = {
      "Programming":"1",
      "Software Engineering":"2",
      "Signals and Systems":"3"
    }
    //Lay Json instructors tu dau - Phia duoi la sample
    $scope.instructors = [{
          name: "Nguyen Hoang Hai",
          teach: ["1","2","3"],
          imgUrl: "images/img/01.jpg",
          id: "0"
        }, {
          name: "Tran Trong Dat",
          teach: ["1","3"],
          imgUrl: "images/img/02.jpg",
          id: "1"
        }, {
          name: "Nguyen Huu Nhat Minh",
          teach: ["1","2"],
          imgUrl: "images/img/03.jpg",
          id: "2"
        }, {
          name: "Cao Xuan Hung",
          teach: ["1","2"],
          imgUrl: "images/img/04.jpg",
          id: "3"
        }, {
          name: "Nguyen Trong Dong",
          teach: ["3","1"],
          imgUrl: "images/img/05.jpg",
          id: "4"
        }
    ];

    $scope.isSelectedFilter = function(instructor){
      var res = false;
      for(var i=0; i<instructor.teach.length; i++)
        if (instructor.teach[i] == $scope.selectedSubject)
          res = true;
      if ($scope.selectedSubject == null) return true;
      // for(var subjectID in instructor.teach)
      //   if (subjectID == $scope.selectedSubject)
      //     res = true;
      return res;
    };

  });

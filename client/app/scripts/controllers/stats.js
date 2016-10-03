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

        $scope.selectedInstructor = -1;
        $scope.setInstructor = function(index){
          $scope.selectedInstructor = index;
        }
        $scope.aspects = ["Teaching", "Scoring", "Boobs", "Butt", "Vagina"];
        $scope.subjects = [
            {
                "name": "Programming",
                id :"1",
                "data": [
                    {
                        name: "Nguyen Hoang Hai",
                        scores: [ 1.5, 2.0, 2.0, 4.0, 4.5],
                        imgUrl: "images/img/01.jpg"
                    },
                    {
                        name: "Tran Trong Dat",
                        scores: [ 2.5, 1.0, 3.0, 1.0, 2.5],
                        imgUrl: "images/img/02.jpg"
                    },
                    {
                        name: "Nguyen Huu Nhat Minh",
                        scores: [ 4.5, 3.0, 2.0, 1.0, 0.5],
                        imgUrl: "images/img/03.jpg"
                    }
                ]
            },
            {
                id: "2",
                name : "Software Engineering",
                data : [
                    {
                        name: "Nguyen Huu Nhat Minh",
                        scores: [ 3.5, 3.0, 3.0, 1.0, 4.5],
                        imgUrl: "images/img/03.jpg"
                    },
                    {
                        name: "Cao Xuan Hung",
                        scores: [ 2.5, 3.0, 1.0, 4.0, 0.5],
                        imgUrl: "images/img/04.jpg"
                    },
                    {
                        name: "Nguyen Trong Dong",
                        scores: [ 1.5, 2.0, 2.0, 4.0, 4.5],
                        imgUrl: "images/img/05.jpg"
                    }
                ]
            },
            {
                name: "Signals and Systems",
                id: "3",
                data: [
                    {
                        name: "Cao Xuan Hung",
                        scores: [ 2.5, 3.0, 4.0, 1.0, 0.5],
                        imgUrl: "images/img/04.jpg"
                    },
                    {
                        name: "Nguyen Trong Dong",
                        scores: [ 1.5, 2.0, 3.0, 4.0, 4.5],
                        imgUrl: "images/img/05.jpg"
                    },
                    {
                        name: "Nguyen Hoang Hai",
                        scores: [ 4.5, 2.0, 1.0, 3.0, 2.5],
                        imgUrl: "images/img/01.jpg"
                    },
                    {
                        name: "Tran Trong Dat",
                        scores: [ 1.5, 2.0, 2.0, 4.0, 1.5],
                        imgUrl: "images/img/02.jpg"
                    }
                ]

            }
        ];

    });

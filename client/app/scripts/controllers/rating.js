'use strict';

/**
 * @ngdoc function
 * @name clientApp.controller:RatingCtrl
 * @description
 * # RatingCtrl
 * Controller of the clientApp
 */
angular.module('clientApp')
  .controller('RatingCtrl', function ($scope, headerService) {
    headerService.change('rating');
    $scope.selectedInstructor = {id: -1};
        $scope.subjects = [
            {
                "name": "Programming",
                id :"1",
                "data": [
                    {
                        name: "Nguyen Hoang Hai",
                        teach: ["1","2","3"],
                        imgUrl: "images/img/01.jpg",
                        id: "0"
                    },
                    {
                        name: "Tran Trong Dat",
                        teach: ["1","3"],
                        imgUrl: "images/img/02.jpg",
                        id: "1"
                    },
                    {
                        name: "Nguyen Huu Nhat Minh",
                        teach: ["1","2"],
                        imgUrl: "images/img/03.jpg",
                        id: "2"
                    }
                ]
            },
            {
                id: "2",
                name : "Software Engineering",
                data : [
                    {
                        name: "Nguyen Huu Nhat Minh",
                        teach: ["1", "2"],
                        imgUrl: "images/img/03.jpg",
                        id: "2"
                    },
                    {
                        name: "Cao Xuan Hung",
                        teach: ["1", "2"],
                        imgUrl: "images/img/04.jpg",
                        id: "3"
                    },
                    {
                        name: "Nguyen Trong Dong",
                        teach: ["3", "1"],
                        imgUrl: "images/img/05.jpg",
                        id: "4"
                    }
                ]
            },
            {
                name: "Signals and Systems",
                id: "3",
                data: [
                    {
                        name: "Cao Xuan Hung",
                        teach: ["1", "2"],
                        imgUrl: "images/img/04.jpg",
                        id: "3"
                    },
                    {
                        name: "Nguyen Trong Dong",
                        teach: ["3", "1"],
                        imgUrl: "images/img/05.jpg",
                        id: "4"
                    },
                    {
                        name: "Nguyen Hoang Hai",
                        teach: ["1", "2", "3"],
                        imgUrl: "images/img/01.jpg",
                        id: "0"
                    },
                    {
                        name: "Tran Trong Dat",
                        teach: ["1", "3"],
                        imgUrl: "images/img/02.jpg",
                        id: "1"
                    }
                ]

            }
        ];
  });

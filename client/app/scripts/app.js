'use strict';

/**
 * @ngdoc overview
 * @name clientApp
 * @description
 * # clientApp
 *
 * Main module of the application.
 */
var app = angular.module('clientApp', [
    'angular-jwt',
    'ngAnimate',
    'ngAria',
    'ngCookies',
    'ngMessages',
    'ngResource',
    'ngRoute',
    'ngSanitize',
    'ngTouch',
    'ui.bootstrap'
  ])
  .constant('config', {
    serverUrl : 'http://localhost:8080'
  })
  .config(function ($routeProvider, $httpProvider, jwtOptionsProvider) {
    $routeProvider
      .when('/', {
        templateUrl: 'views/main.html',
        controller: 'MainCtrl',
        controllerAs: 'MainCtrl'
      })
      .when('/stats', {
        templateUrl: 'views/stats.html',
        controller: 'StatsCtrl',
        controllerAs: 'StatsCtrl'
      })
      .when('/rating', {
        templateUrl: 'views/rating.html',
        controller: 'RatingCtrl',
        controllerAs: 'RatingCtrl'
      })
      .otherwise({
        redirectTo: '/'
      });

    jwtOptionsProvider.config({
      tokenGetter: function() {
        return localStorage.getItem('teachyToken');
      },
      whiteListedDomains: ['localhost', 'http://api.teachy.dev'],
      unauthenticatedRedirectPath: '/'
    });

    $httpProvider.interceptors.push('jwtInterceptor');
  })
  .run(function(authManager) {
    authManager.checkAuthOnRefresh();
    authManager.redirectWhenUnauthenticated();
  })
  .directive('animateOnChange', function($timeout) {
    return function(scope, element, attr) {
        scope.$watch(attr.animateOnChange, function(nv,ov) {
            if (nv!=ov) {
                element.addClass('changed');
                $timeout(function() {
                    element.removeClass('changed');
                }, 800);
            }
        });
    };
  })
  .directive('starRating',starRating);

function starRating() {
  return {
    restrict: 'EA',
    template: '<ul class="star-rating" ng-class="{readonly: readonly}">' +
      '  <li ng-repeat="star in stars" class="star" ng-class="{filled: star.filled}" ng-click="toggle($index)">' +
      '    <i class="fa fa-star"></i>' + // or &#9733
      '  </li>' +
      '</ul>',
    scope: {
      ratingValue: '=ngModel',
      max: '=?', // optional (default is 5)
      onRatingSelect: '&?',
      readonly: '=?'
    },
    link: function(scope, element, attributes) {
      if (scope.max == undefined) {
        scope.max = 5;
      }

      function updateStars() {
        scope.stars = [];
        for (var i = 0; i < scope.max; i++) {
          scope.stars.push({
            filled: i < scope.ratingValue
          });
        }
      }
      scope.toggle = function(index) {
        if (scope.readonly == undefined || scope.readonly === false) {
          scope.ratingValue = index + 1;
          scope.onRatingSelect = ({
            rating: index + 1
          });
        }
      };
      scope.$watch('ratingValue', function(oldValue, newValue) {
        if (newValue || newValue == 0) { updateStars(); }
      });
    }
  };
};

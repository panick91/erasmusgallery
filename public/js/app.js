/**
 * Created by Patrick on 21.01.2015.
 */
var galleryApp = angular.module('galleryApp', [
    'ngRoute',
    'mainController',
    'galleryService',
    'flow',
    'infinite-scroll'
]);


galleryApp.config(['$routeProvider', '$controllerProvider',
    function ($routeProvider) {
        $routeProvider.
            when('/', {
                templateUrl: 'views/partials/gallery.php',
                controller: 'GalleryController'
            }).
            when('/upload/', {
                templateUrl: 'views/partials/upload.php',
                controller: 'GalleryController'
            }).
            otherwise({
                redirectTo: '/'
            });
    }]);


galleryApp.config(['flowFactoryProvider', function (flowFactoryProvider) {
    flowFactoryProvider.defaults = {
        target: 'api/upload',
        testChunks: false,
        permanentErrors: [404, 500, 501],
        maxChunkRetries: 1,
        chunkRetryInterval: 5000,
        simultaneousUploads: 4,
        chunkSize: 1024 * 1024
    };
    flowFactoryProvider.on('catchAll', function (event) {
        console.log('catchAll', arguments);
    });
    // Can be used with different implementations of Flow.js
    // flowFactoryProvider.factory = fustyFlowFactory;
}]);


galleryApp.directive('imageonload', function () {
    return {
        restrict: 'A',
        link: function (scope, element, attrs) {
            element.bind('load', function () {

                scope.loading = false;
                element.parent().parent().addClass('show');

            });
        }
    };
});

galleryApp.directive('navigation', function () {
    return {
        restrict: 'A',
        link: function (scope, element, attrs) {
            var origOffsetY = element.offset().top;

            function scroll() {
                if ($(window).scrollTop() >= origOffsetY) {
                    element.addClass('navbar-fixed-top');
                } else {
                    element.removeClass('navbar-fixed-top');
                }
            }
            document.onscroll = scroll;
        }
    };
});

galleryApp.directive('iNavigation', function () {
    return {
        restrict: "E",
        replace: true,
        templateUrl: "views/snippets/navigation.html"

    }
});

galleryApp.directive('iStory', function () {
    return {
        restrict: "E",
        replace: true,
        templateUrl: "views/snippets/story.html"

    }
});
//
//$(document).ready(function () {
//
//    var menu = $('.navbar');
//    var origOffsetY = menu.offset().top;
//
//    function scroll() {
//        if ($(window).scrollTop() >= origOffsetY) {
//            $('.navbar').addClass('navbar-fixed-top');
//            //$('.content').addClass('menu-padding');
//        } else {
//            $('.navbar').removeClass('navbar-fixed-top');
//            //$('.content').removeClass('menu-padding');
//        }
//
//
//    }
//
//    document.onscroll = scroll;
//
//});
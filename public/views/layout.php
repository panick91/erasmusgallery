<!doctype html>
<html lang="en" ng-app="galleryApp" >
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.9/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.9/angular-route.min.js"></script>

    <script src="js/vendor/ng-flow.min.js"></script>
    <script src="js/vendor/ng-infinite-scroll.js"></script>


    <!-- ANGULAR -->
    <!-- all angular resources will be loaded from the /public folder -->
    <script src="js/controllers/mainController.js"></script> <!-- load our controller -->
    <script src="js/services/galleryService.js"></script> <!-- load our service -->
    <script src="js/app.js"></script> <!-- load our application -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link href="css/main.css" rel="stylesheet"/>
    <link href="css/gallery.css" rel="stylesheet"/>
</head>
<body  ng-controller="GalleryController" >

<div ng-view></div>
</body>
</html>
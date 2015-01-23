<!doctype html>
<html lang="en" ng-app="galleryApp" >
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.9/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.9/angular-route.min.js"></script>

    <script src="js/vendor/ng-flow.min.js"></script>
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css"
          rel="stylesheet"/>
    <!-- ANGULAR -->
    <!-- all angular resources will be loaded from the /public folder -->
    <script src="js/controllers/mainController.js"></script> <!-- load our controller -->
    <script src="js/services/galleryService.js"></script> <!-- load our service -->
    <script src="js/app.js"></script> <!-- load our application -->
</head>
<body class="container" ng-controller="GalleryController">
<header>
    <a href="#/">Home</a>
    <a href="#/upload">Upload</a>
</header>
<div ng-view></div>
</body>
</html>
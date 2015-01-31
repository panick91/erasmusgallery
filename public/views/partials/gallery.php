<header class="galleryHeader"></header>
<div ng-include="'views/partials/navigation.php'" navigation></div>
<div class="container">
    <h1>Gallery</h1>

    <div infinite-scroll="loadMore()" infinite-scroll-distance="1" infinite-scroll-disabled="loading">
        <div ng-repeat="image in images" class="storyContainer">
            <img id="{{image.url}}" ng-src="images/uploads/{{image.url}}{{image.fileExtension}}" class="image"
                 imageonload/>

            <div class="info">
                <h2>test</h2>

                <p>{{image.description}}</p>
            </div>
        </div>
        <div class="spinner" ng-show="loading">
            <div class="rect1"></div>
            <div class="rect2"></div>
            <div class="rect3"></div>
            <div class="rect4"></div>
            <div class="rect5"></div>
        </div>
        <div ng-show="endOfRecords" class="alert alert-danger" role="alert">No more images.</div>
    </div>
</div>
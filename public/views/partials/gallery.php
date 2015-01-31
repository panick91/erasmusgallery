<header class="galleryHeader"></header>
<div>
    <i-navigation/>
</div>
<div class="container">
    <h1>Gallery</h1>

    <div infinite-scroll="loadMore()" infinite-scroll-distance="1" infinite-scroll-disabled="loading">
        <div>
            <i-story/>
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
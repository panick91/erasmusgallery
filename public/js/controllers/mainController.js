/**
 * Created by Patrick on 21.01.2015.
 */

angular.module('mainController', [])

// inject the Comment service into our controller
    .controller('GalleryController', function($scope, $http, Image) {
        // object to hold all the data for the new comment form
        $scope.galleryData = {};

        // loading variable to show the spinning loading icon
        $scope.loading = true;

        // get all the comments first and bind it to the $scope.comments object
        // use the function we created in our service
        // GET ALL COMMENTS ==============
        Image.get()
            .success(function(data) {
                $scope.images = data;
                $scope.loading = false;
            });

        //// function to handle submitting the form
        //// SAVE A COMMENT ================
        //$scope.submitComment = function() {
        //    $scope.loading = true;
        //
        //    // save the comment. pass in comment data from the form
        //    // use the function we created in our service
        //    Image.save($scope.commentData)
        //        .success(function(data) {
        //
        //            // if successful, we'll need to refresh the comment list
        //            Image.get()
        //                .success(function(getData) {
        //                    $scope.comments = getData;
        //                    $scope.loading = false;
        //                });
        //
        //        })
        //        .error(function(data) {
        //            console.log(data);
        //        });
        //};

        //// function to handle deleting a comment
        //// DELETE A COMMENT ====================================================
        //$scope.deleteComment = function(id) {
        //    $scope.loading = true;
        //
        //    // use the function we created in our service
        //    Comment.destroy(id)
        //        .success(function(data) {
        //
        //            // if successful, we'll need to refresh the comment list
        //            Comment.get()
        //                .success(function(getData) {
        //                    $scope.comments = getData;
        //                    $scope.loading = false;
        //                });
        //
        //        });
        //};

    });
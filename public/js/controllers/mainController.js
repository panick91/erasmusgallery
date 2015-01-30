/**
 * Created by Patrick on 21.01.2015.
 */

angular.module('mainController', [])

// inject the Comment service into our controller
    .controller('GalleryController', function ($scope, $http, Image) {


        // loading variable to show the spinning loading icon
        $scope.loading = true;
        $scope.currentPage = 1;
        $scope.images = [];
        $scope.endOfRecords = false;


        $scope.loadMore = function () {
            if (!$scope.endOfRecords) {
                $scope.loading = true;
                Image.get($scope.currentPage)
                    .success(function (data) {

                        for (var i = 0; i < data.data.length; i++) {
                            $scope.images.push(data.data[i]);
                        }

                        $scope.loading = false;

                        if (data.data.length === 0) {
                            $scope.endOfRecords = true;
                        } else {
                            $scope.currentPage++;
                        }
                    });
            }
        };

        $scope.loadMore();

        //$scope.loadMore();

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
/**
 * Created by Patrick on 21.01.2015.
 */

angular.module('galleryService', [])

    .factory('Image', function($http) {

        return {
            // get all the comments
            get : function(page) {
                return $http.get('/api/images?page='+page);
            },

            // destroy a comment
            destroy : function(id) {
                return $http.delete('/api/images/' + id);
            }
        }

    });
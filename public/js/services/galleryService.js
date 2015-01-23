/**
 * Created by Patrick on 21.01.2015.
 */

angular.module('galleryService', [])

    .factory('Image', function($http) {

        return {
            // get all the comments
            get : function() {
                return $http.get('/api/images');
            },

            // destroy a comment
            destroy : function(id) {
                return $http.delete('/api/images/' + id);
            }
        }

    });
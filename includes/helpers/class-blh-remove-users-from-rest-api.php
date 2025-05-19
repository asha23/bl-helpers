<?php

class BLH_Remove_Users_From_REST_API {
    public static function init() {
        // Remove the /wp/v2/users and /wp/v2/users/<id> endpoints entirely
        add_filter('rest_endpoints', function ($endpoints) {
            unset($endpoints['/wp/v2/users']);
            unset($endpoints['/wp/v2/users/(?P<id>[\d]+)']);
            return $endpoints;
        });

        // Prevent user data from being included via _embed param in other REST queries
        add_filter('rest_prepare_user', function () {
            return new WP_Error('rest_forbidden', __('User data is not available.'), ['status' => 403]);
        }, 10, 3);
    }
}
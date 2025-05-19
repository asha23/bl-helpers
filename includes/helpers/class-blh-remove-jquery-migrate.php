<?php

class BLH_Remove_JQuery_Migrate {
    public static function init() {
        add_filter('wp_default_scripts', function ($scripts) {
            if (!is_admin() && isset($scripts->registered['jquery'])) {
                $scripts->registered['jquery']->deps = array_diff(
                    $scripts->registered['jquery']->deps,
                    ['jquery-migrate']
                );
            }
        });
    }
}

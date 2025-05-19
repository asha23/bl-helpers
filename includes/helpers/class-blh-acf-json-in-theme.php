<?php

class BLH_ACF_JSON_In_Theme {
    public static function init() {
        add_filter('acf/settings/save_json', function () {
            return get_stylesheet_directory() . '/acf-json';
        });

        add_filter('acf/settings/load_json', function ($paths) {
            return [get_stylesheet_directory() . '/acf-json'];
        });
    }
}

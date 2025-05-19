<?php

class BLH_Manager {
    public static $option_key = 'blh_active_helpers';

    public static function init() {
        $helpers = [
            'admin_bar_padding' => 'BLH_Admin_Bar_Padding',
        ];

        foreach ($helpers as $key => $class) {
            $active_helpers = get_option(self::$option_key, []);
            if (in_array($key, $active_helpers)) {
                require_once __DIR__ . "/helpers/class-blh-{$key}.php";
                if (class_exists($class)) {
                    $class::init();
                }
            }
        }
    }
}
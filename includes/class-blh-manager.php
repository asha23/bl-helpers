<?php

class BLH_Manager {
    public static $option_key = 'blh_active_helpers';

    public static function init() {
        $helpers = [
            'admin-bar-padding' => 'BLH_Admin_Bar_Padding',
            'disable-heartbeat-api' => 'BLH_Disable_Heartbeat_API',
            'remove-jquery-migrate' => 'BLH_Remove_JQuery_Migrate',
            'remove-rest-api-headers' => 'BLH_Remove_REST_API_Headers',
            'remove-rest-api-users' => 'BLH_Remove_REST_API_Users',
            'remove-login-errors' => 'BLH_Remove_Login_Errors',
            'disable-self-pingbacks' => 'BLH_Disable_Self_Pingbacks',
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
<?php

class BLH_Disable_Heartbeat_API {
    public static function init() {
        add_filter('heartbeat_send', '__return_false');
        add_filter('heartbeat_tick', '__return_false');
        add_filter('heartbeat_settings', '__return_false');
        wp_deregister_script('heartbeat');
    }
}

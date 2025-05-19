<?php

class BLH_Disable_Self_Pingbacks {
    public static function init() {
        add_action('pre_ping', function (&$links) {
            foreach ($links as $l => $link) {
                if (strpos($link, home_url()) === 0) {
                    unset($links[$l]);
                }
            }
        });
    }
}
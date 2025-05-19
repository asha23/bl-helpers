<?php

class BLH_Disable_ACF_Admin {
    public static function init() {
        add_filter('acf/settings/show_admin', '__return_false');
    }
}

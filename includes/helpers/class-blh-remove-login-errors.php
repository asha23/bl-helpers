<?php

class BLH_Remove_Login_Errors {
    public static function init() {
        add_filter('login_errors', '__return_empty_string');
    }
}

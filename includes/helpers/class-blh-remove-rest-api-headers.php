<?php

class BLH_Remove_REST_API_Headers {
    public static function init() {
        remove_action('template_redirect', 'rest_output_link_header', 11);
        remove_action('wp_head', 'rest_output_link_wp_head', 10);
        remove_action('xmlrpc_rsd_apis', 'rest_output_rsd');
    }
}

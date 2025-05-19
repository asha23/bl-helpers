<?php

class BLH_Admin_Bar_Padding {
    public static function init() {
        add_action('wp_head', [__CLASS__, 'add_padding_style'], 100);
    }

    public static function add_padding_style() {
        if (!is_admin_bar_showing()) {
            return;
        }
        ?>
        <style>
            html { margin-top: 32px !important; }
            @media screen and (max-width: 782px) {
                html { margin-top: 46px !important; }
            }
        </style>
        <?php
    }
}
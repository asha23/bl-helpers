<?php

class BLH_Admin_Bar_Padding {
    public static function init() {
        add_action('wp_head', [__CLASS__, 'add_admin_bar_css'], 100);
    }

    public static function add_admin_bar_css() {
        if (!is_admin_bar_showing()) {
            return;
        }

        $admin_bar_height = is_admin() ? 0 : (wp_is_mobile() ? 46 : 32);
        ?>
        <style>
            header.fixed {
                top: <?php echo $admin_bar_height; ?>px !important;
            }
			body {
				margin-top: <?php echo $admin_bar_height; ?>px !important;
			}
            @media screen and (max-width: 782px) {
                body {
                    margin-top: 46px !important;
                }
            }
        </style>
        <?php
    }
}

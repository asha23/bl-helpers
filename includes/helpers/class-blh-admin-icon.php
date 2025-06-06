<?php

class BLH_Admin_Icon {
    public static function init() {
        add_action('admin_bar_menu', [__CLASS__, 'replace_wp_logo'], 11);
        add_action('admin_head', [__CLASS__, 'inject_icon_css']);
        add_action('wp_head', [__CLASS__, 'inject_icon_css']); // frontend admin bar
    }

    public static function replace_wp_logo($wp_admin_bar) {
        $wp_admin_bar->remove_node('wp-logo');

        $wp_admin_bar->add_node([
            'id'    => 'site-icon-logo',
            'title' => '<span class="site-icon-logo"></span>',
            'href'  => admin_url(),
            'meta'  => [
                'title' => get_bloginfo('name'),
            ],
        ]);
    }

    public static function inject_icon_css() {
        $icon_url = get_site_icon_url(32);

        if (!$icon_url) {
            return;
        }

        echo '<style>
            #wp-admin-bar-site-icon-logo .site-icon-logo {
                display: block;
                width: 32px;
                height: 32px;
                background-image: url("' . esc_url($icon_url) . '");
                background-size: contain;
                background-repeat: no-repeat;
				position:relative;
				left:-7px;
            }
        </style>';
    }
}

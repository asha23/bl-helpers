<?php

class BLH_Admin_Bar_Padding {
    public static function init() {
        add_action('wp_footer', [__CLASS__, 'add_js_padding'], 100);
    }

    public static function add_js_padding() {
        if (!is_admin_bar_showing()) return;
        ?>
        <script id="bl-admin-bar-padding">
        (function () {
            const bar = document.getElementById('wpadminbar');
            if (!bar) return;
            const height = bar.offsetHeight;
            document.body.style.marginTop = height + 'px';
        })();
        </script>
        <?php
    }
}

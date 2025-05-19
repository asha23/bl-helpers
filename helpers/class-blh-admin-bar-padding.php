<?php

class BLH_Admin_Bar_Padding {
    public static function init() {
        add_action('wp_footer', [__CLASS__, 'inject_admin_bar_script'], 100);
    }

    public static function inject_admin_bar_script() {
        if (!is_admin_bar_showing()) return;

        ?>
        <script>
        (function () {
            function adjustForAdminBar() {
                const bar = document.getElementById('wpadminbar');
                const header = document.querySelector('header');

                if (!bar) return;

                const height = bar.offsetHeight;
                if (header) {
                    header.style.position = 'fixed';
                    header.style.top = height + 'px';
                    header.style.zIndex = '9998'; // ensure it stays under the admin bar
                }
                document.body.style.marginTop = height + 'px';
            }

            window.addEventListener('load', adjustForAdminBar);
            window.addEventListener('resize', adjustForAdminBar);
        })();
        </script>
        <?php
    }
}

<?php

add_action('admin_menu', function () {
    add_options_page('BL Helpers', 'BL Helpers', 'manage_options', 'bl-helpers', 'blh_render_settings_page');
});

add_action('admin_init', function () {
    register_setting('blh_options', BLH_Manager::$option_key);
});

function blh_render_settings_page() {
    $option_key = BLH_Manager::$option_key;
    $active_helpers = get_option($option_key, []);
    ?>
    <div class="wrap">
        <h1>BL Helpers</h1>
        <form method="post" action="options.php">
            <?php settings_fields('blh_options'); ?>
            <table class="form-table">
                <tr>
                    <th scope="row">Push content for admin bar</th>
                    <td>
                        <label>
                            <input type="checkbox" name="<?php echo $option_key; ?>[]" value="admin-bar-padding"
                                <?php checked(in_array('admin-bar-padding', $active_helpers)); ?>>
                            Enable
                        </label>
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}